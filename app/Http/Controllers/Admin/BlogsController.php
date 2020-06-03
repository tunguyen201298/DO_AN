<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class BlogsController extends Controller
{
    public function index()
    {
    	$title = "Hình ảnh banner";
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
}
