<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::paginate(10);
        return view('admin.services', ['services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.serviceCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'discriprion' => 'required'
        ]);
        $service = Service::create([
            'name' => $request->name,
            'discriprion' => $request->discriprion
        ]);
        $service->save();
        return redirect()->route('service.index')->with('status', 'Услуга ' . $request->name . ' успешно добавлена');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service = Service::find($id);
        return view('admin.service', ['service' => $service]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = Service::find($id);
        return view('admin.serviceEdit', ['service' => $service]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service = Service::find($id);
        $request->validate([
            'name' => 'required',
            'discriprion' => 'required'
        ]);
        $service->update([
            'name' => $request->name,
            'discriprion' => $request->discriprion
        ]);
        return redirect()->route('service.index')->with('status', 'Услуга №' . $service->id . ' успешно изменена');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::find($id);
        $service->delete();
        return redirect()->route('service.index')->with('status', 'Услуга ' . $service->name . ' удалена');
    }
}
