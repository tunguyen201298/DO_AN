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
use App\models\Addresse;
use App\models\InvoiceDetail;
use App\models\StatusBill;
use App\models\ImgLink;
use App\models\Bill;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Cart;
use Carbon\Carbon;

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
        Carbon::setLocale('vi');
        $now = Carbon::now();
        $product_detail = Product::find($id);
        $count_qty = $product_detail->quantity;
        $count_review = Review::where('product_id', $id)->count();
        $start_review = new Review();
        $sum_start_detail = $start_review->startReview($id);
        $tt = Product::where([['category_id',$product_detail->category_id],['is_visible',1]])->get();
        $product_img = $product_detail->imgLink()->get();
        $no = 1;
        $no1 = 0;
        return view('products.product_detail', compact('title','product_detail','product_img','no','no1','review','tt','count_qty','count_review','sum_start_detail','start_review','now'));
    }

    public function productCategory($id)
    {
        $title = "Theo thể loại";
        $product_category = Product::where('category_id',$id)->paginate();
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
    public function productShow(){
        $title = 'Sản phẩm';
        $products = Product::paginate(6);
        return view('products.product', compact('title','products'));
    }

    public function review(Request $request)
    {
        $id = $request->id;
        $user = User::where('email','=', Auth::user()->email)->first();
        $user_id = $user->id;
        $name = $user->name;
        $title = !empty($request->title) ? $request->title : '';
        $content = !empty($request->content) ? $request->content : '';

        $review = new Review();
        $review->user_id = $user_id;
        $review->rating = $request->rating;
        $review->title = $title;
        $review->product_id = $id;
        $review->name = $name;
        $review->content = $content;
        $response = [
        'message' => trans('Đánh giá thành công'),
        'data' => $review->save()
        ];
        return response()->json($response);
    }
    public function trackOrder()
    {
        $title = "Kiểm tra đơn hàng";
        return view('track_order.track_order', compact('title'));
    }
    public function submitTrackOrder(Request $request)
    {
        $bills = Bill::find($request->bill_id);
        if (!$bills) {
            return redirect()->back()->with('trackoder', 'Không tìm thấy đơn hàng');
        }else{
            return redirect()->route('success-view',['id'=>$bills->id]);
        }
    }
    public function successView($id)
    {
        $bills = Bill::find($id);
        $title = "Kiểm tra đơn hàng";
        $bills = Bill::find($id);
        $user =Auth::user();
        $cart = Cart::content();
        $id_stt = $bills->status_id;
        $stt = StatusBill::where('id',$id_stt)->first();
        $add = Addresse::where([['user_id',$user->id],['default',1]])->first();
        $invoice = InvoiceDetail::where('bill_id',$bills->id)->get();
        return view('errors.success',compact('title','user','cart','add','bills','invoice','stt'));
    }
    public function deleteBill($id)
    {
        DB::table('bills')->where('id',$id)->update(['status_id'=>3]);
        return redirect()->back()->with('updatebill', 'Hủy đơn hàng thành công');
    }

}
