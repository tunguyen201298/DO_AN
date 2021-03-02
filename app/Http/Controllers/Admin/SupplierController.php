<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Support\Facades\Input;

class SupplierController extends Controller
{
    public function index()
    {
    	$title = 'Nhà cung cấp';
    	$suppliers = Supplier::paginate();
    	return view('admin.supplier.index',compact('title','suppliers'));
    }
    public function create()
    {
    	$suppliers = new Supplier();
        $suppliers->is_visible = 1;
    	$title = 'Thêm mới nhà cung cấp';
    	return view('admin.supplier.create',compact('title','suppliers'));
    }
    public function store(Request $request)
    {
    	$this->validate(
                $request,
                [
                    'name' => 'required|min:5|max:255',
                    'street_1' => 'required|min:5|max:25',
                    'street_2' => 'min:5|max:25',
                    'email' => 'required|unique:suppliers,email|email',
                    'phone' => 'numeric',
                ],

                [
                    'required' => '*:attribute không được để trống',
                    'min' => '*do dai cua :attribute phai nhieu hon :min ky tu',
                    'max' => '*:attribute không được lớn hơn :max ky tu',
                    'email' => '*:attribute không đúng',
                    'unique' => '*:attribute đã sử dụng',
                    'numeric' => '*:attribute phải là số',
                ]
            );
    	try {
            $supplier = new Supplier();
            $supplier->name = $request->name;
            $supplier->street_1 = $request->street_1;
            $supplier->street_2 = $request->street_2;
            $supplier->phone = $request->phone;
            $supplier->email = $request->email;

            $response = [
                'message' => trans('Thêm mới nhà cung cấp thành công'),
                'data' => $supplier->save()
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect('admin/supplier')->with(['message' => $response['message'], 'alert-class' => 'alert-success']);
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

    public function edit($id)
    {
    	$title = 'Sửa nhà cung cấp';
    	$suppliers = Supplier::find($id);
    	return view('admin.supplier.edit', compact('title','suppliers'));
    }

    public function update(Request $request, $id)
    {
    	$this->validate(
                $request,
                [
                    'name' => 'required|min:5|max:255',
                    'street_1' => 'required|min:5|max:25',
                    'street_2' => 'min:5|max:25',
                    'email' => 'required|email',
                    'phone' => 'numeric',
                ],

                [
                    'required' => '*:attribute không được để trống',
                    'min' => '*do dai cua :attribute phai nhieu hon :min ky tu',
                    'max' => '*:attribute không được lớn hơn :max ky tu',
                    'email' => '*:attribute không đúng',
                    'numeric' => '*:attribute phải là số',
                ]
            );
    	try {
            $supplier = Supplier::find($id);
            $supplier->name = $request->name;
            $supplier->street_1 = $request->street_1;
            $supplier->street_2 = $request->street_2;
            $supplier->phone = $request->phone;
            $supplier->email = $request->email;
            $response = [
                'message' => trans('Cập nhập nhà cung cấp thành công'),
                'data' => $supplier->save()
            ];

            if ($request->wantsJson()) {
                return response()->json($response);
            }

            return redirect('admin/supplier')->with(['message' => $response['message'], 'alert-class' => 'alert-success']);
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
            $deleted = Supplier::find($arr_idss)->delete();
        }  
        if (request()->wantsJson()) {
            return response()->json([
                        'message' => trans('Xóa nhà cung cấp thành công'),
                        'deleted' => $deleted,
            ]);
        }
        return redirect()->back()->with(['message' => trans('Xóa nhà cung cấp thành công'), 'alert-class' => 'alert-success']);
    }

    public function active() {
        Supplier::whereId(Input::get("id"))->update(['is_visible' => Input::get("is_visible")]);
        return response()->json('ok');
    }

    
}
