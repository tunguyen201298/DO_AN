<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\collection;
use Illuminate\Support\Facades\DB;
use App\Models\Promotion;

class PromotionsController extends Controller
{
    public function index()
    {
    	$title = "Khuyến Mãi";
    	$promotions = Promotion::with('products')->select('*')->get();
    	return view('products.promotion',compact('title','promotions'));
    }
}
