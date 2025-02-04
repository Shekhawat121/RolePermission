<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{LoginController, HomeController};

Route::get('/', [HomeController::class, 'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
