<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
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

    public function download_pdf() {
        $from = User::all();
        $to = User::where('id', 212);
        $pdf = PDF::loadView('welcome',['from'=>$from,'to'=>$to]);
        return $pdf->stream('my.pdf');
    }
}