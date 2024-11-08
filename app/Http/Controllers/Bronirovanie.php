<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class Bronirovanie extends Controller
{
    public function index(){
        return view('bron');
    }
    public function createBron(Request $request){
        $valideted = $request->validate([
            'Duration' => 'required|max:2|integer',
            'onDate' => 'required|date',
            'Message' => 'required',
            'TypeRoom_idTypeRoom' => 'required'
        ]);

        $order = Order::create([
            'Duration' => $request->Duration,
            'onDate' => $request->onDate,
            'Message' => $request->Message,
            'TypeRoom_idTypeRoom' => $request->TypeRoom_idTypeRoom,
            'Users_idUser' => 1
        ]);

        $order->save();
        return view('bron');
    }
}
