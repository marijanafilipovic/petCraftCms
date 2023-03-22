<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PetController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('pets', PetController::class);
    Route::get('customer-panel', CustomerController::class)->name('customer-panel');
    Route::get('admin-panel', CustomerController::class)->name('admin-panel');
});

Auth::routes();
