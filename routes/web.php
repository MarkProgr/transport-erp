<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\FavorController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth')->group(function () {
    Route::get('/', [MainController::class, 'index'])->name('welcome');

    Route::resources([
        'transports' => TransportController::class,
        'drivers' => DriverController::class,
        'favors' => FavorController::class,
        'customers' => CustomerController::class
    ]);
    Route::post('/favors/create/type', [FavorController::class, 'chooseType'])->name('choose.type');
    Route::get('/favors/create/type', [FavorController::class, 'chooseTypeForm'])->name('choose.type.form');

    Route::get('/transports/find', [TransportController::class, 'find'])->name('transports.find');
});

Route::controller(UserController::class)->group(function () {
     Route::get('/register', 'registerForm')->name('register.form');
     Route::post('/register', 'register')->name('register');
     Route::get('/login', 'loginForm')->name('login.form');
     Route::post('/login', 'login')->name('login');
     Route::post('/logout', 'logout')->name('logout')->middleware('auth');
});
