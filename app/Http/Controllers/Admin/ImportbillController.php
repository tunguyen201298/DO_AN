<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ImportBill;
use App\Models\BillStatus;
use App\Models\StatusBill;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\ImportBillDetail;
use Illuminate\Support\Facades\Input;
use Exception;
use PDF;
use DB;

class ImportbillController extends Controller
{
	public function index()
	{

		$title = "Phiếu nhập";
		$import_bills = ImportBill::paginate();
		$counts = ImportBill::count();
		return view('admin.import_bill.index',compact('title','import_bills','counts'));
	}
    public function create()
    {
        try{
            $title = "Thêm mới phiếu nhập";
            $import_bills = new ImportBillDetail();
            $s = '-- Chọn nhà cung cấp --';
            $supplier = Supplier::pluck('name', 'id');
            $import_bills->is_visible = 1;
            return view('admin.import_bill.create',compact('title','import_bills','supplier','s'));
        }catch(Exception $e){
            $title = "Không tìm thấy trang";
            return view('errors.404',compact('title'));
        }
        	
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate(
            $request,
            [
                'supplier' => 'required'
            ],

            [
                'required' => '*:attribute không được để trống',
            ]
        );
        try {
            DB::beginTransaction();
            $import_bill = new ImportBill();
            $import_bill->supplier_id = $request->supplier;

            //$import_bill_detail->import_bill_id = $import_bill_id;
            //$import_bill_detail->quantity = $request->quantity;
            $importBillDetails = [];
            $i = 0;
            $total = 0;
            foreach ($request->products as $value) {
                $totalDetail = *$value['total'];
                $importBillDetail = new ImportBillDetail([
                    'product_id' => $value['product_id'],
                    'quantity' => $value['quantity'],
                    'price' => $value['total'],
                    'total' => $totalDetail
                ]);
                $total += $totalDetail;
                array_push($importBillDetails, $importBillDetail);
            }

            $import_bill->total = $total;
            $import_bill->save();
            
            if($importBillDetails){
                $import_bill->importBillDetails()->saveMany($importBillDetails);
                $updateqty = ImportBillDetail::where('import_bill_id',$import_bill_id)->get();
                foreach ($updateqty as $value) {
                    foreach $request->products as $value) {
                        $pro = Product::where('id', $value['product_id'])->first();
                        DB::table('products')->where('id', $value['product_id'])->update(['quantity' => $value['quantity']+$pro->quantity]);
                    }
                    
                }
            }

             DB::commit();
            $response = [
                'message' => trans('Thêm mới phiếu nhập thành công'),
                'data' => $import_bill
            ];


            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect('admin/import-bills')->with(['message' => $response['message'], 'alert-class' => 'alert-success']);
        } catch (Exception $e) {
            DB::rollback();
            if ($request->wantsJson()) {
                return response()->json([
                            'error' => true,
                            'message' => $e->getMessage()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
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
    public function updateStatus(Request $request)
    {
        try{
            $id_status = $request->id_status;
            $id_bill = $request->id;
            $update = Bill::find($id_bill)->update(['status_id' => $id_status]);
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
                            'update' => $update
                ]);
            }
            return redirect()->back()->with(['message' => trans('Cập nhập tình trạng đơn hàng thành công'), 'alert-class' => 'alert-success']);
        }catch(Exception $e){
            $title = "Không tìm thấy trang";
            return view('errors.404',compact('title'));
        }  
        
    }
}
