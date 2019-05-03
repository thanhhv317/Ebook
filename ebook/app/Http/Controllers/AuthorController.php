<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use DB;
use App\author;
use App\Http\Requests\AuthorRequest;
use File;	
use Request;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AuthorExport;

class AuthorController extends Controller
{
    public function getAdd(){
    	return view('admin.author.add');
    }

	public function postAdd(AuthorRequest $request){
		$author = new author;
		$author->name = $request->txtName;
		$author->alias = str_slug($request->txtName);
		$author->birthday = $request->txtBirthday;
		$author->info = $request->txtDescription;
		$file_name = $request->file('fImage')->getClientOriginalName();
		$author->image = $file_name;
		$request->file('fImage')->move('resources/uploads/authors/',$file_name);
		$author->save();
		return redirect()->route('admin.author.getList');
    }

    public function getList(){
    	$data = DB::table('authors')->get();
    	return view('admin.author.list',compact('data'));
    }

    public function getEdit($id){
    	$author = author::find($id);
    	return view('admin.author.edit',compact('author'));
    }

    public function postEdit($id,Request $request){
    	$author = author::find($id);
		$author->name = Request::input('txtName');
		$author->alias = str_slug(Request::input('txtName'));
		$author->birthday = Request::input('txtBirthday');
		$author->info = Request::input('txtDescription');

		$current_img = 'resources/uploads/authors/'.$author->image;

		if(!empty(Request::file('fImage'))){
            $file_name= Request::file('fImage')->getClientOriginalName();
            $author->image = $file_name;
            Request::file('fImage')->move('resources/uploads/authors/',$file_name);
            if(File::exists($current_img)){
                File::delete($current_img);
            }
        }
        $author->save();

		return redirect()->route('admin.author.getList');
    }
    public function getDelete($id){
    	$author = author::find($id);
    	$current_img = 'resources/uploads/authors/'.$author->image;
    	File::delete($current_img);
    	$author->delete($id);
    	$data = DB::table('authors')->get();
    	return view('admin.author.delete',compact('data'));
    }

    public function getDetail($id){
    	$data = author::find($id);
    	return view('admin.author.detail',compact('data'));
    }

    public function getPrint(){
        $data = DB::table('authors')->get();
        return view('admin.author.print',compact('data'));
    }

    public function getPdf(){
        $data = DB::table('authors')->get();

        $result = ['result' => $data];
        $pdf = PDF::loadView('admin.author.pdf', $result);
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $name= 'Report'.date("d-m-Y").date('-h-i-sa');
        
        return $pdf->download($name.'.pdf');
    }

    public function getExcel(){
        $name= 'Report'.date("d-m-Y").date('-h-i-sa');
        //cach 1 : just get author_id,kind_id, publisher_id
        //return Excel::download(new AuthorExport, $name.'.xlsx');

        //cach 2 : return author_name,kind_name,publisher_name
        return Excel::download(new AuthorExport(), $name.'.xlsx');
    }

}
