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
use Validator;
use Cart;
use Illuminate\Support\Facades\Mail;
use App\Models\Bill;

class HomesController extends Controller
{
   
    public function index(){
        $title = "Shop đá Mixi";
        $products = Product::Orderby('id', 'asc')->limit('10')->where('is_visible', 1)
            ->get();
        $pro_sell = Product::Orderby('qty_number_sell', 'asc')->limit('10')->where('is_visible', 1)->get();
        $pro_new = Product::Orderby('id', 'asc')->limit('10')->get();
        $blog = Blog::Orderby('id', 'asc')->limit('5')->get();
        $banner = Image::where('type', 'banner')->first();
        $slide = Slide::where('is_visible',1)->get();
        return view('homes.index', compact('title', 'products','slide','banner', 'pro_sell','blog','pro_new'));
        
    }

    /*public function myTestMail()
    {
    	$data = Bill::
    	$email = 'thanhtrungtran8888@gmail.com';
    	Mail::send('email.index', $data, function ($message) use ($email) {
            $message->from('tudtdt1998@gmail.com', 'Giày Store');

            $message->to($email , $email);
            $message->subject('Xác nhận hóa đơn mua hàng Giày Store');
        
        });
    	
    }*/
   
    
}
