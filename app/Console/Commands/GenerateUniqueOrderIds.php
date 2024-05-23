<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;

class GenerateUniqueOrderIds extends Command
{
    protected $signature = 'orders:generate-unique-ids';
    protected $description = 'Generate unique order IDs for existing orders';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $orders = Order::whereNull('order_id')->get();
        foreach ($orders as $order) {
            $order->update(['order_id' => uniqid()]);
        }

        $this->info('Unique order IDs generated for existing orders.');
    }
}
