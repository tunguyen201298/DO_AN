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
}
