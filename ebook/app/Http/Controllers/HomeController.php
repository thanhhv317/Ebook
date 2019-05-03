<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TopSlide;

class HomeController extends Controller
{
    public function getHome(){
        $banner = TopSlide::find(1);
        $current_data_json = $banner->value;
        $result = json_decode($current_data_json,true);
    	return view('index',compact('result'));
    }

    public function getProduct(){
    	return view('product');
    }

    public function getBlog(){
    	return view('blog');
    }

    public function getProductDetail($id){
    	return view('product-detail');
    }

    public function getAbout(){
    	return view('about');
    }

    public function getContact(){
    	return view('contact');
    }

    public function getCart(){
    	return view('cart');
    }


}
