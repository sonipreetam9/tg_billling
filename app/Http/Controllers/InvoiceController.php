<?php

namespace App\Http\Controllers;

use App\Models\CustomerModel;
use App\Models\GstModel;
use App\Models\InvoiceModel;
use App\Models\InvoiceProductsModel;
use App\Models\SettingModel;
use App\Models\TermsModel;
use App\Models\TransactionModel;
use App\Models\WalletModel;
use Illuminate\Http\Request;
use NumberToWords\NumberToWords;
use Illuminate\Support\Facades\DB;
class InvoiceController extends Controller
{
    public function make_invoice()
    {
        $customers = CustomerModel::all();
        $gsts = GstModel::all();
        return view('software.make_invoice', compact('customers', 'gsts'));
    }
    public function view_invoice($invoice_number)
    {
        $invoice = InvoiceModel::where('id', $invoice_number)
            ->with(['customer', 'products'])
            ->firstOrFail(); // Optional: अगर invoice ना मिले तो 404 दे

        $terms = TermsModel::all();

        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('en');

        $amount_in_word = ucwords($numberTransformer->toWords($invoice->grand_total));
        $gst_data_on_off = SettingModel::where('name', 'gst_on_off')->first();
        $gst_on_off = $gst_data_on_off->value;
        return view('software.view_invoice', compact('terms', 'invoice', 'amount_in_word', 'gst_on_off'));
    }


    public function make_invoice_post(Request $request)
    {
        $request->validate([
            'customer_tag_id' => 'required|string|max:255',

            // Validate all product array inputs
            'product_name' => 'required|array|min:1',
            'product_name.*' => 'required|string|max:255',

            'product_rate' => 'required|array|min:1',
            'product_rate.*' => 'required|numeric|min:0',

            'product_qty' => 'required|array|min:1',
            'product_qty.*' => 'required|integer|min:1',

            'product_total' => 'required|array|min:1',
            'product_total.*' => 'required|string',

            'sub_total' => 'required|string',
            'discount' => 'nullable|string',
            'total_tax' => 'nullable|string',
            'total_amount' => 'required|string',
            'note' => 'nullable',
        ]);

        $customer = CustomerModel::where('tag_id', $request->customer_tag_id)->first();
        if (!$customer) {
            return redirect()->back()->with('error-e', 'Customer not found.');
        }

        $date = date('d-m-Y');
        $total_amount = (float) str_replace(['₹', ','], '', $request->total_amount);
        $total_tax = (float) str_replace(['₹', ','], '', $request->total_tax);
        $discount = (float) str_replace(['₹', ','], '', $request->discount);
        $sub_total = (float) str_replace(['₹', ','], '', $request->sub_total);

        if ($sub_total <= 0) {
            return redirect()->back()->with('error-e', 'Sub Total amount cannot be negative or zero.');
        }
        if ($total_amount <= 0) {
            return redirect()->back()->with('error-e', 'Total amount cannot be negative or zero.');
        }
        if ($total_tax < 0) {
            return redirect()->back()->with('error-e', 'Total Tax cannot be negative.');
        }
        if ($discount < 0) {
            return redirect()->back()->with('error-e', 'Discount cannot be negative.');
        }
        $cgst_charge = GstModel::where('name', 'cgst')->first();
        $sgst_charge = GstModel::where('name', 'sgst')->first();






        $uids = date("YmdHis") . rand(10, 100);

        DB::beginTransaction();
        try {


            // 🧾 Create Invoice
            $invoice = InvoiceModel::create([
                'customer_id' => $customer->id,
                'gst_yes' => $request->get_no_off ?? 'off',
                'discount_yes' => $request->discount_on__off ?? 'off',
                'discount' => $discount,
                'sub_total' => $sub_total,
                'grand_total' => $total_amount,
                'cgst' => $request->cgst,
                'sgst' => $request->sgst,
                'cgst_charge' => $cgst_charge->charges,
                'sgst_charge' => $sgst_charge->charges,
                'date' => $date,
                'note' => $request->note,
            ]);

            // 🧾 Update invoice number
            $invoice->update([
                'invoice_number' => '#INV-00' . $invoice->id,
            ]);

            // 📦 Insert each product
            foreach ($request->product_name as $index => $name) {
                InvoiceProductsModel::create([
                    'invoice_id' => $invoice->id,
                    'name' => $name,
                    'qty' => $request->product_qty[$index],
                    'rate' => $request->product_rate[$index],
                    'sub_total' => (float) str_replace(['₹', ','], '', $request->product_total[$index]),
                ]);
            }
            $wallet = WalletModel::first(); // If multiple users, use user-specific wallet

            $totalAmount = (float) str_replace(['₹', ','], '', $request->total_amount);

            // ✅ Add amount to wallet
            $wallet->amount += $totalAmount;
            $wallet->total_profit += $totalAmount;
            // ✅ Set profit_loose status
            $wallet->profit_loose = $wallet->amount >= 0 ? 'profit' : 'loose';

            $wallet->save();

            // ✅ Create transaction record
            TransactionModel::create([
                'c_amount' => $totalAmount,
                'credit' => $totalAmount,
                'debit' => 0,
                'final_amount' => $wallet->amount,
                'date' => now(),
                'comment' => 'Invoice created, amount added to wallet',
                'transaction_mode' => 'invoice_credit',
                'trans_add_withdraw' => 'add',
                'batch' => $uids,
                'invoice_id' => $invoice->id,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Invoice created and wallet credited!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Transaction failed: ' . $e->getMessage());
        }
    }

    public function invoice_list()
    {
        $invoices = InvoiceModel::with('customer')->orderBy('id', 'DESC')->get();

        return view('software.invoice_list', compact('invoices'));
    }

}
