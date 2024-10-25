<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CreateEventController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\UserAuth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.welcome.index');
});

Route::middleware(UserAuth::class)->group(function () {
    Route::resource('category', CategoryController::class);
    Route::resource('events', CreateEventController::class);
    Route::get('/login', [LoginController::class, 'index'])->name('login');

    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
