<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('auth.login.form');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:100',
            'password' => 'required|max:15'
        ]);

        if (!auth()->attempt($request->only(['email', 'password']))) {
            Session::flash('wrongCredentials', 'Credenciales incorrectas.');
            return redirect()->route('login.index');
        }

        return redirect()->route('admin.index');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('home.index');
    }
}
