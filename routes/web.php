<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DefaultNotesController;
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

Route::middleware(['auth', 'auth.session'])->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::get('/secondary', function () {
        return view('secondary');
    })->name('secondary');
});

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login')->name('login');
    Route::get('/login', 'getLoginPage')->name('login.page');
});

Route::get('notes', [DefaultNotesController::class, 'list'])->name('notes.list');
