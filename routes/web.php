<?php

use App\Http\Controllers\PetController;
use App\Models\Pet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $pets = DB::table('users')
        ->join('pets', 'users.id', '=', 'pets.user_id')
        ->select('users.name as owner',
            'pets.id as id',
            'pets.old as old',
            'pets.species as species',
            'pets.name as name',
            'pets.image as image'
        )
        ->paginate(5);
        return  view('welcome', ['pets'=> $pets]);
});

Route::get('/home', [App\Http\Controllers\CustomerController::class, 'panel'])->name('home');

Route::get('/pet-create', [App\Http\Controllers\PetController::class, 'create'])->name('pet-create');
Route::post('/pet-store', [App\Http\Controllers\PetController::class, 'store'])->name('pet-store');
Route::get('/pet-edit/{petID}', [App\Http\Controllers\PetController::class, 'edit'])->name('pet-edit');
Route::post('/pet-put/{petID}', [App\Http\Controllers\PetController::class, 'update'])->name('pet-put');
Route::delete('/pet-destroy/{petID}', [App\Http\Controllers\PetController::class, 'delete'])->name('pet-destroy');

Auth::routes();


