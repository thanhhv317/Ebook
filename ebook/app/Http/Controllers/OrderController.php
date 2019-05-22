<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;
use App\OrderDetail;
use App\book;
use DB;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OrderExport;

class OrderController extends Controller
{
    public function getList(){
    	$order = order::select('*')->get();
		return view('admin.order.list',compact('order'));
    }

    public function getListGroupt($status){
        $order = order::select('*')->where('status',$status)->get();
        return view('admin.order.list',compact('order','status'));
    }

    public function getEdit($id){
    	$order = order::find($id);
    	$status = $_GET['status'];
    	$order->status = $status;
    	$order->save();
    	return 1;
    }

    public function getDetail($id){
    	$order = order::find($id)->toArray();
    	$order_detail = OrderDetail::select('*')->where('order_id',$id)->get()->toArray();
    	
    	$dataOrder = array();
    	$dataBook = array();
    	foreach ($order_detail as $key => $value) {
    		array_push($dataOrder, $value);
    		$book = book::find($value['book_id'])->toArray();
    		array_push($dataBook, $book);
    		
    	}
    	return view('admin.order.detail',compact('dataOrder','dataBook','order'));
    }
    public function getPrintOneOrder($id){
        $order = order::find($id)->toArray();
        $order_detail = OrderDetail::select('*')->where('order_id',$id)->get()->toArray();
        
        $dataOrder = array();
        $dataBook = array();
        foreach ($order_detail as $key => $value) {
            array_push($dataOrder, $value);
            $book = book::find($value['book_id'])->toArray();
            array_push($dataBook, $book);
        }
        return view('admin.order.printOneOrder',compact('dataOrder','dataBook','order'));
    }

    public function getPrintGroupt($status){
        $order = order::select('*')->where('status',$status)->get()->toArray();
        return view('admin.order.print',compact('order'));
    }

    public function getPrintAllOrder(){
        $order = order::select('*')->get()->toArray();
        return view('admin.order.print',compact('order'));
    }

    public function getDelete($id){
        DB::table('order_details')->where('order_id',$id)->delete();
        DB::table('orders')->where('id',$id)->delete();
        return 1;
    }

    public function getPdfGroupt($status){
        $order = order::select('*')->where('status',$status)->get()->toArray();
        

        $order = ['order' => $order];
        $pdf = PDF::loadView('admin.order.pdf', $order);
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $name= 'Report'.date("d-m-Y").date('-h-i-sa');
        
        return $pdf->download($name.'.pdf');
    }

    public function getPdfAllOrder(){
        $order = order::select('*')->get()->toArray();
        

        $order = ['order' => $order];
        $pdf = PDF::loadView('admin.order.pdf', $order);
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $name= 'Report'.date("d-m-Y").date('-h-i-sa');
        
        return $pdf->download($name.'.pdf');
    }

    public function getExcelAllOrder(){
        $name= 'Report'.date("d-m-Y").date('-h-i-sa');
        //cach 1 : just get author_id,kind_id, publisher_id
        return Excel::download(new OrderExport, $name.'.xlsx');
    }
}
