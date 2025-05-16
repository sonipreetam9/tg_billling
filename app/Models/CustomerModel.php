<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    use HasFactory;
    protected $table = "customers";
    protected $fillable = ['name', 'tag_id', 'business_name', 'gst_number', 'email', 'phone', 'address', 'city', 'state', 'country', 'pincode', 'status', 'created_at', 'updated_at'];
}
