<?php

namespace App\Http\Controllers;

use Request;
use App\HeaderPage;
use File;


class InfoPageController extends Controller
{
    public function getList(){
    	$data = HeaderPage::all()->toArray()	;
    		
    	return view('admin.headerPage.list',compact('data'));
    }

    public function postEdit(){
    	
    	$id = Request::input('id');
        $headerPage = HeaderPage::find($id);

    	$text = Request::input('text');
    	
       	$current_img = 'resources/uploads/pages/'.$headerPage->image;

       	$headerPage->text = $text;

        if(!empty(Request::file('fileImg'))){
            $file_name= Request::file('fileImg')->getClientOriginalName();
            $headerPage->image = $file_name;
            Request::file('fileImg')->move('resources/uploads/pages/',$file_name);
            if(File::exists($current_img)){
                File::delete($current_img);
            }
        }
        
        $headerPage->save();

        return redirect()->route('admin.page.getList');
    }

}
