<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\publisher;
use App\Http\Requests\PublisherRequest;
use PDF,DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PublisherExport;

class PublisherController extends Controller
{
    public function getList(){
    	$data = publisher::select('*')->get();
    	return view('admin.publisher.list',compact('data'));
    }

    public function getAdd(){
    	return view('admin.publisher.add');
    }

    public function postAdd(PublisherRequest $request){
    	$publisher = new publisher;
    	$publisher->name = $request->txtName;
    	$publisher->address = $request->txtAddress;
    	$publisher->info = $request->txtDescription;
    	$publisher->save();
    	return redirect()->route('admin.publisher.getList');
    }

    public function getEdit($id){
    	$publisher = publisher::find($id)->toArray();
    	return view('admin.publisher.edit',compact('publisher'));
    }

    public function postEdit($id,PublisherRequest $request){
    	$publisher = publisher::find($id);
    	$publisher->name = $request->txtName;
    	$publisher->address = $request->txtAddress;
    	$publisher->info = $request->txtDescription;
    	$publisher->save();
    	return redirect()->route('admin.publisher.getList');
    }

    public function getDelete($id){
    	$publisher = publisher::find($id);
    	$publisher->delete($id);
    	$data = publisher::select('*')->get();
    	return view('admin.publisher.delete',compact('data'));
    }

    public function getDetail($id){
    	$data = publisher::find($id);
    	return view('admin.publisher.detail',compact('data'));
    }

    public function getPrint(){
        $data = publisher::select('*')->get();
        return view('admin.publisher.print',compact('data'));
    }

    public function getPdf(){
        $data = DB::table('publishers')->get();

        $result = ['result' => $data];
        $pdf = PDF::loadView('admin.publisher.pdf', $result);
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $name= 'Report'.date("d-m-Y").date('-h-i-sa');
        
        return $pdf->download($name.'.pdf');
    }

    public function getExcel(){
        $name= 'Report'.date("d-m-Y").date('-h-i-sa');
        return Excel::download(new PublisherExport(), $name.'.xlsx');
    }

}
