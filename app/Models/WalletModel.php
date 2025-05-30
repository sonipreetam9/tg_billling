<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletModel extends Model
{
    use HasFactory;

    protected $table = 'wallet';

    protected $fillable = [
        'amount',
        'total_profit',
        'discount_yes',
        'total_loose',
        'profit_loose',
    ];
}
