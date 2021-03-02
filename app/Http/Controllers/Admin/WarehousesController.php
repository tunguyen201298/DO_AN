<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Models\Product;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Bill;

class WarehousesController extends Controller
{
    public function index()
    {
    	$title = 'Nhà kho';
    	$warehouses = Product::paginate();
    	return view('admin.warehouse.index',compact('title','warehouses'));
    }
}
