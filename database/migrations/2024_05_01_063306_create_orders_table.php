<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id'); // Add product_id column
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade'); // Add foreign key constraint
            $table->string('order_id')->unique();
            $table->integer('quantity');
            $table->date('order_date');
            $table->decimal('total', 8, 2);
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
