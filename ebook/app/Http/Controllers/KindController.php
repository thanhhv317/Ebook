<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\kind;
use App\Http\Requests\KindRequest;
use DB;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KindExport;

class KindController extends Controller
{
    public function getList(){
    	$data = kind::select('id','name')->get();
    	return view('admin.kind.list',compact('data'));
    }

    public function getAdd(){
    	return view('admin.kind.add');
    }

    public function postAdd(KindRequest $request){
    	$kind = new kind;
    	$kind->name = $request->txtName;
    	$kind->save();
    	return redirect()->route('admin.kind.getList');
    }

    public function getEdit($id){
    	$kind = DB::table('kinds')->find($id);
    	return view('admin.kind.edit',compact('kind'));
    }

    public function postEdit($id,KindRequest $request){
    	$kind = kind::find($id);
    	$kind->name = $request->txtName;
    	$kind->save();
    	return redirect()->route('admin.kind.getList');
    }

    public function getDelete($id){
    	$kind = kind::find($id);
    	$kind->delete($id);
    	$data = kind::select('*')->get();
    	return view('admin.kind.delete',compact('data'));
    }

    public function getPrint(){
        $data = kind::select('id','name')->get();
        return view('admin.kind.print',compact('data'));
    }

    public function getPdf(){
        $data = DB::table('authors')->get();

        $result = ['result' => $data];
        $pdf = PDF::loadView('admin.kind.pdf', $result);
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $name= 'Report'.date("d-m-Y").date('-h-i-sa');
        
        return $pdf->download($name.'.pdf');
    }

    public function getExcel(){
         $name= 'Report'.date("d-m-Y").date('-h-i-sa');
         return Excel::download(new KindExport(), $name.'.xlsx');
    }

}
