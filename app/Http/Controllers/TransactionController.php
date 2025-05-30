<?php

namespace App\Http\Controllers;

use App\Models\TransactionModel;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function all_transactions(){
        $transactions=TransactionModel::orderBy('id','DESC')->get();
        return view('software.transactions',compact('transactions'));
    }
}
