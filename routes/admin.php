<?php

use App\Http\Controllers\Dashboard\AccountController;
use App\Http\Controllers\Dashboard\CashController;
use App\Http\Controllers\Dashboard\JadwalSholatController;
use App\Http\Controllers\Dashboard\KajianController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\RoleController;
use Illuminate\Support\Facades\Route;


// Resources
Route::resource('/user', UserController::class);
Route::resource('/role', RoleController::class);
Route::resource('/kajian', KajianController::class);
Route::resource('/cash', CashController::class);

// Get
Route::get('/jadwal/sholat', [JadwalSholatController::class, 'index'])->name('jadwal.sholat');
Route::get('/account', [AccountController::class, 'index'])->name('account');
Route::put('/account/{id}', [AccountController::class, 'update'])->name('account.update');

// Post
Route::put('/reset/password/{id}', [UserController::class, 'reset'])->name('reset.password');
