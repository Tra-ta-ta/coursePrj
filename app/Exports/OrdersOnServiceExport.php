<?php

namespace App\Exports;

use App\Models\Orders_on_service;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class OrdersOnServiceExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        $orders = Orders_on_service::withTrashed()->where('created_at', 'like', '%' . date('m') . '%')->get();
        return view('export.ordersService', [
            'orders' => $orders
        ]);
    }
}
