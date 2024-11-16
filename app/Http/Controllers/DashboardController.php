<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Orders_on_service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $orders = Order::withTrashed()->where('users_idUser', '=', Auth::user()->id)->paginate(10);
        $orders_on_service = Orders_on_service::withTrashed()->where('users_idUser', '=', Auth::user()->id)->paginate(10);
        return view('auth.dashboard', ['orders' => $orders, 'orders_on_service' => $orders_on_service]);
    }
}
