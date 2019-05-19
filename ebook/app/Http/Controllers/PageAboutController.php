<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\about;
use Request;
use File;

class PageAboutController extends Controller
{
	public function getList(){
		$result = about::select('*')->get()->toArray();
		$result = $result[0];
		return view('admin.about.list',compact('result'));
	}

	public function getEdit(){
		$result = about::select('*')->get()->toArray();
		$result = $result[0];
		return view('admin.about.edit',compact('result'));
	}

	public function postEdit(Request $request){

		$result = about::find(1);

		$story = Request::input('txtStory');
    	$description = Request::input('txtDescription');
    	$slogant = Request::input('txtSlogant');
    	$author = Request::input('txtAuthor');

    	$current_img1 = $result->banner;
    	$file_name1 = $current_img1;

        if(Request::file('fImage1')){
            $file_name1= Request::file('fImage1')->getClientOriginalName();
            if(File::exists('resources/uploads/abouts/'.$current_img1)){
                File::delete('resources/uploads/abouts/'.$current_img1);
            }
            Request::file('fImage1')->move('resources/uploads/abouts/',$file_name1);
        }

        $current_img2 = $result->image;
    	$file_name2 = $current_img2;

        if(Request::file('fImage2')){
            $file_name2= Request::file('fImage2')->getClientOriginalName();
            if(File::exists('resources/uploads/abouts/'.$current_img2)){
                File::delete('resources/uploads/abouts/'.$current_img2);
            }
            Request::file('fImage2')->move('resources/uploads/abouts/',$file_name2);
        }

        $result->image = $file_name2;
        $result->banner = $file_name1;
        $result->story = $story;
        $result->description = $description;
        $result->slogant = $slogant;
        $result->author = $author;
        $result->save();

        return redirect()->route('admin.about.getList');
	}
}
