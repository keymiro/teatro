<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TheaterController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ReservationController;

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


Auth::routes(['register' => false]);
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::middleware(['blocked'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/theaters/{id}', [TheaterController::class, 'index'])->name('theaters.index');
    Route::get('/users/{id}/active', [UserController::class,'active'])->name('users.active');

    Route::resource('users', UserController::class);
    Route::resource('reservations', ReservationController::class);

});




