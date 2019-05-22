<?php

namespace App\Http\Controllers;

use DB;
use File;
use App\Http\Requests\UserProfileRequest;
use Request;
use App\User;

class UserController extends Controller
{
    public function getProfile(){
    	return view('admin.profile.list');
    }

    public function postProfile(UserProfileRequest $request){
    	$id = $request->id;

        $user = User::find($id);
        $current_img = 'resources/uploads/users/'.$user->image;
        
        $user->name =  $request->name;
        $user->phone =  $request->phone;

        $birthday = $request->birthday;
        $birthday = str_replace('/', '-', $birthday );
        $birthday = date("Y-m-d", strtotime($birthday));
       	
        
        $user->birthday =  $birthday;
        $user->address =  $request->address;
        
        if(!empty(Request::file('fileImg'))){
            $file_name= Request::file('fileImg')->getClientOriginalName();
            $user->image = $file_name;
            Request::file('fileImg')->move('resources/uploads/users/',$file_name);
            if(File::exists($current_img)){
                File::delete($current_img);
            }
        }
        $user->save();

        return redirect()->route('admin.getProfile');
    }
}
