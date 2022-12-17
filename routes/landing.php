<?php

use App\Http\Controllers\Landing\AccountController;
use App\Http\Controllers\Landing\HomeController;
use Illuminate\Support\Facades\Route;

// Get
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('account', [AccountController::class, 'index'])->name('account.landing');
Route::put('account/update', [AccountController::class, 'update'])->name('account.update.landing');
Route::get('change/password', [AccountController::class, 'change_password_page'])->name('change.password.landing');
Route::put('change/password/update', [AccountController::class, 'change_password_update'])->name('change.password.update.landing');

