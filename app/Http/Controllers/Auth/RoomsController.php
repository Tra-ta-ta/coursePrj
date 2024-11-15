<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\TypeRoom;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::paginate(10);
        return view('admin.rooms', ['rooms' => $rooms]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roomCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([]);
        $room = Room::create([]);
        $room->save();
        return redirect()->route('room.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $room = Room::find($id);
        return view('admin.room', ['room' => $room]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $room = Room::find($id);
        $types = TypeRoom::all();
        return view('admin.roomEdit', ['room' => $room, 'types' => $types]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $room = Room::find($id);
        $request->validate([
            'status' => 'required',
            'idTypeRoom' => 'required'
        ]);
        $room->update([
            'statusRoom' => $request->status,
            'typeRoom_idTypeRoom' => $request->idTypeRoom
        ]);
        return redirect()->route('room.index')->with('status', 'Номер №' . $room->number . ' был успешно изменён');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room = Room::find($id);
        $room->delete();
        return redirect()->route('room.index')->with('status', 'Номер №' . $room->number . ' был удалён');
    }
}
