<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Orders_on_service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderOnServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->isPersonal()) {
            $orders = Orders_on_service::paginate(10);
            return view('personal.orders', ['orders' => $orders]);
        }
        return redirect()->route('welcome');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->isUser()) {
            return view('auth.createServiceOrder');
        }
        return redirect()->route('welcome');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->isUser()) {
            $order = Orders_on_service::create([
                'rooms_idRoom' => $request->idRoom,
                'users_idUser' => $request->idUser,
                'status' => 'Новый',
                'services_idService' => $request->idService
            ]);
            $order->save();
            return redirect()->route('dashboard')->with('status', 'Заказ на услугу ' . $request->name . ' успешно добавлен');
        }
        return redirect()->route('welcome');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (Auth::user()->isPersonal()) {
            $order = Orders_on_service::find($id);

            return view('personal.order', ['order' => $order]);
        }
        return redirect()->route('welcome');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (Auth::user()->isPersonal()) {
            $order = Orders_on_service::find($id);
            return view('personal.orderEdit', ['order' => $order]);
        }
        return redirect()->route('welcome');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (Auth::user()->isPersonal()) {
            $order = Orders_on_service::find($id);
            $order->update([
                'status' => $request->status
            ]);
            return redirect()->route('orderService.index')->with('status', 'Услуга №' . $order->id . ' успешно изменена');
        }
        return redirect()->route('welcome');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Auth::user()->isPersonal()) {
            $order = Orders_on_service::find($id);
            $order->update([
                'status' => 'Выполнено'
            ]);
            $order->delete();
            return redirect()->route('orderService.index')->with('status', 'Заказ ' . $order->name . ' выполнен');
        }
        return redirect()->route('welcome');
    }
}
