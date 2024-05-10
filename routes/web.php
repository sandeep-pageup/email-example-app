<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;

Route::get('/send-welcome-email', [EmailController::class, 'sendWelcomeEmail']);
Route::view('/', 'welcome', ["website_name" => 'Click Kart']);


// Passing data to view 
Route::view('show-user', 'welcome', ['name' => 'Sandeep Patel']);

// Using php()
Route::view('show-user-with-time', 'welcome',
['name' => 'Sandeep Patel', 'show_time' => true]);

// componant 
Route::view('componant', 'renderComponant');   

// passing data to componant - will be availible to it's child view
Route::view('componant', 'renderComponant', ['contact' => 9302325460]);        
