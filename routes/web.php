<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('users', UserController::class);
Route::resource('payments', PaymentController::class);
