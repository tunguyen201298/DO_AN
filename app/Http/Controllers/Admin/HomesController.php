<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\models\Supplier;
use App\Http\Controllers\Controller;
use App\Models\Bill;

class HomesController extends Controller
{
    public function index()
    {
    	$title = 'Home';
        $is_read = Bill::where([['active', 1],['is_read',0]])->count();
		return view('admin.home.dashboard', compact('title','is_read'));
    	
    }
    public function slide()
    {
    	$title = 'Slide';
    	$suppliers = Supplier::paginate();
    	return view('admin.slide.index', compact('title','suppliers'));
    }
}

//mở code a giở lên