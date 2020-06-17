<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Product;
use App\Models\ImgLink;
use App\Models\InvoiceDetail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use App\models\Supplier;
use Illuminate\Support\Facades\Input;
use App\models\Category; //sử lại Models biết hoa hết kể cả thư mục
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function productShow()
    {	
    	$title = 'Sản phẩm';
    	$areas = Product::paginate();
    	return view('admin.areas.index', compact('title', 'areas'));
    }
    public function create()
    {
    	$title = 'Thêm mới sản phẩm';
        $area = new Supplier();
        $area->is_visible = 1;
        $n = '-- Chọn loại sản phẩm --';
        $s = '-- Chọn nhà cung cấp --';
        $categories = Category::where('parent_id','<>',0)->pluck('name', 'id');
        $supplier = Supplier::pluck('name', 'id');
    	return view('admin.areas.create', compact('title', 'categories', 'supplier','area','n','s'));
    }
    public function edit($id)
    {
    	$title = 'Sửa sản phẩm';
    	$area = Product::find($id);
        $category = Category::find($area->category_id);
        $n = $category->name;
        $supplier = Supplier::find($area->supplier_id);
        $s = $supplier->name;
    	$categories = Category::where('parent_id','<>',0)->pluck('name', 'id');
        $supplier = Supplier::pluck('name', 'id');
    	return view('admin.areas.edit', compact('title','area','categories','supplier','n','s'));
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
                'detail' => 'required|min:5',
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
                'detail' => 'required|min:5',
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
            $category = !$request->category ?  $product->category_id :  $request->category;
            $supplier = !$request->supplier ?  $product->supplier_id :  $request->supplier;
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
            $product->category_id = $category;
            $product->supplier_id = $supplier;
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
            $deleted = InvoiceDetail::where('product_id',$arr_idss)->delete();
        } 
        foreach ($arr_ids as $arr_idss) {
            $deleted = ImgLink::where('product_id',$arr_idss)->delete();
        } 
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
    public function active() {
        Product::whereId(Input::get("id"))->update(['is_visible' => Input::get("is_visible")]);
        return response()->json('ok');
    }

    public function search(Request $request) {
        $products = Product::select(DB::raw('name AS text'), 'id')->where('name', 'LIKE', '%' . $request->get('q') . '%')->skip(0)->take(10)->get();
        return response()->json($products);
    }
}
