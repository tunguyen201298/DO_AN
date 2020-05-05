<?php

namespace App\Http\Controllers;

class ContactsController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function contact(){
        $title = "Liên hệ";
        return view('contact.contact', compact('title'));
    }
}
