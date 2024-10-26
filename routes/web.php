<?php

use App\Http\Controllers\AttendeeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CreateEventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WelcomeScreenController;
use App\Http\Middleware\UserAuth;
use Illuminate\Support\Facades\Route;

Route::resource('home', WelcomeScreenController::class);
Route::resource('/', WelcomeScreenController::class);

Route::middleware(UserAuth::class)->group(function () {
    Route::resource('category', CategoryController::class);
    Route::resource('events', CreateEventController::class);
    Route::resource('attendee', AttendeeController::class);
    Route::get('/login', [LoginController::class, 'index'])->name('login');

    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
