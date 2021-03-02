<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class BlogsController extends Controller
{
    public function index()
    {
    	$title = "Bài viết";
    	$blogs = Blog::paginate();
    	return view('admin.blog.index',compact('title','blogs'));
    }

     public function create()
    {
    	$blog = new Blog();
        $blog->is_visible = 1;
    	$title = 'Thêm mới bài viết';
    	return view('admin.blog.create',compact('title','blog'));
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'title' => 'required|min:5|max:255',
                'content' => 'required|min:5'
            ],

            [
                'required' => '*:attribute không được để trống',
                'min' => '*do dai cua :attribute phai nhieu hon :min ky tu',
                'max' => '*:attribute không được lớn hơn :max ky tu'
            ]
        );

        try {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $name_img = $file->getClientOriginalName('file');
                $file->move('storage/app/blog-post',$name_img);
            }
            $blog = new Blog();
            $blog->title = $request->title;
            $blog->content = $request->content;
            $blog->image = $name_img;

            $response = [
                'message' => trans('Thêm mới bài viết thành công'),
                'data' => $blog->save()
            ];

            if ($request->wantsJson()) {
                return response()->json($response);
            }
            return redirect('admin/blog')->with(['message' => $response['message'], 'alert-class' => 'alert-success']);
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
        $title = 'Sửa bài viết';
        $blog = Blog::find($id);
        return view('admin.blog.edit', compact('title','blog'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'title' => 'required|min:5|max:255',
                'content' => 'required|min:5',
            ],

            [
                'required' => '*:attribute không được để trống',
                'min' => '*do dai cua :attribute phai nhieu hon :min ky tu',
                'max' => '*:attribute không được lớn hơn :max ky tu',
            ]
        );

        try {
            $blogs = Blog::find($id);
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $name_img = $file->getClientOriginalName('file');
                $file->move('storage/app/blog-post',$name_img);
            }else{
                $name_img = $blogs->image;
            } 
            $blog = Blog::find($id);
            $blog->title = $request->title;
            $blog->content = $request->content;
            $blog->image = $name_img;
            $response = [
                'message' => trans('Sửa bài viết thành công'),
                'data' => $blog->save()
            ];

            if ($request->wantsJson()) {
                return response()->json($response);
            }

            return redirect('admin/blog')->with(['message' => $response['message'], 'alert-class' => 'alert-success']);
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
            $deleted = Blog::find($arr_idss)->delete();
        }  
        if (request()->wantsJson()) {
            return response()->json([
                'message' => trans('Xóa bài viết thành công'),
                'deleted' => $deleted,
            ]);
        }
        return redirect()->back()->with(['message' => trans('Xóa bài viết thành công'), 'alert-class' => 'alert-success']);
    }

    public function active() {
        Blog::whereId(Input::get("id"))->update(['is_visible' => Input::get("is_visible")]);
        return response()->json('ok');
    }
}
