<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'Order_Number',
        'Customer_Name',
        'User_Contact_No',
        'id',
        'Product_Price',
        'Product_Quantity',
        'Product_Name',
        'Product_Total',
    ];
}
