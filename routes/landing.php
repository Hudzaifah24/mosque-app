<?php

use App\Http\Controllers\Landing\HomeController;
use Illuminate\Support\Facades\Route;

// Get
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('account', function() {
    return view('pages.landingPage.contents.account.account');
})->name('account.landing');
Route::get('change/password', function() {
    return view('pages.landingPage.contents.account.change_password');
})->name('change.password.landing');

