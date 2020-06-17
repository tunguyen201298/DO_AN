<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillStatus;
use App\Models\StatusBill;
use App\Models\InvoiceDetail;
use App\Models\Product;
use Illuminate\Support\Facades\Input;
use PDF;
use DB;

class BillsController extends Controller
{
    
    public function billShow()
    {
    	$title = "Đơn hàng";
    	$bills = Bill::where('active', 1)->paginate();
        $counts = Bill::where('active', 1)->count();
        $is_read = Bill::where('active', 1)->count();
        DB::table('bills')->update(['is_read' => 1]);
        return view('admin.bill.index', compact('title','bills','counts','is_read'));
    }

    public function invoice($id)
    {
        $title = "Chi tiết hóa đơn";
        $customer = Bill::find($id)->user()->first();
        $invoices = Bill::find($id)->invoiceDetails()->paginate();
        $invoice = InvoiceDetail::where('bill_id',$id)->get();
        $bills = Bill::find($id);
        $status = StatusBill::pluck('name', 'id');
        $statuses = StatusBill::find($bills->status_id);
        $status_bill = $statuses->name;
        return view('admin.bill.invoice', compact('title','invoices', 'bills', 'customer','invoice','status', 'status_bill'));
    }

    public function print($id)
    {
       $title = "Chi tiết hóa đơn";
       $customer = Bill::find($id)->first();
       $invoice = InvoiceDetail::where('bill_id', $id)->get();
       $no = 1;
       $pdf = PDF::loadView('admin.bill.print',compact('title','customer','invoice', 'no'));
        return $pdf->stream();
    }

    public function destroy() {
        
        $ids = Input::get('id');
        $arr_ids = explode(",", $ids);
        foreach ($arr_ids as $arr_idss) {
            $update = Bill::where('id',$arr_idss)->update(['active' => 0]);
        }  
        if (request()->wantsJson()) {
            return response()->json([
                        'message' => trans('Xóa hóa đơn thành công'),
                        'update' => $update
            ]);
        }
        return redirect()->back()->with(['message' => trans('Xóa hóa đơn thành công'), 'alert-class' => 'alert-success']);
    }

    public function active() {
        $a = Bill::whereId(Input::get("id"))->update(['is_visible' => Input::get("is_visible")]);
        dd($a);
        return response()->json('ok');
    }

}
