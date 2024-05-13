<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    protected $table = 'carts';

    protected $fillable = [
        'Order_Number',
        'Customer_Name',
        'User_Contact No',
        'Product_Name',
        'Product_Price',
        'Product_Quantity',
        'Product_Total',
    ];

   
}

