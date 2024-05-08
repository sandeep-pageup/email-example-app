<?php

namespace App\Http\Controllers;

use App\Exports\ExportUser;
use App\Mail\WelcomeMail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

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

    public function exportUsers(Request $request){
        return Excel::download(new ExportUser($request), 'users.xlsx');
    }
}