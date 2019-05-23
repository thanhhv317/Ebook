<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;
use App\book;
use App\feedback;
use DB;

class StatisticalController extends Controller
{
    public function getListBill(){
    	$order = DB::select('select status,count("status") as num from orders group by status');
    		// echo "<pre>";
    		// print_r($order);
    		// echo "</pre>";
    	$sum = order::count();
    		
    	return view('admin.statistical.listBill',compact('order','sum'));
    }

    public function getListBook(){

    	$order = DB::select('select dt.book_id,sum(dt.quantity) as num, b.name from order_details as dt join books as b on b.id = dt.book_id group by dt.book_id,b.name order by num desc limit 5');
    	$feedback = DB::select('select f.book_id, count("f.book_id") as num, b.name from feedback as f join books as b on  b.id = f.book_id group by f.book_id,b.name order by num desc limit 5');

    	$kind = DB::select('select k.name,count("b.kind_id") as num from kinds k right join books b on b.kind_id = k.id  group by k.name ');

		return view('admin.statistical.listBook',compact('order','feedback','kind'));
    }

    public function getListFeedback(){
        $data = feedback::select('feedback.id','feedback.content','feedback.created_at','books.name as book','users.name as user')->join('users','feedback.user_id','=','users.id')
                    ->join('books','books.id','=','feedback.book_id')
                    ->get();

        return view('admin.statistical.listFeedback',compact('data'));
    }

    public function getDetailFeedback($id){
        $data = feedback::select('feedback.id','feedback.content','feedback.created_at','books.name as book','users.name as user')->join('users','feedback.user_id','=','users.id')
                ->join('books','books.id','=','feedback.book_id')->where('feedback.id',$id)
                ->get();
        $data =$data[0];
        return view('admin.statistical.detailFeedback',compact('data'));
    }

    public function getDeleteFeedback($id){
        
       DB::table('feedback')->where('id',$id)->delete();
       return 1;
    }

}
