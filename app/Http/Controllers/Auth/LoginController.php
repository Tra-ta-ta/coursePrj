<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function login(Request $request){
        if(Auth::attempt($request->only('login', 'password'))){
            return redirect()->route('dashboard');
        }
        return back()->withErrors([
            'login' => 'Таких данных не существует!'
        ])->onlyInput('login');
    }
}
