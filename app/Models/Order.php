<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_id',  'product_name',  'product_price','quantity', 'order_date', 'total', 'status'];
}

    use HasFactory;

    protected $fillable = ['product_name', 'order_id', 'product_price', 'order_date', 'quantity', 'total'];
    
   /**
     * Define a relationship to the OrderItem model.
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    
}

