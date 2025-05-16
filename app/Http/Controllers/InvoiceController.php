<?php

namespace App\Http\Controllers;

use App\Models\CustomerModel;
use App\Models\GstModel;
use App\Models\TermsModel;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function make_invoice(){
        $customers=CustomerModel::all();
        $gsts=GstModel::all();
        return view('software.make_invoice',compact('customers','gsts'));
    }
    public function view_invoice(){
        $terms=TermsModel::all();
        return view('software.view_invoice',compact('terms'));
    }
    public function make_invoice_post(Request $request){
        dd($request->all());
        
    }
}
