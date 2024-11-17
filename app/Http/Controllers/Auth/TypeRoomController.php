<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\TypeRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypeRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->isAdmin()) {
            $typerooms = TypeRoom::paginate(10);
            return view('admin.typerooms', ['typerooms' => $typerooms]);
        }
        if (Auth::user()->isUser()) {
            $typerooms = TypeRoom::all();
            return view('auth.typerooms', ['typerooms' => $typerooms]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->isAdmin()) {
            return view('admin.typeroomsCreate');
        }
        return redirect()->route('welcome');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->isAdmin()) {
            $request->validate([
                'typeRoom' => 'required|min:5',
                'description' => 'required',
                'price' => 'required|min_digits:1'
            ]);
            $typeroom = TypeRoom::create([
                'typeRoom' => $request->typeRoom,
                'description' => $request->description,
                'price' => $request->price
            ]);
            $typeroom->save();
            return redirect()->route('typeRooms.index')->with('status', 'Тип ' . $request->name . ' успешно добавлен');
        }
        return redirect()->route('welcome');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (Auth::user()->isAdmin()) {
            $typeroom = TypeRoom::find($id);
            return view('admin.typeroom', ['typeroom' => $typeroom]);
        }
        if (Auth::user()->isUser()) {
            $typeroom = TypeRoom::find($id);
            return view('auth.typeroom', ['typeroom' => $typeroom]);
        }
        return redirect()->route('welcome');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (Auth::user()->isAdmin()) {
            $typeroom = TypeRoom::find($id);
            return view('admin.typeroomEdit', ['typeroom' => $typeroom]);
        }
        return redirect()->route('welcome');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (Auth::user()->isAdmin()) {
            $typeroom = TypeRoom::find($id);
            $request->validate([
                'typeRoom' => 'required|min:5',
                'description' => 'required',
                'price' => 'required|min_digits:1'
            ]);
            $typeroom->update([
                'typeRoom' => $request->typeRoom,
                'description' => $request->description,
                'price' => $request->price
            ]);
            return redirect()->route('typeRooms.index')->with('status', 'Тип №' . $typeroom->id . ' успешно изменен');
        }
        return redirect()->route('welcome');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Auth::user()->isAdmin()) {
            $typeroom = TypeRoom::find($id);
            $typeroom->delete();
            return redirect()->route('typeRooms.index')->with('status', 'Услуга ' . $typeroom->name . ' удалена');
        }
        return redirect()->route('welcome');
    }
}
