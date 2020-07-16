<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\models\Supplier;
use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\StatusBill;
use DB;

class HomesController extends Controller
{
    public function index()
    {   try{
            $title = 'Trang chủ';
            $is_read = Bill::where([['active', 1],['is_read',0]])->count(); 
            $status_bill_charts = Bill::select(
                'status_bills.name AS label', 
                DB::raw('count(*) as value'))
                    ->leftJoin('status_bills', 'bills.status_id', '=', 'status_bills.id')
                     ->groupBy('bills.status_id', 'status_bills.name')
                     ->get()->toArray();


                     $daily = Bill::select(DB::raw('Date(created_at) AS date'), DB::raw('SUM(total) AS total'))
                     ->groupBy(DB::raw('Date(created_at)'))->get();
                     //dd($temps->toArray());

            return view('admin.home.dashboard', compact('title','is_read','status_bill_charts', 'daily'));
        }catch(Exception $e){
            $title = "Không tìm thấy trang";
            return view('errors.404',compact('title'));
        }
        	
    	
    }
    public function slide()
    {
    	$title = 'Slide';
    	$suppliers = Supplier::paginate();
    	return view('admin.slide.index', compact('title','suppliers'));
    }

    public function getBillChart($dieu_kien){
        $status_bill_charts = Bill::select(
                'status_bills.name AS label', 
                DB::raw('count(*) as value'))
                    ->leftJoin('status_bills', 'bills.status_id', '=', 'status_bills.id')
                     ->groupBy('bills.status_id', 'status_bills.name')
                     ->get()->toArray();

                     return response()->json($status_bill_charts);
    }
}
