<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
           
            $table->string('product_name');
            $table->decimal('product_price', 10, 2); // Define product_price as a decimal type with 10 digits in total and 2 decimal places
            $table->date('order_date'); // Use lowercase for column names, e.g., 'order_date' instead of 'Order_DATE' 
            $table->decimal('total', 10, 2); // Define total as a decimal type with 10 digits in total and 2 decimal places
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
}
