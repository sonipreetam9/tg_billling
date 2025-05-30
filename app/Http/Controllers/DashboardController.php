<?php

namespace App\Http\Controllers;

use App\Models\CustomerModel;
use App\Models\WalletModel;
use Illuminate\Http\Request;
use App\Models\InvoiceModel;
use Carbon\Carbon;
class DashboardController extends Controller
{
    public function dashboard()
    {
        $invoices = InvoiceModel::with('customer')->limit(10)->orderBy('id', 'DESC')->get();
        $total_invoice = InvoiceModel::count();
        $today_invoice_count = InvoiceModel::where('date', date('d-m-Y'))->count();
        $customers = CustomerModel::orderBy('id', 'DESC')->limit(10)->get();
        $total_customers = CustomerModel::count();
        $today_customer_count = CustomerModel::whereDate('created_at', Carbon::today())->count();
        $walllet=WalletModel::first();
        // dd($today_customer_count);
        return view('software.index', compact('invoices', 'total_invoice', 'today_invoice_count', 'today_customer_count', 'total_customers', 'customers','walllet'));

    }
}
