<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;

Route::get('/send-welcome-email', [EmailController::class, 'sendWelcomeEmail']);
Route::view('user-view', 'user');
Route::get('export-users',[EmailController::class,'exportUsers'])->name('export-users');
