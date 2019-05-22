<?php

namespace App\Http\Controllers;


use Request;
use App\TopSlide;
use App\TopBanner;
use App\book;
use App\kind;
use App\about;
use App\order;
use App\User;
use App\feedback;
use App\OrderDetail;
use DB,Mail;
use File;
use App\Http\Requests\UserProfileRequest;
use App\HeaderPage;

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

    public function getProduct1(){
        $page = HeaderPage::find('1');
        $kind = kind::select('name','id')->get();
        $book = book::select('*')->paginate(12);
           
        return view('product',compact('kind','book','page'));
    }

    public function getProduct($kinds){
        $page = HeaderPage::find('1');
    	$kind = kind::select('name','id')->get();
    	//$book = book::select('*')->where('kind_id',$kinds)->get()->toArray();
        $book = book::select('*')->where('kind_id',$kinds)->paginate(12);
           
    	return view('product',compact('kind','book','page'));
    }

    public function searchProduct($name){
        $book = book::select('*')->where('name',$name)->get();
            
        $data ="";
        foreach ($book as $item) {
            $data .= "<div class=\"col-sm-12 col-md-6 col-lg-4 p-b-50\">
                            <div class=\"block2\">
                                <div class=\"block2-img wrap-pic-w of-hidden pos-relative block2-label\">
                                    <img src=\"". asset('resources/uploads/books/'.$item->image) ."\" alt=\"IMG-PRODUCT\">
                                    <div class=\"block2-overlay trans-0-4\">
                                        <a href=\"#\" class=\"block2-btn-addwishlist hov-pointer trans-0-4\">
                                            <i class=\"icon-wishlist icon_heart_alt\" aria-hidden=\"true\"></i>
                                            <i class=\"icon-wishlist icon_heart dis-none\" aria-hidden=\"true\"></i>
                                        </a>
                                        <div class=\"block2-btn-addcart w-size1 trans-0-4\">
                                            <!-- Button -->
                                            <button class=\"flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4\" onclick=\"addCart( $item->id,'$item->name',$item->price,'$item->image');\" >
                                                Thêm vào giỏ
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class=\"block2-txt p-t-20\" style=\"text-align: center;\">
                                    <a href=\"". url('product-detail/'.$item->id) ."\" class=\"block2-name dis-block s-text3 p-b-5\">
                                         $item->name 
                                    </a>
                                    <span class=\"block2-price m-text6 p-r-5\">".
                                         number_format($item->price,0,',','.')
                                    ."  VND</span>
                                </div>
                            </div>
                        </div>";
            // mac du` da co cai duoi nay, nhung ko hieu sao neu nhu bo no di thi ko chay duoc :(
            $data .="<script>$('.block2-btn-addcart').each(function(){
            var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
            $(this).on('click', function(){
                var item = {id:id, name:name, quantity:1, price:price, image:image};
                item = JSON.stringify(item);
                localStorage.setItem('ca-'+id,item); 
                swal(nameProduct, \"đã được thêm vào giỏ hàng !\", \"success\");
            });
            $('.sum-result').html('Tổng ".count($book)." kết quản được tìm thấy');
        });</script>";
        }
        return $data;

    }


    // public function getBlog(){
    // 	return view('blog');
    // }

    public function getProductDetail($id){

    	$book = book::select('*')->where('id',$id)->first()->toArray();

    	$detail = DB::table('image_books')->leftJoin('books','books.id','=','image_books.book_id')->where('books.id',$id)->select('image_books.image')->get();
    	$info = DB::table('books')->join('publishers','publishers.id','=','books.publisher_id')
    	->join('kinds','kinds.id','=','books.kind_id')
    	->join('authors','authors.id','=','books.author_id')
    	->select('authors.name as author', 'kinds.name as kind', 'publishers.name as publisher')
    	->where('books.id',$id)->get();

        $book_recomment = book::select('*')->skip(0)->take(8)->get()->toArray();

        $feedback = feedback::select('feedback.*','users.name','users.image')->join('users','users.id','=','feedback.user_id')->where('feedback.book_id',$id)->skip(0)->take(6)->orderBy('feedback.created_at','desc')->get()->toArray();
           

    	return view('product-detail',compact('book','detail','info','book_recomment','feedback'));
    }

    public function getAbout(){
    	$about = about::find(1)->get()->toArray();
    	
    	$about = $about[0];
    	return view('about',compact('about'));
    }

    public function getContact(){
        $page = HeaderPage::find('2');
    	return view('contact',compact('page'));
    }

    public function postContact(){
        //print_r($_POST);
        $data = $_POST;
        $email='thanhhv317@gmail.com';
        Mail::send('mail.blanks',$data,function($msg) use($email){
            $msg->from($email,'Thành');
            $msg->from($email,'Mai Lan')->subject('Đây là mail của Mai Lan');   
        });
        return redirect()->route('getContact');
    }

    public function getCart(){
        $page = HeaderPage::find('4');
    	return view('cart',compact('page'));
    }
    
    public function getInfoPeople(){
        $page = HeaderPage::find('3');
        return view('infoPeople',compact('page'));
    }

    public function posInfoPeople(UserProfileRequest $request){
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

        return redirect()->route('getInfoPeople');
    }

    public function getCheckout(){
        $page = HeaderPage::find('4');
        return view('checkout',compact('page'));
    }

    public function postCheckout(){
        
        $name = Request::input('name');

        $phone = Request::input('phone');
        //number 0 - fake
        $phone = preg_match('/[^0-9]+$/', $phone) ? 0 : $phone;

        $address = Request::input('address');
        $email = Request::input('mail');
        $payMethod = Request::input('payMethod');

        $content = Request::input('content');
        $content = ($content =="") ? "không có gì":$content;


        $totalPrice = Request::input('totalPrice');
        $totalQuantity = Request::input('totalQuantity');


        // ago: 1,2,3. after : array = [1,2,3];
        $resultId = Request::input('resultId');
        $resultId = explode(',', $resultId);

        $resultQuantity = Request::input('resultQuantity');
        $resultQuantity = explode(',', $resultQuantity);

        $resultPrice = Request::input('resultPrice');
        $resultPrice = explode(',', $resultPrice);

        // set of order
        $order = new order;
        $order->quantity = $totalQuantity;
        $order->totalPrice = $totalPrice;
        $order->name = $name;
        $order->address = $address;
        $order->phone = $phone;
        $order->email = $email;
        $order->payMethod = $payMethod;
        $order->content = $content;
        $order->status = 0;
        $order->save();

        //set of order_detail
        for ($i=0; $i <count($resultId) ; $i++) { 
            $order_detail = new OrderDetail;
            $order_detail->order_id = $order->id;
            $order_detail->book_id = $resultId[$i];
            $order_detail->quantity = $resultQuantity[$i];
            $order_detail->price = $resultPrice[$i];
            $order_detail->save();
        }

        return redirect()->route('getCart')->with(['flash_level'=>'success','flash_message'=>"Đặt hàng thành công, đơn hàng sẽ chuyển đến cho bạn sớm nhất. Mã đặt hàng của bạn là $order->id. Vui lòng nhớ thông tin để tra cứu đơn hàng."]);
    }

}
