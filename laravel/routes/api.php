<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('users', UserController::class);
Route::resource('blogs', BlogController::class);
