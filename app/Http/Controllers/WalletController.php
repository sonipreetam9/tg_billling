<?php

namespace App\Http\Controllers;

use App\Models\TransactionModel;
use App\Models\WalletModel;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function wallet()
    {
        $transactions = TransactionModel::orderBy('id', 'DESC')->limit(10)->get();
        $wallet = WalletModel::first();
        return view('software.wallet', compact('transactions','wallet'));
    }
}
