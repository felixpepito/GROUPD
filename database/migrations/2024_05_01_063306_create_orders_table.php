<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('order_id')->unique(); // Use a string for order_id
            $table->decimal('product_price', 8, 2);
            $table->integer('quantity');
            $table->date('order_date');
            $table->decimal('total', 8, 2);
            $table->boolean('status')->default(false);
            $table->timestamps();
        });

        // Generate unique order IDs for existing records
        $orders = \App\Models\Order::all();
        foreach ($orders as $order) {
            $order->update(['order_id' => uniqid()]);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
}
