<?php

namespace App\Http\Controllers;

use App\Models\CustomerModel;
use App\Models\GstModel;
use App\Models\InvoiceModel;
use App\Models\InvoiceProductsModel;
use App\Models\TermsModel;
use Illuminate\Http\Request;
use NumberToWords\NumberToWords;
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


    return view('software.view_invoice', compact('terms', 'invoice', 'amount_in_word'));
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
        ]);

        $customer = CustomerModel::where('tag_id', $request->customer_tag_id)->first();
        if (!$customer) {
            return redirect()->back()->with('error-e', 'Customer not found.');
        }

        $date = date('d-m-Y');
        $total_amount = (int) str_replace(['₹', ','], '', $request->total_amount);
        $total_tax = (int) str_replace(['₹', ','], '', $request->total_tax);
        $discount = (int) str_replace(['₹', ','], '', $request->discount);
        $sub_total = (int) str_replace(['₹', ','], '', $request->sub_total);

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
        $cgst_charge=GstModel::where('name','cgst')->first();
        $sgst_charge=GstModel::where('name','sgst')->first();
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
                'sub_total' => (int) str_replace(['₹', ','], '', $request->product_total[$index]),
            ]);
        }

        return redirect()->back()->with('success', 'Invoice created successfully!');
    }

    public function invoice_list()
    {
        $invoices = InvoiceModel::with('customer')->orderBy('id', 'DESC')->get();

        return view('software.invoice_list', compact('invoices'));
    }

}
