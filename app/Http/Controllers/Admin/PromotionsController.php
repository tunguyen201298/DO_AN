<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\Promotion;
use App\Models\product;
use App\Models\ProductPromotion;
use Illuminate\Support\Facades\DB;

class PromotionsController extends Controller
{
	public function index()
	{
		$title = "Khuyến mãi";
		$promotions = Promotion::where('is_visible', 1)->paginate();
	    $counts = Promotion::where('is_visible', 1)->count();
	    return view('admin.promotion.index', compact('title','promotions','counts'));
    }
    
	public function create()
    {
    	$promotions = new Promotion();
        $promotions->is_visible = 1;
        $type = '';
    	$title = 'Thêm mới khuyến mãi';
    	return view('admin.promotion.create',compact('title','promotions','type'));
    }

    public function store(Request $request)
    {
    	$this->validate(
            $request,
            [
                'promotion_name' => 'required|max:255',
                'star_date' => 'required',
                'end_date' => 'required',
                'detail' => 'required'
            ],

            [
                'required' => '*:attribute không được để trống',
                'min' => '*do dai cua :attribute phai nhieu hon :min ky tu',
                'max' => '*:attribute không được lớn hơn :max ky tu'
            ]
        );

    	try {
    		$description = $request->description ? $request->description : null;
            $promotion = new Promotion();
            $promotion->promotion_name = $request->promotion_name;
            $promotion->star_date = $request->star_date;
            $promotion->end_date = $request->end_date;
            $promotion->type = $request->type;
            $promotion->detail = $request->detail;
            $promotion->description = $description;
            $promotion->save();
            $promotion->products()->attach($request->products);

            foreach ($request->products as $item) {
                $product = Product::find($item);
                $discount = $request->type == 'gia' ? $request->detail : $product->price-($product->price*$request->detail/100);
                DB::table('products')->where('id', $item)->update(['discount' => $discount]);
            }

            $response = [
                'message' => trans('Thêm mới khuyến mãi thành công'),
                'data' => $promotion
            ];

            if ($request->wantsJson()) {
                return response()->json($response);
            }

            return redirect('admin/promotion')->with(['message' => $response['message'], 'alert-class' => 'alert-success']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error' => true,
                    'message' => $e->getMessageBag(),
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function edit($id)
    {
        $title = 'Sửa khuyến mãi';
        $promotions = Promotion::find($id);
        $type = $promotions->type;
        $products = Promotion::find($id)->products()->get();
        $promotions->is_visible = 0;
        return view('admin.promotion.edit', compact('title','promotions', 'products','type'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'promotion_name' => 'required|max:255',
                'star_date' => 'required',
                'end_date' => 'required',
                'detail' => 'required'
            ],

            [
                'required' => '*:attribute không được để trống',
                'min' => '*do dai cua :attribute phai nhieu hon :min ky tu',
                'max' => '*:attribute không được lớn hơn :max ky tu'
            ]
        );
        try {
            $description = $request->description ? $request->description : null;
            $promotion = Promotion::find($id);
            $promotion->promotion_name = $request->promotion_name;
            $promotion->star_date = $request->star_date;
            $promotion->end_date = $request->end_date;
            $promotion->type = $request->type;
            $promotion->detail = $request->detail;
            $promotion->description = $description;
            $promotion->save();
            $promotion->products()->attach($request->products);

            foreach ($request->products as $item) {
                $product = Product::find($item);
                
                $discount = $request->type == 'gia' ? $request->detail : $product->price-($product->price*$request->detail/100);
                DB::table('products')->where('id', $item)->update(['discount' => $discount]);
            }

            $response = [
                'message' => trans('Cập nhập khuyến mãi thành công'),
                'data' => $promotion,
            ];

            if ($request->wantsJson()) {
                return response()->json($response);
            }

            return redirect('admin/promotion')->with(['message' => $response['message'], 'alert-class' => 'alert-success']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error' => true,
                    'message' => $e->getMessageBag(),
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function destroy() 
    {
        $ids = Input::get('id');
        $arr_ids = explode(",", $ids);
       
        foreach ($arr_ids as $arr_idss) {
            $deleted = ProductPromotion::where('promotion_id',$arr_idss)->with('promotions')
                    ->join('promotions', 'promotions.id', '=', 'product_promotion.promotion_id')
                    ->delete();
            DB::table('products')->where('id', $ids)->update(['discount' => null]);
            $deleted1 = Promotion::find($arr_idss)->delete();
        }  

        if (request()->wantsJson()) {
            return response()->json([
                'message' => trans('Xóa khuyến mãi thành công'),
                'deleted' => $deleted,
                'deleted1' => $deleted1,
            ]);
        }
        return redirect()->back()->with(['message' => trans('Xóa khuyến mãi thành công'), 'alert-class' => 'alert-success']);
    }

	    
}
