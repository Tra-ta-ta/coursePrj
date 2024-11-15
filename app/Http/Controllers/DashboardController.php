<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $orders = Order::where('users_idUser', '=', Auth::user()->id)->paginate(10);
        return view('auth.dashboard', ['orders' => $orders]);
    }
}
