<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Addresse;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lng = 108.2124429;
        $lat = 16.0799072;
        $radians = 20;
        $title = "Ship";
        $km = Addresse::find(32)->selectRaw("*,
            ( 6371 * acos( cos( radians(" . $lat . ") ) *
            cos( radians(addresses.lat) ) *
            cos( radians(addresses.lng) - radians(" . $lng . ") ) + 
            sin( radians(" . $lat . ") ) *
            sin( radians(addresses.lat) ) ) ) 
            AS distance")
            ->having("distance", "<", $radians)
            ->orderBy("distance")
            ->get('distance');
        dd($km);
        return view('home');
    }
}
