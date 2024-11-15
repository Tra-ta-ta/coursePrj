<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\TypeRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->isAdmin()) {
            $orders = Order::paginate(10);
            return view('admin.orders', ['orders' => $orders]);
        }

        return redirect()->route('welcome');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->isUser()) {
            $types = TypeRoom::all();
            return view('auth.orderCreate', ['types' => $types]);
        }
        return redirect()->route('welcome');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->isUser()) {
            $request->validate([
                'onDate' => 'required|after_or_equal:tomorrow|date',
                'duration' => 'required|min_digits:1'
            ]);
            $room = Order::create([
                'message' => $request->message,
                'onDate' => $request->onDate,
                'duration' => $request->duration,
                'typeRoom_idTypeRoom' => $request->idTypeRoom,
                'users_idUser' => Auth::user()->id,
                'status' => 'Новый'
            ]);
            $room->save();
            return redirect()->route('login')->with('status', 'Заказ успешно отправлен');
        }
        return redirect()->route('welcome');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (Auth::user()->isAdmin()) {
            $order = Order::find($id);
            return view('admin.order', ['order' => $order]);
        }
        return redirect()->route('welcome');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (Auth::user()->isUser()) {
            $order = Order::find($id);
            $types = TypeRoom::all();
            return view('auth.orderEdit', ['order' => $order, 'types' => $types]);
        }
        return redirect()->route('welcome');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (Auth::user()->isUser()) {
            $order = Order::find($id);
            $request->validate([
                'status' => 'required',
                'idTypeRoom' => 'required'
            ]);
            $order->update([
                'statusRoom' => $request->status,
                'typeRoom_idTypeRoom' => $request->idTypeRoom
            ]);
            return redirect()->route('login')->with('status', 'Заказ был изменён');
        }
        return redirect()->route('welcome');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Auth::user()->isAdmin()) {
            $order = Order::find($id);
            $order->update([
                'status' => 'Выполнен'
            ]);
            $order->delete();
            return redirect()->route('room.index')->with('status', 'Заказ №' . $order->number . ' был удалён');
        }
        if (Auth::user()->isUser()) {
            $order = Order::find($id);
            $order->update([
                'status' => 'Удалён пользователем'
            ]);
            $order->delete();
            return redirect()->route('login')->with('status', 'Заказ был удалён');
        }
    }
}
