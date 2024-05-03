<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\UserController;

Route::get('/send-welcome-email', [EmailController::class, 'sendWelcomeEmail']);
Route::get('users', [UserController::class, 'index']);
Route::view('/', 'welcome');
