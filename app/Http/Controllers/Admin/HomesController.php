<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\models\Supplier;
use App\Http\Controllers\Controller;

class HomesController extends Controller
{
    public function index()
    {
    	$title = 'Home';
		return view('admin.home.dashboard', compact('title'));
    	
    }
    public function slide()
    {
    	$title = 'Slide';
    	$suppliers = Supplier::paginate();
    	return view('admin.slide.index', compact('title','suppliers'));
    }
}

//mở code a giở lên