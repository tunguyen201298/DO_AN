<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\StatusBill;
use App\Models\InvoiceDetail;
use Illuminate\Support\Facades\Input;
use PDF;
use Illuminate\Support\Facades\DB;

class BillsController extends Controller
{
    
    public function billShow(Request $request)
    {
        try{
            $title = "Đơn hàng";
            $bills = ($request->all()) ?   
                        Bill::Orderby('id', 'DESC')
                        ->where('active', 1)
                        ->where($request->key, 'like', '%' . $request->search . '%')
                        ->orWhere($request->key, $request->search )
                        ->paginate() : 
                        Bill::Orderby('id', 'DESC')
                        ->where('active', 1)
                        ->paginate() ;
            $counts = Bill::where('active', 1)->count();
            $is_read = Bill::where('active', 1)->count();
            DB::table('bills')->update(['is_read' => 1]);
            $key = ['name' => 'Tên khách hàng','id' => 'Mã hóa đơn','created_at' => 'Ngày tạo HĐ'];
            
            return view('admin.bill.index', compact('title','bills','counts','is_read','key'));
        }catch(Exception $e){
            $title = "Không tìm thấy trang";
            return view('errors.404',compact('title'));
        }
        	
    }

    public function searchBill(Request $request)
    {
        try {
            $resulf = Bill::where($request->key, 'like', '%' . $request->search . '%')->get();
            
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function invoice($id)
    {
        try {
            $title = "Chi tiết hóa đơn";
            $customer = Bill::find($id)->user()->first();
            $invoices = Bill::find($id)->invoiceDetails()->paginate();
            $invoice = InvoiceDetail::where('bill_id',$id)->get();
            $bills = Bill::find($id);
            $status_id = $bills->status_id;
            $statuse = StatusBill::find($status_id);
            $status = StatusBill::where('id','<>',$status_id)->pluck('name', 'id');
            return view('admin.bill.invoice', compact('title','invoices', 'bills', 'customer','invoice','status', 'statuse','status_id'));
        } catch(Exception $e) {
            $title = "Không tìm thấy trang";
            return view('errors.404',compact('title'));
        }  
    }

    public function print($id)
    {
        $title = "Chi tiết hóa đơn";
        $customer = Bill::find($id);
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

    public function updateStatus(Request $request)
    {
        try{
            $id_status = $request->status;
            $id_bill = $request->bill_id;
            $update = DB::table('bills')->where('id',$id_bill)->update(['status_id' => $id_status]);
            if (request()->wantsJson()) {
                $status_bill = StatusBill::find($id_status);
                $data['status'] = $status_bill->name;
                $bill = Bill::find($id_bill);
                $email = $bill->email;
                Mail::send('email.status_bill', $data, function ($message) use ($email) {
                    $message->from('tudtdt1998@gmail.com', 'Shop đá phong thủy Mixi');
                    $message->to($email , $email);
                    $message->subject('Tình trạng đơn hàng');
                
                });
                return response()->json([
                    'message' => trans('Cập nhập tình trạng đơn hàng thành công'),
                    'update' => $update,
                ]);
            }
            return redirect()->back()->with(['message' => trans('Cập nhập tình trạng đơn hàng thành công'), 'alert-class' => 'alert-success']);
        }catch(Exception $e){
            $title = "Không tìm thấy trang";
            return view('errors.404',compact('title'));
        }  
        
    }
    public function statisticalSevenue(Request $request)
    {
        $title = 'Thống kê doanh thu';
        $status_bill_charts = Bill::select(
            'status_bills.name AS label', 
            DB::raw('count(*) as value'))
            ->leftJoin('status_bills', 'bills.status_id', '=', 'status_bills.id')
            ->groupBy('bills.status_id', 'status_bills.name')
            ->get()
            ->toArray();

        if($request->all()) {
            $start = strtotime($request->start_date);
            $end = strtotime($request->end_date);
            $format_start_day = Date('Y-m-d',$start);
            $format_end_day = Date('Y-m-d',$end);
            $daily = Bill::select(DB::raw('Date(created_at) AS date'), DB::raw('SUM(total) AS total'))
                    ->whereBetween(DB::raw('Date(created_at)'), [$format_start_day, $format_end_day])
                    ->groupBy(DB::raw('Date(created_at)'))
                    ->get();
        } else {
            $daily = Bill::select(DB::raw('Date(created_at) AS date'), DB::raw('SUM(total) AS total'))
                         ->groupBy(DB::raw('Date(created_at)'))->get();
        }

        return view('admin.thong_ke.statistical',compact('title','daily','status_bill_charts'));    
    }
    
    public function getBillChart(Request $request)
    {
        $request->all();
        return response()->json(['status' => 'ok']);
    }
    

}