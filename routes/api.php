<?php

use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\DriverController;
use App\Http\Controllers\Api\FavorController;
use App\Http\Controllers\Api\TransportController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(UserController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->middleware('auth:api');
});

Route::middleware('auth:api')->group(function () {
    Route::controller(TransportController::class)->group(function () {
        Route::get('/transports', 'index');
        Route::post('/transports', 'create');
        Route::get('/transports/{transport}', 'show');
        Route::put('/transports/{transport}', 'update');
        Route::delete('/transports/{transport}', 'delete');
    });

    Route::controller(DriverController::class)->group(function () {
        Route::get('/drivers', 'index');
        Route::post('/drivers', 'create');
        Route::get('/drivers/{driver}', 'show');
        Route::put('/drivers/{driver}', 'update');
        Route::delete('/drivers/{driver}', 'delete');
    });

    Route::controller(FavorController::class)->group(function () {
        Route::get('/favors', 'index');
        Route::post('/favors', 'create');
        Route::get('/favors/{favor}', 'show');
        Route::put('/favors/{favor}', 'update');
        Route::delete('/favors/{favor}', 'delete');
    });

    Route::controller(CustomerController::class)->group(function () {
        Route::get('/customers', 'index');
        Route::post('/customers', 'create');
        Route::get('/customers/{customer}', 'show');
        Route::put('/customers/{customer}', 'update');
        Route::delete('/customers/{customer}', 'delete');
    });
});
