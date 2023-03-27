<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PetController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('pets', PetController::class);
    Route::get('customer-panel', [HomeController::class, 'userPanel'])->name('customer-panel');
    Route::get('admin-panel', [HomeController::class, 'adminPanel'])->name('admin-panel');
    Route::get('pet-edit/{pet}', [PetController::class, 'edit'])->name('pet-edit');

});

/*Route::controller(PetController::class)
     ->group(function () {
        Route::get('/', [PetController::class, 'index'])->name('pets.index');
        Route::get('pet-create', 'create')->name('pets.create');
        Route::get('pet-edit/{pet}', 'edit')->name('pet-edit');
        Route::post('/pets-store', [PetController::class, 'store'])->name('pets-store');
        Route::get('/{pet}', [PetController::class, 'show'])->name('pets.show');
        Route::put('/{pet}', [PetController::class, 'update'])->name('pets.update');
        Route::delete('/{pet}', [PetController::class, 'delete'])->name('pets.destroy');
        Route::get('/', [HomeController::class, 'index'])->name('home');
    });*/
