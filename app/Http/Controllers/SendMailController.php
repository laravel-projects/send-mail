<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendMailController extends Controller
{
    public function index(){
    	return view('sendmail');
    }

    public function send(Request $req){
    	$this->validate($req, [
            'email' => 'required|email|max:255',
            'content' => 'required|min:6',
        ]); 
		Mail::to($req->email)
		    ->send(new SendMail($req));

        \Session::flash('msg','your message was successfully sent ...');
        return redirect()->back();

    }
}
