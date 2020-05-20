<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bill;


class BillsController extends Controller
{
    
    public function billShow()
    {
    	$title = "Đơn hàng";
    	$bills = Bill::paginate();
        return view('admin.bill.index', compact('title','bills'));
    }
}
