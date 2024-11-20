<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class OrdersExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        $orders = Order::withTrashed()->where('onDate', 'like', '%' . date('m') . '%')->get();
        $full_price = 0;
        foreach ($orders as $order) {
            $full_price += $order->checkType()->price * $order->duration;
        }
        return view('export.orders', [
            'orders' => $orders,
            'full_price' => $full_price
        ]);
    }
}
