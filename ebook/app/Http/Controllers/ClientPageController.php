<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TopSlide;
use App\TopBanner;
use App\book;
use App\kind;
use App\about;
use DB;

class ClientPageController extends Controller
{
    public function getHome(){
        $slide = TopSlide::find(1);
        $current_data_json = $slide->value;
        $result = json_decode($current_data_json,true);

        $banner = TopBanner::find(1);
        $current_data_json = $banner->value;
        $banners = json_decode($current_data_json,true);

        $book = book::select('*')->skip(0)->take(8)->get()->toArray();

    	return view('index',compact('result','banners','book'));
    }

    public function getProduct(){
    	$kind = kind::select('name')->get();
    	$book = book::select('*')->paginate(12);
    	return view('product',compact('kind','book'));
    }

    public function getBlog(){
    	return view('blog');
    }

    public function getProductDetail($id){

    	$book = book::select('*')->where('id',$id)->first()->toArray();

    	$detail = DB::table('image_books')->leftJoin('books','books.id','=','image_books.book_id')->where('books.id',$id)->select('image_books.image')->get();
    	$info = DB::table('books')->join('publishers','publishers.id','=','books.publisher_id')
    	->join('kinds','kinds.id','=','books.kind_id')
    	->join('authors','authors.id','=','books.author_id')
    	->select('authors.name as author', 'kinds.name as kind', 'publishers.name as publisher')
    	->where('books.id',$id)->get();

    	return view('product-detail',compact('book','detail','info'));
    }

    public function getAbout(){
    	$about = about::find(1)->get()->toArray();
    	
    	$about = $about[0];
    	return view('about',compact('about'));
    }

    public function getContact(){
    	return view('contact');
    }

    public function getCart(){
    	return view('cart');
    }
    

}
