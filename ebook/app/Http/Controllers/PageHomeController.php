<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use Request;
use File;
use App\TopSlide;
use App\TopBanner;
use App\Http\Requests\SlideRequest;
use App\Http\Requests\BannerRequest;

class PageHomeController extends Controller
{
	//  type: JSON
    public function getList(){
    	$slide = TopSlide::find(1);
    	$current_data_json = $slide->value;
    	$result = json_decode($current_data_json,true);

    	$banner = TopBanner::find(1);
    	$current_data_json = $banner->value;
    	$dataBanner = json_decode($current_data_json,true);
    	return view('admin.home.list',compact('result','dataBanner'));
    }

    public function getAdd(){
    	return view('admin.home.add');
    }

    public function postAdd(SlideRequest $request){

    	$slide = TopSlide::find(1);
    	$current_data_json = $slide->value;
    	$result = json_decode($current_data_json,true);


    	//get data form view
    	$title = $request->txtTitle;
    	$description = $request->txtDescription;
    	$textbtn = $request->txtBtnText;
    	$linkbtn = $request->txtBtnLink;
    	$file_name = $request->file('fImage')->getClientOriginalName();
    	
    	$id = rand(0,99).rand(0,99).rand(0,99).rand(0,99);
		
		// create array child in value of slide
    	$data = array(
			'id' => $id,
			'title' => $title, 
			'description' => $description, 
			'linkbtn' => $linkbtn, 
			'textbtn' => $textbtn, 
			'image' => $file_name, 
		);

    	//put to parent array in value of slide
		array_push($result, $data);

		$result= json_encode($result);
		
		$slide->value = $result;
		
		$request->file('fImage')->move('resources/uploads/slides/',$file_name);

    	$slide->save();

    	return redirect()->route('admin.home.getList');
    }
    public function getEdit($id){
    	$slide = TopSlide::find(1);
    	$current_data_json = $slide->value;
    	$result = json_decode($current_data_json,true);
    	foreach ($result as $key => $value) {
    		if($result[$key]['id']==$id){
    			$data = $result[$key];
    		}
    	}


    	return view('admin.home.edit',compact('id','data'));
    }

    public function postEdit($id,Request $request){
    	$slide = TopSlide::find(1);
    	$current_data_json = $slide->value;
    	$result = json_decode($current_data_json,true);

    	foreach ($result as $key => $value) {
    		if($result[$key]['id']==$id){
    			$tmp = $result[$key];
    		}
    	}

    	//get data form view
    	$title = Request::input('txtTitle');
    	$description = Request::input('txtDescription');
    	$textbtn = Request::input('txtBtnText');
    	$linkbtn = Request::input('txtBtnLink');
    	
    	// tại sao lại bôi đen cái này.
    	// tại vì dùng Request sẵn thì nó ko cho phải dùng cái SlideRequest mới được mà vì lúc sửa dữ liệu nếu ko chọn ảnh thì nó giữ ảnh cũ, ko thể  xét có nó required được( vô lý) nên phải dùng thôi.

    	// $title = $request->txtTitle;
    	// $description = $request->txtDescription;
    	// $textbtn = $request->txtBtnText;
    	// $linkbtn = $request->txtBtnLink;

    	$current_img = $tmp['image'];
    	$file_name = $current_img;

        if(Request::file('fImage')){
            $file_name= Request::file('fImage')->getClientOriginalName();
            if(File::exists('resources/uploads/slides/'.$current_img)){
                File::delete('resources/uploads/slides/'.$current_img);
            }
            Request::file('fImage')->move('resources/uploads/slides/',$file_name);
        }


    	$data = array(
			'id' => $id,
			'title' => $title, 
			'description' => $description, 
			'linkbtn' => $linkbtn, 
			'textbtn' => $textbtn, 
			'image' => $file_name, 
		);
    	foreach ($result as $key => $value) {
    		if($result[$key]['id']==$id){
    			$result[$key] = $data;
    		}
    	}

		$result = json_encode($result);
		$slide->value= $result;
		$slide->save();

		return redirect()->route('admin.home.getList');
    }

    public function getDelete($id){

    	//get all data
			$slide = TopSlide::find(1);
	    	$current_data_json = $slide->value;
	    	$result = json_decode($current_data_json,true);
	    	
	    	foreach ($result as $key=>$value) {
	    		$tmp = $result[$key];
	    		if($tmp['id']==$id){
	    			$file_name = $result[$key]['image'];
	    	 		unset($result[$key]);
	    			File::delete('resources/uploads/slides/'.$file_name);
	    		}
	    	}
	    	$result = json_encode($result);
	    	$slide->value = $result;
	    	$slide->save();
    }
    public function getEditAll(){
    	$slide = TopSlide::find(1);
    	$current_data_json = $slide->value;
    	$result = json_decode($current_data_json,true);

    	return view('admin.home.editAll',compact('result'));
    }

    public function postEditAll(Request $request){
		$slide = TopSlide::find(1);
    	foreach(Request::input('txtID') as $ids){
    		$id[] = $ids;
		}
		foreach(Request::input('txtTitle') as $tts){
    		$title[] = $tts;
		}
		foreach(Request::input('txtDescription') as $des){
    		$description[] = $des;
		}
		foreach(Request::input('txtBtnLink') as $btnL){
    		$linkbtn[] = $btnL;
		}
		foreach(Request::input('txtBtnText') as $btnT){
    		$textbtn[] = $btnT;
		}

		foreach(Request::input('fImageOld') as $file){
    		$image[] = $file;
		}

		for ($i=0; $i <count($id) ; $i++) { 
			$data[] = array(
				'id' => $id[$i],
				'title' => $title[$i], 
				'description' => $description[$i], 
				'linkbtn' => $linkbtn[$i], 
				'textbtn' => $textbtn[$i], 
				'image' => $image[$i], 
			);
		}

		$data = json_encode($data);
		$slide->value = $data;
		$slide->save();
		return redirect()->route('admin.home.getList');
    }

    // Banner
    public function getAddBanner(){
    	$banner = TopBanner::find(1);
    	$result = json_decode($banner->value,true);
    	if(count($result)<6){
    		return view('admin.home.addbn');
    	}
    	else{
    		return "<h2>Số lượng Banner đã đủ cho trang phần trang chủ</h2>";
    	}
    }

    public function postAddBanner(BannerRequest $request){
    	$banner = TopBanner::find(1);
    	$current_data_json = $banner->value;
    	$result = json_decode($current_data_json,true);
    	//get data form view
    	$textbtn = $request->txtBtnText;
    	$linkbtn = $request->txtBtnLink;
    	$file_name = $request->file('fImage')->getClientOriginalName();
    	
    	$id = rand(0,99).rand(0,99).rand(0,99).rand(0,99);
		
		// create array child in value of slide
    	$data = array(
			'id' => $id,
			'linkbtn' => $linkbtn, 
			'textbtn' => $textbtn, 
			'image' => $file_name, 
		);

    	//put to parent array in value of slide
		array_push($result, $data);
		$result= json_encode($result);	
		$banner->value = $result;	
		$request->file('fImage')->move('resources/uploads/banners/',$file_name);
    	$banner->save();
    	return redirect()->route('admin.home.getList');
    }

    public function getEditBanner($id){
    	$banner = TopBanner::find(1);
    	$result = json_decode($banner->value,true);
    	foreach ($result as $key => $value) {
    		if($result[$key]['id']==$id){
    			$data = $result[$key];
    		}
    	}
    	return view('admin.home.editbn',compact('id','data'));
    }

    public function postEditBanner($id){
    	$banner = TopBanner::find(1);
    	$result = json_decode($banner->value,true);
    	foreach ($result as $key => $value) {
    		if($result[$key]['id']==$id){
    			$tmp = $result[$key];
    		}
    	}

    	//get data form view
    	$textbtn = Request::input('txtBtnText');
    	$linkbtn = Request::input('txtBtnLink');
    	
    	$current_img = $tmp['image'];

    	$file_name = $current_img;

        if(Request::file('fImage')){
            $file_name= Request::file('fImage')->getClientOriginalName();
            if(File::exists('resources/uploads/banners/'.$current_img)){
                File::delete('resources/uploads/banners/'.$current_img);
            }
            Request::file('fImage')->move('resources/uploads/banners/',$file_name);
        }

    	$data = array(
			'id' => $id,
			'linkbtn' => $linkbtn, 
			'textbtn' => $textbtn, 
			'image' => $file_name, 
		);

    	foreach ($result as $key => $value) {
    		if($result[$key]['id']==$id){
    			$result[$key] = $data;
    		}
    	}

		$result = json_encode($result);
		$banner->value= $result;
		$banner->save();

		return redirect()->route('admin.home.getList');
    }

}
