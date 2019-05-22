@extends('master')
@section('content')

	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({!! url('resources/uploads/pages/'.$page->image) !!});">
		<h2 class="l-text2 t-center">
			{!! $page->text !!}
		</h2>
	</section>

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">		
            <hr>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<!------ Include the above in your HEAD tag ---------->

		<div class="container emp-profile">
            <form action="{{ url('profile') }}" method="POST" enctype="multipart/form-data"> @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="{{ asset('resources/uploads/users/'. auth::user()->image ) }}" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="fileImg"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        Tên: {{ Auth::user()->name }}
                                    </h5>
                                    <h6>
                                        Thành viên của TBook.
                                    </h6>
                                    <p><hr></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Thông tin</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>Ngày tạo tài khoản</p>
                            <a href="">{{ auth::user()->created_at }}</a><br/>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                	<input type="text" hidden="" name="id" value="{{ auth::user()->id }}">
                                    <div class="col-md-4">
                                        <label>Họ tên:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control"  placeholder="Họ tên" name="name" value="{{ auth::user()->name }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Số điện thoại</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" data-inputmask='"mask": "9999999999"' data-mask name="phone" value="{{ auth::user()->phone }}" />
                                    </div>
                                </div>
                             	<div class="row">
                                    <div class="col-md-4">
                                      <label>Ngày sinh:</label>
                                    </div>
                                    <div class="col-md-8">
                                      <div class="input-group">
                                        
                                        <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask value="{{ date('d/m/Y', strtotime(auth::user()->birthday)) }}" name="birthday" />
                                      </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Địa chỉ:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control"  placeholder="Địa chỉ" name="address" value="{{ auth::user()->address }}">
                                    </div>
                                </div>  
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Email:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="Email" class="form-control"  placeholder="Email " name="email" value="{{ auth::user()->email }}" disabled="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                	<input type="submit" class="btn btn-success" value="Lưu thông tin"/>
                    </div>
                </div>
            </form>           
        </div>

        <hr>
		</div>
	</section>

<style>
	body{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
</style>

@endsection()