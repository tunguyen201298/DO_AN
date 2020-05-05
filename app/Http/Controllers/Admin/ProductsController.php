<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Product;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use App\models\Supplier;
use App\models\Category; //sử lại Models biết hoa hết kể cả thư mục

class ProductsController extends Controller
{
    public function productShow()
    {	
    	$title = 'Sản phẩm';
    	$areas = Product::paginate();
    	//dùng view products
    	//ở version 5.3 thì da ngữ là trans('sdfdsfd') chứ ko phải __('dfsfd')    	
    	return view('admin.areas.index', compact('title', 'areas'));
    }
    public function create()
    {
    	$title = 'Thêm mới sản phẩm';
        $area = new Supplier();
        $area->is_visible = 1;
    	$category = Category::all();
        $supplier = Supplier::all();
    	return view('admin.areas.create', compact('title', 'category', 'supplier','area'));
    }
    public function edit($id)
    {
    	$title = 'Sửa sản phẩm';
    	$area = Product::find($id);
    	$category = Category::all();
        $supplier = Supplier::all();
    	return view('admin.areas.edit', compact('title','area','category','supplier'));
    }
    public function store(Request $request)
    {   
        $this->validate(
            $request,
            [
                'name' => 'required|min:5|max:255',
                'price' => 'required|numeric',
                'discount' => 'numeric',
                'image' => 'required',
                'detail' => 'required|min:5|max:25',
                'quantity' => 'numeric',
            ],

            [
                'required' => '*:attribute không được để trống',
                'min' => '*do dai cua :attribute phai nhieu hon :min ky tu',
                'max' => '*:attribute không được lớn hơn :max ky tu',
                'unique' => '*:attribute đã sử dụng',
                'numeric' => '*:attribute phải là số',
            ]
        );

        try{
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $name_img = $file->getClientOriginalName('file');
                $file->move('storage/app/products',$name_img);
            }
            $product = new Product();
            $product->name = $request->name;
            $product->price = $request->price;
            $product->detail = $request->detail;
            $product->img_link = $name_img;
            $product->category_id = $request->category;
            $product->supplier_id = $request->supplier;
            $product->discount = !empty($request->discount) ? $request->discount : 0;
            $product->quantity = $request->quantity;
            $response = [
                'message' => trans('Thêm mới sản phẩm thành công'),
                'data' => $product->save()
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect('admin/product')->with(['message' => $response['message'], 'alert-class' => 'alert-success']);
        }catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                            'error' => true,
                            'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|min:5|max:255',
                'price' => 'required|numeric',
                'discount' => 'numeric',
                'detail' => 'required|min:5|max:25',
                'quantity' => 'numeric',
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
            $product = Product::find($id);
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $name_img = $file->getClientOriginalName('file');
                $file->move('storage/app/products',$name_img);
            }else{
                $name_img = $product->img_link;
            }
            
            $product->name = $request->name;
            $product->price = $request->price;
            $product->detail = $request->detail;
            $product->img_link = $name_img;
            $product->category_id = $request->category;
            $product->supplier_id = $request->supplier;
            $product->discount = $request->discount;
            $product->quantity = $request->quantity;
            $response = [
                'message' => trans('Cập nhập sản phẩm thành công'),
                'data' => $product->save()
            ];

            if ($request->wantsJson()) {
                return response()->json($response);
            }

            return redirect('admin/product')->with(['message' => $response['message'], 'alert-class' => 'alert-success']);
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
            $deleted = Product::find($arr_idss)->delete();
        }  
        if (request()->wantsJson()) {
            return response()->json([
                        'message' => trans('Xóa sản phẩm thành công'),
                        'deleted' => $deleted,
            ]);
        }
        return redirect()->back()->with(['message' => trans('Xóa sản phẩm thành công'), 'alert-class' => 'alert-success']);
    }
}
