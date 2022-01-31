<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\SendNewMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    function store(Request $request){
        //dd($request->all());
        $data = $request->all();

        Mail::to(env('MAIL_CONTACT_DESTINATION'))->send(new SendNewMail($data));
    }
}
