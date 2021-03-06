@extends('admin.master')
@section('content')
    <section class="content-header">
      <h1>
        Thông tin chi tiết
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin/dashboard/list') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Page header</li>
      </ol>
    </section>

  <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><i class="fa fa-user"></i>Nội dung trang thông tin</h3>
                </div><!-- /.box-header -->
                <!-- box option -->
                
                
                <div class="box-body">
                  @foreach($data as $item)
                  <form action="{{ url('admin/page/edit') }}" method="POST" enctype="multipart/form-data">
                  <@csrf></@csrf>
                  <div class="row">
                  <div class="col-md-4">
                    <h3>{!! $item['title'] !!}</h3>
                    <br>
                    <div class="profile-img">
                      <img src="{{ asset('resources/uploads/pages/'. $item['image'] ) }}" alt=""/>
                      <div class="file btn btn-lg btn-primary">
                        Change Photo
                        <input type="file" name="fileImg"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <input type="text" hidden="" name="id" value="{{ $item['id'] }}">
                    <p>Nội dung: <input required="" type="text" name="text" class="form-control" value="{!! $item['text'] !!}"></p>
                    <button type="submit" class="btn btn-success" >OK</button>
                  </div>
                  </div>
                  <hr>
                </form>
                  @endforeach
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
  <style>
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