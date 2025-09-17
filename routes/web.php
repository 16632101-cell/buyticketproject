<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard (ต้อง login ก่อน)
Route::get('/dashboard', function () {
    if (!session()->has('user')) {
        return redirect()->route('login')->with('error', 'กรุณาเข้าสู่ระบบก่อน');
    }

    return view('dashboard', [
        'user' => session('user')
    ]);
})->name('dashboard');