<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

Route::get('/send-welcome-email', [EmailController::class, 'sendWelcomeEmail']);

Route::get('all-users', function(){
    return User::all();
});

// get() - returns Illuminate\Support\Collection
Route::get('get-users', function() {
    return User::orderBy('id', 'desc')->take(10)->get();
});

// Retrieving a Single Row From a Table
Route::get('get-a-user', function() {
    return User::where('name' , 'Orin Ebert')->first();
});

// Retrieving a Single Column value From a Table - only single column value
Route::get('get-a-user-email', function() {
    return User::where('name' , 'Orin Ebert')->value('email');
});

// To retrieve a single row by its id column value, use the find method:
Route::get('get-a-user-by-id', function() {
    return User::find(216)->first();
});

// If you would like to retrieve an Illuminate\Support\Collection instance containing the values of a single column, you may use the pluck method
Route::get('all-emails', function() {
    return User::pluck('email');
});

// Get key-value pair - key - second parameter
Route::get('all-emails-with-ids', function() {
    return User::pluck( 'email' , 'id');
});

// Chunking
Route::get('chunk-users', function() {
    return User::orderBy('id', 'desc')->chunk(50 , function(Collection $users) {
        foreach ($users as $user) {
            var_dump($user->name);
        }
        var_dump("___________________________________");
    });
});

// Raw Expressions 
// Route::get('all-emails-with-ids', function() {
//     User::
//          select(DB::raw('count(*) as id, is_active'))
//         ->where('is_active', 1)
//         ->groupBy('status')
//         ->get();
// });

// Inner Join 
Route::get('join-users-with-posts', function() {
    return User::join('posts', 'users.id', '=', 'posts.user_master_id')
                ->select('users.id', 'users.name', 'posts.post_name')->get();
});

// Left Join - all records of left table
Route::get('join-users-with-posts-left', function() {
    return User::leftJoin('posts', 'users.id', '=', 'posts.user_master_id')
                ->get();
});

// Right Join - all records of right table
Route::get('join-users-with-posts-right', function() {
    return User::rightJoin('posts', 'users.id', '=', 'posts.user_master_id')
                ->get();
});

// Re-retrieve records 
Route::get('re-retrieve-users', function() {
    $user = User::where('id', 219)->first();
    $re_retrieved_user = $user->fresh();
    return array($user , $re_retrieved_user);
});