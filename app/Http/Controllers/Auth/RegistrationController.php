<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{

    public function index()
    {
        return view('registration.registration');
    }

    public function store(Request $request)
    {
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
            'password' => Hash::make($request->password)
        ]);
        $user->save();
        Auth::login($user);
        return redirect()->route('dashboard');
    }
}
