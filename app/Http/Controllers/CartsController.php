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
use Cart;
use Illuminate\Support\Facades\Auth;

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

   
    public function addCart(Request $request)
    {   
        dd($request->all());
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
        $cart = Cart::content();
        foreach ($request as $key) {
                echo $request->qty;
            exit();
            
        }
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
        $add = Auth::check() ? User::find('13')->addresse()->get() : '';
        $cart = Cart::content();
        return view('carts.checkout', compact('title', 'user', 'cart', 'add'));
    }
    public function success()
    {
        
        /*$user = new User();
            $user->name = $name;
            $user->username = $username;
            $user->password = $password;
            $user->email = $email;
            $user->role = !empty($role) ? $role : '';
            $user->birthdate = !empty($birthdate) ?$birthdate : '' ;
            $customer_id = User::SELECT('*')->orderBy('id', 'DESC')->LIMIT(1)->first();*/
        return view('errors.success');
    }

}
