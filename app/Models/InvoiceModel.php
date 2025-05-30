<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceModel extends Model
{
    use HasFactory;

    protected $table = 'invoices';

    protected $fillable = [
        'customer_id',
        'invoice_number',
        'discount_yes',
        'gst_yes',
        'discount',
        'sub_total',
        'grand_total',
        'cgst',
        'sgst',
        'cgst_charge',
        'sgst_charge',
        'note',
        'date',
    ];

    // 🔁 Relationship: Invoice belongs to a customer
    public function customer()
    {
        return $this->belongsTo(CustomerModel::class, 'customer_id');
    }

    // 🔁 Relationship: Invoice has many products
    public function products()
    {
        return $this->hasMany(InvoiceProductsModel::class, 'invoice_id');
    }
}
