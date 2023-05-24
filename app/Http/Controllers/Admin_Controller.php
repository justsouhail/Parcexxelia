<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\DumpHandler;

class Admin_Controller extends Controller
{  
    
    public function index()    {
        return view('admin.index');
    }

    public function send(Request $request)
    {
        $token = bin2hex(random_bytes(32 / 5));
    
        if ($this->isonline()) {
            $mail_data = [
                'recipient' => $request->email,
                'fromEmail' => 'souhailaroud09@gmail.com',
                'fromName' => 'name',
                'subject' => 'sujet',
                'body' => $token
            ];
    
    
            Mail::send('admin.template', $mail_data, function ($message) use ($mail_data) {
                $message->to($mail_data['recipient']);
                $message->subject('llscscs');
            });
            return redirect()->back();
        } else {
            return "no connnn";
        }
    }
    
    public function  isonline($site = "https://www.youtube.com/"){
            if(@fopen($site , "r")){
                return true;
            }
            else{
                return false;
            }
    }
   
}
