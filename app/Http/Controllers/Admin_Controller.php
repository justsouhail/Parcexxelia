<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\verifytoken;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDO;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\DumpHandler;

class Admin_Controller extends Controller
{  
    public function  VerifyView(){

            return  view('admin.verify');
    }

    public function send(Request $request){
        
        $validToken = rand(10,100..'2022');
        
        $get_token=new verifytoken();
        $get_token->token=$validToken;
        $get_token->email=$request->email;
        $get_token->save();
        $get_user_email = $request->email;
        $get_user_name = 'admin';
        
        Mail::send('admin.mailmessage' ,['token' => $validToken] , function($message){
            $message->to('souhailaroud09@gmail.com' , 'online')->subject('sujet');
        });
    }
    
    public function index()    {

        $user = Auth::user();
        if($user->is_admin){
            return view('admin.index');
        }
    else{
        return redirect('/admin/verify');
    }
        
    }


    public function backupView(){

        return view('admin.backup');
    }

    public function parametreView(){
        return view('admin.parametre');
    }
   
}
