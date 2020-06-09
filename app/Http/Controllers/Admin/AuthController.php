<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Input;

class AuthController extends Controller
{
    public function getLogin(){
    	return view('admin.auth.login'); //trang này nên tạo 1 layout riêng
    }

    public function checkLogin(Request $request)
    {
    	
    	
        $remember = $request->has('remember') ? true : false;
       /* $user = User::where('email',$request->email )->first();
        $role = $user->role;
        dd($role);*/

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            return redirect(url('/admin'));
        } else {
            return redirect()->back()->with('messenger', 'Đăng nhập thất bại');
        }
    }
    public function getRegister()
    {
    	return view('admin.auth.register');
    }

    public function checkRegister(Request $request)
    {
        if (User::where('email', '=', Input::get('email'))->count() > 0) {
           $request->session()->flash('status', 'Email đã tồn tại!');
           return redirect('admin/register');
        }else{
            $this->validate(
                $request,
                [
                    'name' => 'required|min:5|max:255',
                    'username' => 'required|min:5|max:25',
                    'password' => 'required|min:5|max:25',
                    'cfpassword' => 'required|min:5|max:25|same:password',
                    'email' => 'required|email',
                    'role' => 'required',
                ],

                [
                    'required' => '*:attribute không được để trống',
                    'min' => '*do dai cua :attribute phai nhieu hon :min ky tu',
                    'max' => '*:attribute không được lớn hơn :max ky tu',
                    'email' => '*:attribute không đúng',
                    'same' => 'Password khong khớp',
                ]
            );

            $name = $request->name;
            $username = $request->username;
            $password = bcrypt($request->password);
            $email = $request->email;
            $street = $request->street;
            $role = $request->role;
            $phone = $request->phone;
            $birthdate = $request->birthdate;
            
            $user = new User();
            $user->name = $name;
            $user->username = $username;
            $user->password = $password;
            $user->email = $email;
            $user->street = $street;
            $user->role = $role;
            $user->phone = $phone;
            $user->birthdate = $birthdate;

            if($user->save()){
                return redirect('admin/login')->with('alert','Thêm thành công');
            }else{
                return redirect('admin/register')->with('alert','Không thành công');
            }
        }
        
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/admin');
    }
}
