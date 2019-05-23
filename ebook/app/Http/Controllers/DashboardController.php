<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;
use App\User;
use App\book;
use App\feedback;
use Mail;
use App\Mail\AdminSendMail;

class DashboardController extends Controller
{
    public function getList(){
    	$order = order::select('id')->where('status','0')->get();
    	$order = count($order);

    	$user = User::select('id')->get();
    	$user = count($user);

    	$book = book::select('id')->get();
    	$book = count($book);

    	$feedback = feedback::select('id')->get();
    	$feedback = count($feedback);


    	return view('admin.dashboard.list',compact('order','user','book','feedback'));
    }

    public function postSendMail(Request $request){
    	$emailTo = $request->emailto;
    	$subject = $request->subject;
    	$message = $request->message;

    	Mail::to($emailTo)->send(new AdminSendMail($subject, $message));

    	return redirect()->back()->with(['flash_level'=>'success','flash_message'=>"Gửi mail thành công."]);;
    }
}
