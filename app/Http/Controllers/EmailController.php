<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;

class EmailController extends Controller
{
    public function sendWelcomeEmail()
    {
        SendEmailJob::dispatch();
        return "Email sent successfully!";
    }
}
