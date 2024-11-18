<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = Role::where('value', '=', 'Персонал')->first();
        $users = User::where('roles_idRole', '=', $role->id)->paginate(10);
        return view('admin.personals', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.personalCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role = Role::where('value', '=', 'Персонал')->first();
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'thirdname' => 'required',
            'phone' => 'required|max:17|min:10',
            'login' => 'required|min:5|unique:users,login',
            'password' => 'required|min:5'
        ]);
        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'thirdname' => $request->thirdname,
            'phone' => $request->phone,
            'login' => $request->login,
            'password' => Hash::make($request->password),
            'roles_idRole' => $role->id
        ]);
        $user->save();
        return redirect()->route('personal.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('admin.personal', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('admin.personalEdit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $request->validate([
            'login' => 'required|min:5',
            'phone' => 'required|min:10'
        ]);
        if ($request->password != '') {
            $user->update([
                'login' => $request->login,
                'password' => Hash::make($request->password),
                'phone' => $request->phone
            ]);
        } else {
            $user->update([
                'login' => $request->login,
                'phone' => $request->phone
            ]);
        }

        return redirect()->route('personal.index')->with('status', $user->surname . ' ' .  $user->name . ' ' . $user->thirdname . ' был успешно изменён');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('personal.index')->with('status', $user->surname . ' ' .  $user->name . ' ' . $user->thirdname . ' был удалён');
    }
}
