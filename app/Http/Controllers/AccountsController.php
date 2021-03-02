<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Addresse;
use Illuminate\Support\Facades\Log;
use Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

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
         if (Auth::attempt(['email' => $request->email, 'password' => $request->password ], $remember)) {
            $active = User::where('email',$request->email)->first();
            if ($active->actives == 1) {
                
               return redirect()->route('home');
            }else{
                return redirect()->back()->with('message', 'Tài khỏa của bạn chưa đc kích hoạt');
            }
        } else {
            return redirect()->back()->with('message', 'Đăng nhập thất bại');
        }
    }

    public function profile()
    {
        $title = 'Thông tin người dùng';
        $auth_id = Auth::user()->id;
        $user = User::with('addresse')
                    ->with(['bill' => function($query){
                        $query->with('invoiceDetails')->get();
                    }])
                    ->find($auth_id);
        
        return view('accounts.profile', compact('user', 'title'));
    }

    public function editProfile()
    {
        $title = 'Chỉnh sửa thông tin';
        $user = User::find(Auth::user()->id);
        return view('accounts.edit_profile', compact('title', 'user'));
    }

    public function updateDefaultAddress(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->addresse()->where('default', 1)->update(['default' => 0]);
        $resuft = $user->addresse()->where('id', $request->id)->update(['default' => 1]);
        if (!$resuft) {
            $data = [
                'status' => false,
                'mesage' => 'Đổi địa chỉ mặc định thất bại',
            ];
        }
        $data = [
            'status' => true,
            'message' => 'Đổi địa chỉ mặc định thành công',
        ];
        return $data;
    }


    public function updateProfile(Request $request)
    {
        dd($request->all());
    }

    public function changePassword()
    {
        $title = 'Đổi mật khẩu';
        return view('accounts.change_password', compact('title'));
    }

    public function checkPassword(Request $request)
    {
        $mes = '';
        $pass = bcrypt($request->password);
        $user = User::find(Auth::user()->id);
        
        if (!Hash::check($pass, $user)) {
            $mes = 'Mật khẩu không đúng';
        }
        return response()->json(['message' => $mes]);
    }

    public function checkRegister(Request $request)
    {
        $confirmation_code = time().uniqid(true);
            $this->validate(
                $request,
                [
                    'name' => 'required|min:5|max:255',
                    'phone' => 'required|min:5|max:255',
                    'street' => 'required|min:5|max:255',
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
            $email = $request->email;
            $name = $request->name;
            $password = bcrypt($request->password);
            
            $street = $request->street;
            $role = 4;
            $phone = $request->phone;
            $birthdate = $request->birthdate;
            
            $user = new User();
            $user->name = $name;
            $user->password = $password;
            $user->email = $email;
            $user->phone = $phone;
            $user->address = $street;
            $user->role = !empty($role) ? $role : '';
            $user->birthdate = !empty($birthdate) ?$birthdate : '' ;
            $user->confirmation_code = $confirmation_code;

            if($user->save())
            {
                $customer_id = User::select()->max('id');
                $addresses = new Addresse();
                $addresses->user_id = $customer_id;
                $addresses->street = $street;
                $addresses->phone = $phone;
                $addresses->name = $name;

                if( $addresses->save()){
                    Mail::send('email.verify', ['confirmation_code' => $confirmation_code], function ($message) use ($email,$name) {
                        $message->from('tudtdt1998@gmail.com', 'Shop đá phong thủy Mixi');
                        $message->to($email, $name);
                        $message->subject('Xác nhận địa chỉ email của bạn');
                    
                    });
                    //Auth::attempt(['email' => $request->email, 'password' => $request->password]);
                    return redirect('login')->with('status', 'Xác nhận địa chỉ email của bạn');
                    //return redirect('/')->with('alert','Thêm thành công');
                }
                return redirect('login')->with('alert','Không thành công');
            }
        
        
    }


   
    public function forgotPasswordSubmit(Request $request)
    {
        $email = $request->email;

        $length = 10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $newpass = bcrypt($randomString);
        $user = User::where('email',$email)->first();
        if ($user) {
            $user->update(['password' => $newpass]);
            Mail::send('email.forgot_password', ['randomString' => $randomString], function ($message) use ($email) {
                $message->from('tudtdt1998@gmail.com', 'Shop đá phong thủy Mixi');
                $message->to($email, $email);
                $message->subject('Mật khẩu mới của bạn');
            });
            return redirect(route('login'))->with('newpass','Kiểm tra mail để lấy mật khẩu');
        }else{
            return redirect('forgot-password')->with('check','Email không tồn tại');
        }
    }
    public function logout()
    {
        Cart::destroy();
        Auth::logout();
        return redirect(route('home'));
    }


    public function activateUser($code)
    {
        $user = User::where('confirmation_code', $code);

        if ($user->count() > 0) {
            $user->update([
                'actives' => 1,
                'confirmation_code' => null
            ]);
            $notification_status = 'Bạn đã xác nhận thành công';
        } else {
            $notification_status ='Mã xác nhận không chính xác';
        }

        return redirect(route('login'))->with('status', $notification_status);
    }
    public function forgotPassword()
    {
        return view('accounts.forgot_password');
    }
}
