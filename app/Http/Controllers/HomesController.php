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
use App\Models\Blog;
use App\Models\Promotion;
use Validator;
use App\models\Review;
use Cart;
use Illuminate\Support\Facades\Mail;
use App\Models\Bill;

class HomesController extends Controller
{
   
    public function index(){
        $title = "Phong Thủy Shop";
        $product = Product::Orderby('id', 'DESC')->limit('10')->where('is_visible', 1)
            ->get();
        $pro_sell = Product::Orderby('qty_number_sell', 'asc')->limit('10')->where('is_visible', 1)->get();
        $pro_new = Product::Orderby('id', 'DESC')->limit('10')->get();
        $blog = Blog::Orderby('id', 'DESC')->limit('5')->get();
        $banner = Image::where('type', 'banner')->Orderby('id', 'DESC')->first();
        $slide = Slide::where('is_visible',1)->get();
        $promotions = Promotion::with('products')->get();
        $start_review = new Review();
        return view('homes.index', compact('title', 'product','slide','banner', 'pro_sell','blog','pro_new','promotions','start_review'));
        
    }
    public function introduce()
    {
        $title = "Giới thiệu";
        $blog_detail = Blog::select('*')->limit('1')->first();
        return view('blog.introduce', compact('title','blog_detail'));  
    }

}
