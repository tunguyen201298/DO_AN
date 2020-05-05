<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\collection;
use Illuminate\Support\Facades\DB;
use App\models\Category;
use App\models\Product;
use App\models\ImgLink;

use Validator;
class ProductsController extends Controller
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
    public function __construct()
    {

    }
    public function listView(){
        $title = "List";
        return view('products.list_view', compact('title'));
    }
    public function productDetail(Request $request, $id){
        $title = "Chi Tiết Sản Phẩm";
        $product_detail = Product::find($id);
        $product_img = ImgLink::select('link')->where('product_id',$id)->get();
        return view('products.product_detail', compact('title','product_detail','product_img'));
    }
    public function gridView(){
        $title = 'Grid View';
        return view('products.grid_view', compact('title'));
    }
    public function threeColumn(){
        $title = 'Three Column';
        return view('products.three_column', compact('title'));
    }
    public function fourColumn(){
        $title = 'Four Column';
        return view('products.four_column', compact('title'));
    }

    public function reviews(Request $request)
    {
       $this->validate(
            $request,
            [
                'username' => 'required|min:5|max:255',
                'summary' => 'required|min:5|max:255',
                'review' => 'required|min:5|max:255',
                'rate' => 'required'
            ],

            [
                'required' => '*:attribute không được để trống',
                'min' => '*do dai cua :attribute phai nhieu hon :min ky tu',
                'max' => '*:attribute không được lớn hơn :max ky tu'
            ]
        );
    }
    public function product()
    {
      
        //

    }
}
