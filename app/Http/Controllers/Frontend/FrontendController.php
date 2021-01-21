<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ContactMailer;
use Mail;


class FrontendController extends Controller
{
    public function contact()
    {
        return view('frontend.pages.contact');
    }
    public function sendMailContactForm(Request $request){
        // $email = $request->email;
        // $message = $request->message;

        $input = $request->all();

        Mail::to('quynhb1706634@student.ctu.edu.vn')
        ->send(new ContactMailer($input));

    }
}
