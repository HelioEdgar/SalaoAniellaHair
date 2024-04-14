<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    //
    public function send(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'subject'=>'required',
            'message'=>'required'
        ]);

        if($this->isOnline()){
            $email_data = [
                'recipient'=>'aniellahair.salaodebeleza@gmail.com',
                'fromEmail'=>$request->email,
                'fromName'=>$request->name,
                'subject'=>$request->subject,
                'body'=>$request->message
            ];

            \Mail::send('email_template, $email_data', function($message) use ($mail_data){
                $message->to($email_data['recipient'])
                        ->from($email_data['fromEmail'],$email_data['fromName'])
                        ->subject($email_data['subject']);
            });

            return redirect()->back()->with('sucess', 'Email Enviado!');

        }else{
            return redirect()->back()->withInput()->with('error','Verifique a sua conexão a internet');
        }
    }

    public function isOnline($site = 'https://youtube.com/'){
        if(@fopen($site, "r")){
            return true;
        }else{
            return false; 
        }
    }
}
