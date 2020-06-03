<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\InvoiceDetail;
use App\Models\Product;
use Illuminate\Support\Facades\Input;
use PDF;

class BillsController extends Controller
{
    
    public function billShow()
    {
    	$title = "Đơn hàng";
    	$bills = Bill::where('active', 1)->paginate();
        $count = Bill::where('active', 1)->count();
        return view('admin.bill.index', compact('title','bills','count'));
    }

    public function invoice($id)
    {
        $title = "Chi tiết hóa đơn";
        $customer = Bill::find($id)->user()->first();
        $invoices = Bill::find($id)->invoiceDetails()->paginate();
        $id_bill = Bill::select()->max('id');
        $invoice = InvoiceDetail::where('bill_id',$id_bill)->get();
        $bills = Bill::find($id)->first();
        return view('admin.bill.invoice', compact('title','invoices', 'bills', 'customer','invoice'));
    }

    public function print()
    {
       $title = "Chi tiết hóa đơn";
       $pdf = PDF::loadView('admin.bill.print',compact('title'));
        return $pdf->stream();
    }

    public function destroy() {
        $ids = Input::get('id');
        $arr_ids = explode(",", $ids);
        foreach ($arr_ids as $arr_idss) {
            $deleted = Bill::find($arr_idss)->update(['active' => 0]);
        }  
        if (request()->wantsJson()) {
            return response()->json([
                        'message' => trans('Xóa hóa đơn thành công'),
                        'deleted' => $deleted,
            ]);
        }
        return redirect()->back()->with(['message' => trans('Xóa hóa đơn thành công'), 'alert-class' => 'alert-success']);
    }
}
