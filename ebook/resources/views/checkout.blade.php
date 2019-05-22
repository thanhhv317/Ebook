@extends('master')
@section('content')


  <!-- Title Page -->
  <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({!! url('resources/uploads/pages/'.$page->image) !!});">
    <h2 class="l-text2 t-center">
        {!! $page->text !!}
    </h2>
  </section>

  <!-- content page -->
  <section class="bgwhite p-t-60 notificate">
    <form action="" method="POST">
    <div class="container">
      <div class="row">
          @csrf
        <div class="col-md-7">
          <table class="table table-striped">
      <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Thông tin khách hàng</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">Họ tên</th>
        <td><input type="text" class="form-control" name="name" value="{!! auth::user() ? auth::user()->name :"" !!}" required=""></td>
      </tr>
      <tr>
        <th scope="row">Số điện thoại</th>
        <td><input type="text" class="form-control" name="phone" value="{!! auth::user() ? auth::user()->phone :"" !!}" required=""></td>
      </tr>
      <tr>
        <th scope="row">Địa chỉ</th>
        <td><input type="text" class="form-control" name="address" value="{!! auth::user() ? auth::user()->address :"" !!}" required=""></td>
      </tr>
      <tr>
        <th scope="row">Email</th>
        <td><input type="Email" class="form-control" name="mail" value="{!! auth::user() ? auth::user()->email :"" !!}"  {!! auth::user() ? "readonly" :"" !!} required=""></td>
      </tr>
      <tr>
        <th scope="row">Phương thức thanh toán</th>
        <td><select class="form-control" name="payMethod" id="">
          <option value="1">Thanh toán khi nhận hàng</option>
          <option value="2">Thanh toán qua Paypal</option>
        </select></td>
      </tr>
      <tr>
        <th scope="row">Gửi cho người bán</th>
        <td><textarea name="content" class="form-control" id="" placeholder="ví dụ: cho thêm ít giấy báo" cols="30" rows="10"></textarea></td>
      </tr>
        
      </tbody>
    </table>
        </div>
        <div class="col-md-5">
          <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
        <h5 class="m-text20 p-b-24">
          Thông tin giỏ hàng:
        </h5>

        <!--  -->
        <div class="flex-w flex-sb-m p-b-12">
          <span class="m-text22 w-size19 w-full-sm">
            Số lượng:
          </span>

          <span class="m-text21 w-size20 w-full-sm totalQuantity">
            4
          </span>
        </div>

        <!--  -->
        <div class="flex-w flex-sb-m p-t-26 p-b-30">
          <span class="m-text22 w-size19 w-full-sm">
            Thành tiền:
          </span>

          <span class="m-text21 w-size20 w-full-sm totalPrice">
            $39.00
          </span>
        </div>

        <div class="size15 trans-0-4 checkout-success">
          <!-- Button -->
          <button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" onclick="localStorage.clear();">
            Đặt hàng
          </button>
        </div>
      </div>
        </div>
      </div>
      <hr>
    </div>
    </form>
  </section>



@endsection()