<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_id',  'product_name',  'product_price','quantity', 'order_date', 'total', 'status'];
}
