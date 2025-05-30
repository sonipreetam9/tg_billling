<?php

namespace App\Http\Controllers;

use App\Models\PurchaseItmesModel;
use App\Models\PurchaseModel;
use Illuminate\Http\Request;

use App\Models\TransactionModel;
use App\Models\WalletModel;
use Illuminate\Support\Facades\DB;
class PurchaseController extends Controller
{
    public function make_purchase_page()
    {
        return view('software.make_purchase');
    }
    public function purchase_list()
    {
        $purchases = PurchaseModel::with('items')->orderBy('id', 'DESC')->get();
        return view('software.purchase_list',compact('purchases'));
    }
    public function make_purchase(Request $request)
    {
        $request->validate([


            // Validate all product array inputs
            'product_name' => 'required|array|min:1',
            'product_name.*' => 'required|string|max:255',

            'product_rate' => 'required|array|min:1',
            'product_rate.*' => 'required|numeric|min:0',

            'product_qty' => 'required|array|min:1',
            'product_qty.*' => 'required|integer|min:1',

            'product_total' => 'required|array|min:1',
            'product_total.*' => 'required|string',

            'total_amount' => 'required|string',
            'note' => 'nullable',
            'date' => 'required|date',
            'purchase_from' => 'required',
            'file_has' => 'nullable|file|mimes:webp,png,jpeg,jpg,pdf|max:5120',
        ]);
        $pdf_yes_no = "no";
        $link = null;
        if ($request->file_has) {
            $file = $request->file('file_has');

            // ✅ Get extension
            $fileExtension = $file->getClientOriginalExtension();

            // ✅ Set PDF flag
            $pdf_yes_no = ($fileExtension === 'pdf') ? 'yes' : 'no';

            // ✅ Generate new file name
            $newFileName = time() . '_' . date('Ymd') . '.' . $fileExtension;

            // ✅ Set path
            $folder = 'software/uploads/';
            $link = $folder . $newFileName;

            // ✅ Move to public path
            $file->move(public_path($folder), $newFileName);


        }


        $date = date('d-m-Y');
        $total_amount = (float) str_replace(['₹', ','], '', $request->total_amount);

        if ($total_amount <= 0) {
            return redirect()->back()->with('error-e', 'Total amount cannot be negative or zero.');
        }






        $uids = date("YmdHis") . rand(10, 100);

        DB::beginTransaction();
        try {


            // 🧾 Create Invoice
            $purchase = PurchaseModel::create([
                'grand_total' => $total_amount,
                'purchase_from' => $request->purchase_from,
                'date' => $request->date,
                'note' => $request->note,
                'pdf' => $pdf_yes_no,
                'file' => $link,
            ]);

            // 🧾 Update invoice number
            $purchase->update([
                'purchase_number' => '#PUR-00' . $purchase->id,
            ]);

            // 📦 Insert each product
            foreach ($request->product_name as $index => $name) {
                PurchaseItmesModel::create([
                    'purchase_id' => $purchase->id,
                    'name' => $name,
                    'qty' => $request->product_qty[$index],
                    'rate' => $request->product_rate[$index],
                    'sub_total' => (float) str_replace(['₹', ','], '', $request->product_total[$index]),
                ]);
            }
            $wallet = WalletModel::first(); // If multiple users, use user-specific wallet

            $totalAmount = (float) str_replace(['₹', ','], '', $request->total_amount);

            // ✅ Deduct amount from wallet
            $wallet->amount -= $totalAmount;
            $wallet->total_loose += $totalAmount;

            // ✅ Update profit/loose status
            $wallet->profit_loose = $wallet->amount >= 0 ? 'Profit' : 'Loss';
            $wallet->save();

            // ✅ Create transaction record for debit
            TransactionModel::create([
                'c_amount' => $totalAmount,
                'credit' => 0,
                'debit' => $totalAmount,
                'final_amount' => $wallet->amount,
                'date' => now(),
                'comment' => 'Purchase made, amount debited from wallet',
                'transaction_mode' => 'purchase_debit',
                'trans_add_withdraw' => 'withdraw',
                'batch' => $uids,
                'purchase_id' => $purchase->id,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Purchased created and wallet Debited!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Transaction failed: ' . $e->getMessage());
        }
    }
}
