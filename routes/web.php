<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function () {
        return view('home');
    });
    Route::get('home', function () {
        return view('home');
    })->name('home.index');
});

Route::middleware(['middleware' => 'guest'])->group(function () {
    Route::get('auth/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('auth/register', [RegisterController::class, 'store'])->name('register.store');
});

Route::middleware(['middleware' => 'guest'])->group(function () {
    Route::get('auth', function () {
        return view('auth.login.form');
    });
    Route::get('auth/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('auth/login', [LoginController::class, 'login'])->name('login.login');
});

route::group(['middleware' => 'auth'], function () {
    Route::get('admin', function () {
        return view('admin.index');
    })->name('admin.index');

    Route::get('auth/logout', [LoginController::class, 'logout'])->name('auth.logout');
});
