<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Addresse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Cart;

class AccountsController extends Controller
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

    public function register(){
        $title = "Đăng Kí";
        return view('accounts.register', compact('title'));
    }
    
    public function login(){
        $title = "Đăng Nhập";
        return view('accounts.login', compact('title'));
    }
    public function checkLogin(Request $request)
    {
        
        $remember = $request->has('remember') ? true : false;
         if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            return redirect()->back();
        } else {
            return redirect()->back()->with('messenger', 'Đăng nhập thất bại');
        }
    }

    public function checkRegister(Request $request)
    {
        
            $this->validate(
                $request,
                [
                    'name' => 'required|min:5|max:255',
                    'phone' => 'required|min:5|max:255',
                    'street' => 'required|min:5|max:255',
                    'username' => 'required|min:5|max:25',
                    'password' => 'required|min:5|max:25',
                    'cfpassword' => 'required|min:5|max:25|same:password',
                    'email' => 'required|email|unique:users'
                ],

                [
                    'required' => '*:attribute không được để trống',
                    'min' => '*do dai cua :attribute phai nhieu hon :min ky tu',
                    'max' => '*:attribute không được lớn hơn :max ky tu',
                    'email' => '*:attribute không đúng',
                    'same' => 'Password khong khớp',
                    'unique' => '*:attribute đã tồn tại'
                ]
            );

            $name = $request->name;
            $username = $request->username;
            $password = bcrypt($request->password);
            $email = $request->email;
            $street = $request->street;
            $role = 4;
            $phone = $request->phone;
            $birthdate = $request->birthdate;
            
            $user = new User();
            $user->name = $name;
            $user->username = $username;
            $user->password = $password;
            $user->email = $email;
            $user->role = !empty($role) ? $role : '';
            $user->birthdate = !empty($birthdate) ?$birthdate : '' ;
            $customer_id = User::SELECT('*')->orderBy('id', 'DESC')->LIMIT(1)->first();

            $addresses = new Addresse();
            $addresses->user_id = $customer_id->id + 1;
            $addresses->street = $street;
            $addresses->phone = $phone;
            $addresses->name = $name;

            if($user->save() && $addresses->save()){
                Auth::attempt(['email' => $request->email, 'password' => $request->password]);
                
                return redirect('/')->with('alert','Thêm thành công');
            }else{
                return redirect('/login')->with('alert','Không thành công');
            }
        
        
    }


    public function logout()
    {
        Cart::destroy();
        Auth::logout();
        return redirect('/');
    }
}
