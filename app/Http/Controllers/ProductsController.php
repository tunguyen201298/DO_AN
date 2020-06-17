<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\collection;
use Illuminate\Support\Facades\DB;
use App\models\Category;
use App\models\Product;
use App\models\User;
use App\models\Review;
use App\models\ImgLink;
use App\models\Bill;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

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
        
        $review = Review::where('product_id', $id)->count() > 0 ? Review::where('product_id', $id)->get() : '';
        //$user = User::select('name')->where('id','=', Auth::user()->email)->get() : "";

        $product_detail = Product::find($id);
        $tt = Product::where('category_id',$product_detail->category_id)->get();
        $product_img = ImgLink::select('link')->where('product_id',$id)->get();
        $no = 1;
        $no1 = 1;
        return view('products.product_detail', compact('title','product_detail','product_img','no','no1','review','tt'));
    }

    public function productCategory($id)
    {
        $title = "Theo thể loại";
        $product_category = Product::where('category_id',$id)->get();
        return view('products.product_category', compact('title','product_category'));
    }

    public function productWishlist()
    {
        $title = "Sản phẩm yêu thích";
        //$product_category = Product::where('category_id',$id)->get();
        return view('products.product_wishlist', compact('title'));
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

    public function review(Request $request)
    {
        if (!empty($request->rating2)) {
            $id = $request->id;
            //$email = Auth::check() ? Auth::user()->email :'';
            $user = User::where('email','=', Auth::user()->email)->first();
            $user_id = $user->id;
            $name = $user->name;
            $title = !empty($request->title) ? $request->title : '';
            $content = !empty($request->content) ? $request->content : '';
            $review = new Review();
            $review->user_id = $user_id;
            $review->rating = $request->rating2;
            $review->title = $title;
            $review->product_id = $id;
            $review->name = $name;
            $review->content = $content;
            $response = [
            'message' => trans('Đánh giá thành công'),
            'data' => $review->save()
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
        }else{
            return response()->json('Vui lòng chọn số sao');
        }
    }
    public function trackOrder()
    {
        $title = "Kiểm tra đơn hàng";
        return view('track_order.track_order', compact('title'));
    }
    public function submitTrackOrder(Request $request)
    {
        $bill = Bill::find($request->bill_id)->first();
    }
    
}
