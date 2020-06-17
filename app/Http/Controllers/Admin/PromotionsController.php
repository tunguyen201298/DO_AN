<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\Promotion;

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
    	$title = 'Thêm mới khuyến mãi';
    	return view('admin.promotion.create',compact('title','promotions'));
    }
    public function store(Request $request)
    {
    	$this->validate(
                $request,
                [
                    'promotion_name' => 'required|max:255',
                    'star_date' => 'required',
                    'end_date' => 'required',
                    'detail' => 'required|min:5'
                ],

                [
                    'required' => '*:attribute không được để trống',
                    'min' => '*do dai cua :attribute phai nhieu hon :min ky tu',
                    'max' => '*:attribute không được lớn hơn :max ky tu'
                ]
            );
    	try {
    		//dd($request->all());
    		$description = $request->description ? $request->description : null;
            $promotion = new Promotion();
            $promotion->promotion_name = $request->promotion_name;
            $promotion->star_date = $request->star_date;
            $promotion->end_date = $request->end_date;
            $promotion->detail = $request->detail;
            $promotion->description = $description;
            $promotion->save();

            $promotion->product()->attach($request->products);

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
                            'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }
    public function edit($id)
    {
        $title = 'Sửa khuyến mãi';
        $promotions = Promotion::find($id);
        $products = Promotion::find($id)->product();
        dd($products);
        $promotions->is_visible = 0;
        return view('admin.promotion.edit', compact('title','promotions', 'products'));
    }

    public function destroy() {

        $ids = Input::get('id');
        $arr_ids = explode(",", $ids);
        foreach ($arr_ids as $arr_idss) {
            $deleted = Promotion::find($arr_idss)->delete();
        }  
        if (request()->wantsJson()) {
            return response()->json([
                        'message' => trans('Xóa khuyến mãi thành công'),
                        'deleted' => $deleted,
            ]);
        }
        return redirect()->back()->with(['message' => trans('Xóa khuyến mãi thành công'), 'alert-class' => 'alert-success']);
    }

	    
}
