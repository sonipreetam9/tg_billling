<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionModel extends Model
{
    use HasFactory;
    protected $table = "transaction";
    protected $fillable = [
        'id',
        'c_amount',
        'credit',
        'debit',
        'final_amount',
        'date',
        'created_at',
        'updated_at',
        'comment',
        'transaction_mode',
        'trans_add_withdraw',
        'batch',
        'invoice_id',
        'purchase_id',
    ];
}
