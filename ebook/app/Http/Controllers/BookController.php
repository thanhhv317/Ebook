<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\author;
use App\publisher;
use App\kind;
use App\book;
use App\Http\Requests\BookRequest;
use File;
use Request;
use DB,App;
use App\imageBook;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BooksExport;
use App\Exports\BooksViewReport;
use App\Imports\BooksImport;

class BookController extends Controller
{
    public function getAdd(){
    	$author = author::select('id','name')->get()->toArray();
    	$publisher = publisher::select('id','name')->get()->toArray();
    	$kind = kind::select('id','name')->get()->toArray();
    	return view('admin.book.add',compact('author','publisher','kind'));
    }
    public function getList(){
    	$data = DB::table('books')
    				->join('kinds','books.kind_id','=','kinds.id')
    				->join('publishers','books.publisher_id','=','publishers.id')
    				->join('authors','books.author_id','=','authors.id')
    				->select('books.*','kinds.name as kind','publishers.name as publisher','authors.name as author')
    				->get();
    	// echo'<pre>';
    	// print_r($data);
    	// echo'</pre>';
        return view('admin.book.list',compact('data'));

    }
    public function postAdd(BookRequest $request){
    	$book = new book;
    	$file_name = $request->file('fImage')->getClientOriginalName();
    	$book->name 		= $request->txtName;
    	$book->alias 		= str_slug($request->txtName);
    	$book->publisher_id = $request->slPublisher;
    	$book->kind_id 		= $request->slKind;
    	$book->author_id 	= $request->slAuthor;
    	$book->price 		= $request->txtPrice;
    	$book->quantity 	= $request->txtQuantity;
    	$book->description 	= $request->txtDescription;
    	$book->image 		= $file_name;
    	$request->file('fImage')->move('resources/uploads/books/',$file_name);
    	$book->save();

    	$book_id = $book->id;
    	if($request->hasFile('imageDetail')){
    		foreach($request->file('imageDetail') as $file){
    			if(isset($file)){
	    			$book_img = new imageBook;
	    			$book_img->book_id = $book_id;
	    			$book_img->image = $file->getClientOriginalName();
	    			$file->move('resources/uploads/books/detail/',$file->getClientOriginalName());
	    			$book_img->save();
    			}
    		}
    	}

    	return redirect()->route('admin.book.getList');
    }

    public function getEdit($id){
    	$author = author::select('id','name')->get()->toArray();
    	$publisher = publisher::select('id','name')->get()->toArray();
    	$kind = kind::select('id','name')->get()->toArray();
    	$book = book::find($id)->toArray();
        $img_id = $book['id'];
        $imageBook = imageBook::select('*')->where('book_id',$img_id)->get()->toArray();

    	return view('admin.book.edit',compact('author','publisher','kind','book','imageBook'));
    	
    }

    public function postEdit($id,Request $request){
        $book = book::find($id);
        $book->name         = Request::input('txtName');
        $book->alias        = str_slug(Request::input('txtName'));
        $book->publisher_id = Request::input('slPublisher');
        $book->kind_id      = Request::input('slKind');
        $book->author_id    = Request::input('slAuthor');
        $book->price        = Request::input('txtPrice');
        $book->quantity     = Request::input('txtQuantity');
        $book->description  = Request::input('txtDescription');
        
        $current_img = 'resources/uploads/books/'.$book->image;
        if(!empty(Request::file('fImage'))){
            $file_name= Request::file('fImage')->getClientOriginalName();
            $book->image = $file_name;
            Request::file('fImage')->move('resources/uploads/books/',$file_name);
            if(File::exists($current_img)){
                File::delete($current_img);
            }
        }
        $book->save();

        if(!empty(Request::file('imageDetail'))){
            foreach (Request::file('imageDetail') as $file) {
                $image_book = new imageBook;
                $image_book->image = $file->getClientOriginalName();
                $image_book->book_id = $id;
                $file->move('resources/uploads/books/detail/',$file->getClientOriginalName());
                $image_book->save();
            }
        }
        
        return redirect()->route('admin.book.getList');
    }

    public function getDelImg($id){
        if(Request::ajax()){
            $idHinh = (int)Request::get('idHinh');
            $image_detail = imageBook::find($idHinh);
            if(!empty($image_detail)){
                $img = 'resources/uploads/books/detail/'.$image_detail->image;
                if(File::exists($img)){
                    File::delete($img);
                }
                $image_detail->delete();
            }
            return "Ok";
        }
    }

    public function getDelete($id){
        $imageBook = imageBook::select()->where('book_id',$id)->get()->toArray();
        foreach ($imageBook as $value) {
            File::delete('resources/uploads/books/detail/'.$value['image']);
        }
        $book = book::find($id);
        File::delete('resources/uploads/books/'.$book['image']);
        $book->delete($id);
        
        $data = DB::table('books')
                    ->join('kinds','books.kind_id','=','kinds.id')
                    ->join('publishers','books.publisher_id','=','publishers.id')
                    ->join('authors','books.author_id','=','authors.id')
                    ->select('books.*','kinds.name as kind','publishers.name as publisher','authors.name as author')
                    ->get();
        // echo'<pre>';
        // print_r($data);
        // echo'</pre>';
        return view('admin.book.delete',compact('data'));

    }
    public function getDetail($id){
        $data = DB::table('books')
                    ->join('kinds','books.kind_id','=','kinds.id')
                    ->join('publishers','books.publisher_id','=','publishers.id')
                    ->join('authors','books.author_id','=','authors.id')
                    ->where('books.id','=',$id)
                    ->select('books.*','kinds.name as kind','publishers.name as publisher','authors.name as author')
                    ->first();
        $imageBook = imageBook::where('book_id',$id)->get();
        return view('admin.book.detail',compact('data','imageBook'));
    }

    public function getPrint(){
        $data = DB::table('books')
                    ->join('kinds','books.kind_id','=','kinds.id')
                    ->join('publishers','books.publisher_id','=','publishers.id')
                    ->join('authors','books.author_id','=','authors.id')
                    ->select('books.*','kinds.name as kind','publishers.name as publisher','authors.name as author')
                    ->get();
        // echo'<pre>';
        // print_r($data);
        // echo'</pre>';
        return view('admin.book.print',compact('data'));
    }

    public function getPdf(){
        $data = DB::table('books')
                    ->join('kinds','books.kind_id','=','kinds.id')
                    ->join('publishers','books.publisher_id','=','publishers.id')
                    ->join('authors','books.author_id','=','authors.id')
                    ->select('books.*','kinds.name as kind','publishers.name as publisher','authors.name as author')
                    ->get()->toArray();

        $result = ['result' => $data];
        $pdf = PDF::loadView('admin.book.pdf', $result);
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $name= 'Report'.date("d-m-Y").date('-h-i-sa');
        
        return $pdf->download($name.'.pdf');
    }

    public function getExcel(){
        $name= 'Report'.date("d-m-Y").date('-h-i-sa');
        //cach 1 : just get author_id,kind_id, publisher_id
        //return Excel::download(new BooksExport, $name.'.xlsx');

        //cach 2 : return author_name,kind_name,publisher_name
        return Excel::download(new BooksViewReport(), $name.'.xlsx');
    }

    public function getImport(){
        return view('admin.book.import');
    }

    public function postImport(){
        Excel::import(new BooksImport,request()->file('file')); 
        return back();
    }

}
