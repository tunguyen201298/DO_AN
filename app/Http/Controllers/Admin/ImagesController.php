<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Image;

use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{
    public function index()
    {
    	$title = "Hình ảnh banner";
    	$images = Image::paginate();
    	return view('admin.image.banner.index',compact('title','images'));
    }
    public function create()
    {
    	$image = new Image();
        $image->is_visible = 1;
    	$title = 'Thêm mới banner';
    	return view('admin.image.banner.create',compact('title','image'));
    }
    public function store(Request $request)
    {
    	try{
            if ($request->hasFile('name')) {
                $file = $request->file('name');
                $name_img = $file->getClientOriginalName('file');
                $file->move('storage/app/banners',$name_img);
            }
           	$image = new Image();
            $image->name = $name_img;
            $image->type = $request->type;

            $response = [
                'message' => trans('Thêm ' .$image->type. ' thành công'),
                'data' => $image->save()
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect('admin/img/banner')->with(['message' => $response['message'], 'alert-class' => 'alert-success']);
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
}
