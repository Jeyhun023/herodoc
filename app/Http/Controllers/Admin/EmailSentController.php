<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Email;
use App\Models\Email2;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvitationLetter;

class EmailSentController extends Controller
{
    // public function index()
    // {
    //     foreach($registration as $reg){
    //         $data['email'] = $reg['email'];
    //         $data['fullname'] = $reg['firstname']. ' ' . $reg['lastname'];
    //         $check = Email::where('email', $data['email'])->exists();
    //         if(!$check){
    //             $add = Email::create($data);
    //             echo $add;
    //         }
    //     }
    //     return "Successfully finished!"; 
    // }

    public function send()
    {
        $emails = Email::all();
        foreach($emails as $email){
            $mail = Mail::to($email->email)->send(new InvitationLetter());
            echo $mail;
        }
        return "Finished successfully";
    }

    public function reload()
    {
        $emails = Email2::where('id', '>', '8336')->get();
        foreach($emails as $email){
            $data['email'] = $email->fullname;
            $data['fullname'] = $email->email;

            $check = Email::where('email', $data['email'])->exists();

            if(!$check){
                $add = Email::create($data);
                echo $add;
            }
        }
        return "Finished successfully";
    }

}
