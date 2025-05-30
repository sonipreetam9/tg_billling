<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseItmesModel extends Model
{
    use HasFactory;

     protected $table = "purchase_items";
    protected $fillable = [
        'id',
        'purchase_id',
        'name',
        'qty',
        'rate',
        'sub_total',
    ];
    public function purchase()
    {
        return $this->belongsTo(PurchaseModel::class, 'purchase_id');
    }
}
