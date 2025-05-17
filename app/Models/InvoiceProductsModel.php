<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceProductsModel extends Model
{
    use HasFactory;

    protected $table = 'invoice_products';

    protected $fillable = [
        'invoice_id',
        'name',
        'qty',
        'rate',
        'sub_total',
    ];

    // 🔁 Relationship: Product belongs to an invoice
    public function invoice()
    {
        return $this->belongsTo(InvoiceModel::class, 'invoice_id');
    }
}
