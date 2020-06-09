<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Addresse;
use App\Models\Bill;

class UsersController extends Controller
{
    public function index()
    {
    	$title = "Nhân viên";
    	$r = [['is_visible', 1],['role', '<>', 4]];
    	$users = User::where($r)->paginate();
        $count = User::where('is_visible', 1)->count();
        return view('admin.user.index', compact('title','users','count'));
    }
    public function customer()
    {
    	$title = "Khách hàng";
    	$r = [['is_visible', 1],['role', '=', 4]];
    	$users = User::where($r)->paginate();
        $count = User::where('is_visible', 1)->count();
        return view('admin.user.index', compact('title','users','count'));
    }
    public function infoUser($id)
    {
        $title = "Chi tiết";
        $info = User::find($id)->first();
        $add = User::find($id)->addresse()->get();
        $bills = User::find($id)->bill()->get();
        return view('admin.user.info_user', compact('title','info','add','bills'));
    }

    public function edit($id)
    {
        $title = 'Sửa thông tin';
        $users = User::find($id);
        //$role = User::selectfind($id)
        return view('admin.user.edit', compact('title','users'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|min:5|max:255',
                'phone' => 'required|numeric',
                'username' => 'required|min:5|max:255',
                'email' => 'required|email',
                'role' => 'required',
            ],

            [
                'required' => '*:attribute không được để trống',
                'min' => '*do dai cua :attribute phai nhieu hon :min ky tu',
                'max' => '*:attribute không được lớn hơn :max ky tu',
                'unique' => '*:attribute đã sử dụng',
                'numeric' => '*:attribute phải là số',
            ]
        );

        try {
            $user = User::find($id);
            
            
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->phone = $phone;
            $user->address = $request->address;
            $user->role = $request->role;
            $response = [
                'message' => trans('Cập nhập tài khoản thành công'),
                'data' => $user->save()
            ];

            if ($request->wantsJson()) {
                return response()->json($response);
            }

            return redirect('admin/user')->with(['message' => $response['message'], 'alert-class' => 'alert-success']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                            'error' => true,
                            'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function destroy() {
        $ids = Input::get('id');
        $arr_ids = explode(",", $ids);
        foreach ($arr_ids as $arr_idss) {
            $deleted = Bill::find($arr_idss)->update(['is_visible' => 0]);
        }  
        if (request()->wantsJson()) {
            return response()->json([
                        'message' => trans('Xóa hóa đơn thành công'),
                        'deleted' => $deleted,
            ]);
        }
        return redirect()->back()->with(['message' => trans('Xóa hóa đơn thành công'), 'alert-class' => 'alert-success']);
    }
}
