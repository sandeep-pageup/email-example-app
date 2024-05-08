<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendWelcomeEmail()
    {
        try{
            Mail::to('cs20136@global.org.in')->send(new WelcomeMail());
        } catch(Exception $e) {
            return $e->getMessage();
        }

        return "Email sent successfully!";
    }

    public function user_ids(){
        return User::find(10)->ids;
    }
}