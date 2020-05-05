<?php

namespace App\Http\Controllers;

class MenuController extends Controller
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

    public function cart(){
        $title = "Giỏ Hàng";
        return view('carts.cart', compact('title'));
    }
}
