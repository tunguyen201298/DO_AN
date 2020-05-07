<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\collection;
use Illuminate\Support\Facades\DB;
use App\models\Slide;
use App\Http\Controllers\Controller;

class SlideController extends Controller
{
    public function sliderShow()
    {	
    	$title = 'Slider Show';
    	$slide = Slide::paginate();
    	//dùng view products
    	//ở version 5.3 thì da ngữ là trans('sdfdsfd') chứ ko phải __('dfsfd')    	
    	return view('admin.slide.index', compact('title', 'slide'));
    }
    public function create()
    {
    	$slide = new Slide();
        $slide->is_visible = 1;
    	$title = 'Thêm mới slider';
    	return view('admin.slide.create',compact('title','slide'));
    }
     public function edit($id)
    {
        $title = 'Sửa Slider';
        $slide = Slide::find($id);
        $slide->is_visible = 0;
        return view('admin.slide.edit', compact('title','slide'));
    }
    public function update(Request $request, $id)
    {
        $this->validate(
                $request,
                [
                    'title' => 'required|max:255',
                    'content' => 'required|min:5|max:255'
                ],

                [
                    'required' => '*:attribute không được để trống',
                    'min' => '*do dai cua :attribute phai nhieu hon :min ky tu',
                    'max' => '*:attribute không được lớn hơn :max ky tu'
                ]
            );
        try {
            $slider = Slide::find($id);
            $slider->title = $request->title;
            $slider->content = $request->content;
            $slider->image = $request->image;
            $response = [
                'message' => trans('Cập nhập slider thành công'),
                'data' => $slider->save()
            ];

            if ($request->wantsJson()) {
                return response()->json($response);
            }

            return redirect('admin/slider')->with(['message' => $response['message'], 'alert-class' => 'alert-success']);
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
            $deleted = Slide::find($arr_idss)->delete();
        }  
        if (request()->wantsJson()) {
            return response()->json([
                        'message' => trans('Xóa slider thành công'),
                        'deleted' => $deleted,
            ]);
        }
        return redirect()->back()->with(['message' => trans('Xóa nhà cung cấp thành công'), 'alert-class' => 'alert-success']);
    }
}