<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;

Route::get('/send-welcome-email', [EmailController::class, 'sendWelcomeEmail']);
Route::get('download-pdf', [EmailController::class, 'download_pdf']);
