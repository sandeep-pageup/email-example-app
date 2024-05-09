<?php

namespace App\Http\Controllers;

use App\Exports\ExportUser;
use App\Mail\WelcomeMail;
use App\Models\User;
use Exception;
use Illuminate\Contracts\View\View;
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

    public function user_report(){
        return View('user')->with('users' , User::all('name', 'email')->take(10));
    }

    public function exportUsers(Request $request){
        return Excel::download(new ExportUser($request), 'users.xlsx');
    }
}