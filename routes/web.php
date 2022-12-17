<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('admin')->middleware('auth', 'admin')->group(function() {
    // Dashboard
    Route::get('/dashboard', [App\Http\Controllers\Dashboard\DashboardController::class, 'dashboard'])->name('dashboard');

    require __DIR__.'/admin.php';
});

Route::prefix('landing')->group(function() {
    require __DIR__.'/landing.php';
});

require __DIR__.'/auth.php';
