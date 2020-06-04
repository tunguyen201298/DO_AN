<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\collection;
use App\Models\Product;
use App\Models\Addresse;
use App\Models\User;
use App\Models\Bill;
use App\Models\InvoiceDetail;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CartsController extends Controller
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

    /*public function index()
    {
        $id_bill = Bill::select()->max('id');
        $a = InvoiceDetail::select('product_id')->where('bill_id', $id_bill)->get();
        $p = Product::find($a)->invoicedetail()->where('bill_id', $id_bill)->get(); 
        dd($a);
    }*/


    public function addCart(Request $request)
    {   
        $id = $request->id ; 
        $quantity = $request->qty ? $request->qty : 1;
        $product_detail = Product::find($id);
        $name = $product_detail->name;
        $price = $product_detail->discount ? $product_detail->discount : $product_detail->price;
        $img = $product_detail->img_link;
        Cart::add([
            'id' => $id, 
            'name' => $name, 
            'qty' => $quantity, 
            'price' => $price,
            'options' => ['img' => $img]
        ]);
        return redirect('cart-show');
        
    }

    public function addCartAjax(Request $request)
    {   
        $id = $request->id ; 
        $quantity = 1;
        $product_detail = Product::find($id);
        $name = $product_detail->name;
        $price = $product_detail->discount ? $product_detail->discount : $product_detail->price;
        $img = $product_detail->img_link;
        Cart::add([
            'id' => $id, 
            'name' => $name, 
            'qty' => $quantity, 
            'price' => $price,
            'options' => ['img' => $img]
        ]);
        return response()->json(['status' => 'success', 'data' => $product_detail]);
        
    }

    public function showCart()
    {
        if (!Auth::check()) {
            $title = "Đăng Nhập";
            return view('accounts.login', compact('title'));
        }else{
            $title = "Giỏ Hàng";
            $cart = Cart::content();
            $subtotal = Cart::subtotal(0,0,',');
            $error = 'Giỏ hàng rỗng';
            return view('carts.cart', compact('title','cart', 'subtotal','error'));
        }
    }

    public function cartUpdate(Request $request)
    {
       $quantity = $request->newQty;
       $rowId = $request->rowId;
       
       $cart = Cart::update($rowId,$quantity);
       $total = Cart::subtotal(0,0,',');
       return response()->json(['code' => 'ok', 'data' => $cart,'total' => $total]);
    }

    public function deleteAll()
    {
        Cart::destroy();
        return redirect('cart-show');
    }

    public function removeCart($rowId)
    {
        Cart::remove($rowId);
        return redirect('cart-show');
    }
    public function checkout()
    {
        $title = 'Thanh toán';
        $user = Auth::user();
        $id_cus = $user->id;
        $add = Auth::check() ? User::find($id_cus)->addresse()->get() : '';
        $cart = Cart::content();
        return view('carts.checkout', compact('title', 'user', 'cart', 'add'));
    }
    public function successPost($id)
    {
       
            $subtotal = Cart::subtotal(0,'',''); 
            $user =Auth::user();
            $cart = Cart::content();
            $add = Addresse::find($id);
            
            

            $bill = new Bill();
            $bill->user_id = $user->id;
            $bill->name = $add->name;
            $bill->phone = $add->phone;
            $bill->address = $add->street;
            $bill->total = $subtotal;
            $bill->email = $user->email;
            $bill->status = 1;
            if($bill->save())
            {
                $id_bill = Bill::select()->max('id');
                $bills = Bill::find($id_bill);
                foreach ($cart as $value) {
                    $invoice = new InvoiceDetail();
                    $invoice->bill_id = $id_bill;
                    $invoice->product_id = $value->id;
                    $invoice->product_name = $value->name;
                    $invoice->quantity = $value->qty;
                    $invoice->price = $value->price;
                    $invoice->total = $value->price*$value->qty;
                    $invoice->save();
                    $qty_number_sell = 0;
                   
                    $qty_pr = Product::select('quantity')->where('id',$value->id)->first();
                    $qty_update = $qty_pr->quantity - $value->qty;
                    $qty_number_sell += $value->qty;
                    Product::where('id', $value->id)->update(['quantity'=> $qty_update, 'qty_number_sell' => $qty_number_sell]);
                    
                    //Product::where('id', $value->id)->update('qty_number_sell', $qty_number_sell);
                }
                /*foreach ($cart as $value) {
                    # code...
                }*/


                Cart::destroy();
                return redirect(url('success-get/'.$id));

            }else
            {
                $id_bill = Bill::select()->max('id');
                Bill::delete('id_bill');
            }
            
    }

    public function successGet($id)
    {
        
        $user =Auth::user();
        $cart = Cart::content();
        $id_bill = Bill::select()->max('id');
        $bills = Bill::find($id_bill);
        $add = Addresse::find($id);
        $invoice = InvoiceDetail::where('bill_id',$id_bill)->get();

        $data['invoice'] =  $invoice;
        $data['customer'] = $bills;
        $email = $bills->email;
        Mail::send('email.index', $data, function ($message) use ($email) {
            $message->from('tudtdt1998@gmail.com', 'Shop đá phong thủy Mixi');
            $message->to($email , $email);
            $message->subject('Xác nhận hóa đơn mua hàng Shop đá phong thủy Mixi');
        
        });
        return view('errors.success',compact('user','cart','add','bills','invoice'));
    }

    public function cartInfo()
    {
        
            $cart = Cart::content();
            $subtotal = Cart::subtotal(0,0,',');
            
        return response()->json(['total' => $subtotal, 'cartLists' => $cart]);
    }

    public function address(Request $request)
    {

        $addresses = new Addresse();
        $addresses->user_id = $request->id;
        $addresses->street = $request->street;
        $addresses->phone = $request->phone;
        $addresses->name = $request->name;
        if ($addresses->save()) {
            return response()->json(['code' => 'Thêm mới thành công']);
        }
    }
}
