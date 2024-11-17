<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Room;
use App\Models\TypeRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\OrdersExport;
use Maatwebsite\Excel\Facades\Excel;


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
            $isUserHasOrder = Order::where('users_idUser', '=', $request->idUser)->first();
            $room = Room::where('users_idUser', '=', null)->where('typeRoom_idTypeRoom', '=', $request->idTypeRoom)->first();
            if (!isset($isUserHasOrder)) {
                if (isset($room)) {
                    $request->validate([
                        'onDate' => 'required|after_or_equal:tomorrow|date',
                        'duration' => 'required|min_digits:1'
                    ]);
                    $order = Order::create([
                        'message' => $request->message,
                        'onDate' => $request->onDate,
                        'duration' => $request->duration,
                        'typeRoom_idTypeRoom' => $request->idTypeRoom,
                        'users_idUser' => $request->idUser,
                        'status' => 'Новый'
                    ]);
                    $order->save();
                    return redirect()->route('login')->with('status', 'Заказ успешно отправлен');
                }
                return redirect()->route('dashboard')->with('status', 'Нет свободных номеров, извините');
            }
            return redirect()->route('order.create')->with('status', 'У вас уже есть заказ');
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
        if (Auth::user()->isAdmin()) {
            $order = Order::find($id);
            $rooms = Room::all()->where('typeRoom_idTypeRoom', '=', $order->typeRoom_idTypeRoom)->where('users_idUser', '=', null);
            return view('admin.orderEdit', ['order' => $order, 'rooms' => $rooms]);
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
        if (Auth::user()->isAdmin()) {
            $order = Order::find($id);
            $room = Room::find($request->idRoom);
            $request->validate([
                'idRoom' => 'required'
            ]);
            $order->update([
                'status' => 'Принят',
                'rooms_idRoom' => $request->idRoom
            ]);
            $room->update([
                'users_idUser' => $order->users_idUser,
                'isBusy' => 1,
                'statusRoom' => 'Занят'
            ]);
            return redirect()->route('order.index')->with('status', 'Заказ был принят');
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
            $room = Room::where('users_idUser', '!=', null)->where('id', '=', $order->rooms_idRoom)->first();
            $order->update([
                'status' => 'Выполнен или отменён'
            ]);
            if (isset($room)) {
                $room->update([
                    'users_idUser' => null,
                    'statusRoom' => 'Свободно',
                    'isBusy' => 0
                ]);
            }

            $order->delete();
            return redirect()->route('order.index')->with('status', 'Заказ был удалён');
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
    public function createReport()
    {
        return Excel::download(new OrdersExport, 'ordersIn' . date('M') . '.xlsx');
    }
}
