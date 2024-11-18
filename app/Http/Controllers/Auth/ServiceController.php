<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->isAdmin()) {
            $services = Service::paginate(10);
            return view('admin.services', ['services' => $services]);
        }
        if (Auth::user()->isUser()) {
            $services = Service::all();
            return view('auth.services', ['services' => $services]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->isAdmin()) {
            return view('admin.serviceCreate');
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
        return redirect()->route('welcome');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (Auth::user()->isAdmin()) {
            $service = Service::find($id);
            return view('admin.service', ['service' => $service]);
        }
        if (Auth::user()->isUser()) {
            $service = Service::find($id);
            return view('auth.service', ['service' => $service]);
        }
        return redirect()->route('welcome');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (Auth::user()->isAdmin()) {
            $service = Service::find($id);
            return view('admin.serviceEdit', ['service' => $service]);
        }
        return redirect()->route('welcome');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (Auth::user()->isAdmin()) {
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
        return redirect()->route('welcome');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Auth::user()->isAdmin()) {
            $service = Service::find($id);
            $service->delete();
            return redirect()->route('service.index')->with('status', 'Услуга ' . $service->name . ' удалена');
        }
        return redirect()->route('welcome');
    }
}
