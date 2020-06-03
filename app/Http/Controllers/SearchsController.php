<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchsController extends Controller
{
    public function index(Request $request)
    {
    	$title = "Tìm kiếm";
    	$key = $request->search;
    	$search = Product::select('id','name', 'discount', 'price','img_link')->where('name', 'LIKE', '%' . $key . '%')->get();
    	//dd($search);
    	return view('searchs.search', compact('title','search'));
    }
}
