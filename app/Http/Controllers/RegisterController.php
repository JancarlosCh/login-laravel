<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.register.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|max:100',
            'password' => 'required_with:password_confirmation|same:password_confirmation|max:15',
            'password_confirmation' => 'required|max:15'
        ]);

        $user = User::create($request->only([
            'name',
            'email',
            'password'
        ]));

        Session::flash('userRegistered', 'Usuario registrado correctamente, por favor, inicie sesión.');

        return redirect()->route('login.index');
    }
}
