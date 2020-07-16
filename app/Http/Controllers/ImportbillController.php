<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImportBill;

class ImportbillController extends Controller
{
    public function index()
    {
    	$title = "Phiếu nhập";
    	$import_bills = ImportBill::all();
    	return view('import_bill.index', compact('title','import_bills'));
    }
}
