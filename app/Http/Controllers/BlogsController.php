<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
 
class BlogsController extends Controller
{
    public function index()
    {
    	$title = "Bài viết";
    	$blogs = Blog::where('is_visible',1)->get();
    	return view('blog.blog', compact('title','blogs'));
    }

    public function detail($id)
    {
    	$title = "Bài viết";
    	$blog_detail = Blog::find($id);
    	return view('blog.blog_detail', compact('title','blog_detail'));
    }

    public function contact()
    {
        $title = "Liên hệ";
        //$blog_detail = Blog::find($id);
        return view('contact.contact', compact('title'));
    }
}
