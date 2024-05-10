<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;

Route::get('/send-welcome-email', [EmailController::class, 'sendWelcomeEmail']);
Route::view('/', 'welcome', ["website_name" => 'Click Kart']);