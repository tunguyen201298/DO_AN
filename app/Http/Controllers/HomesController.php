<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\collection;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slide;
use App\Models\Image;
use Validator;
use Cart;

class HomesController extends Controller
{
   
    public function index(){
        $title = "Trang Sức Bạc PNJSilver";
        $products = Product::select('id','name', 'discount', 'price','img_link')
            ->get();
        $banner = Image::select('name')->where('type', 'banner')->get();
        $slide = Slide::select('title','content', 'image')->get();
        return view('homes.index', compact('title', 'products','slide','banner'));
        
    }
   
    
}
