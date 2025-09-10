<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

