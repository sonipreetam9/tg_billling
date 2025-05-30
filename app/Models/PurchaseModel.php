<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseModel extends Model
{
    use HasFactory;

    protected $table = "purchase";
    protected $fillable = [
        'id',
        'purchase_number',
        'purchase_from',
        'grand_total',
        'note',
        'date',
        'pdf',
        'file',
    ];
    public function items()
    {
        return $this->hasMany(PurchaseItmesModel::class, 'purchase_id');
    }
}
