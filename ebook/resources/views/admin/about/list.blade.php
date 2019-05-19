@extends('admin.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Thông tin
    <small>List about</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="#">About</a></li>
    </ol>
</section>
<br>

<section class="content-title">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"></h3>
          <div class="btn-toolbar pull-right">
            <div class="btn-group">
                <a style="cursor: pointer;" onclick="getViewEdit()" data-toggle="modal" data-target=".bd-example-modal-lg" ><i class="fa fa-edit"></i></a>
            </div>
        </div>
      </div>
    </div> 
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Nội dung trang thông tin</h3>
        </div><!-- /.box-header -->
        <!-- box option -->
        <div class="box-body">
          <div class="col-md-5">
            <p>Banner:</p>
            <img class="img-responsive img-thumbnail" src="{!! asset('resources/uploads/abouts/'.$result['banner']) !!}" style="width:300px;height: 200px;">
            <p>Hình ảnh mô tả:</p>
            <img class="img-responsive img-thumbnail" src="{!! asset('resources/uploads/abouts/'.$result['image']) !!}" style="width:300px;height: 200px;">
          </div>
          <div class="col-md-7">
            <p style="color: blue;">Đề mục: <b style="color: black;">{!! $result['story'] !!}.</b></p> 
            <hr>
            <p style="color: blue;">Mô tả: </p >: {!! $result['description'] !!}
            <hr>
            <p style="color: blue;">Slogant: </p><b style="color: black;">{!! $result['slogant'] !!}</b>
            <hr>
            <p style="color: blue;">Tham khảo: <b style="color: black;">{!! $result['author'] !!}.</b></p>
          </div>
      </div>

       
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->

<script>
  function getViewEdit(){
    $.ajax({
        url: "{!! url('admin/about/edit/') !!}",
        success: function(data) {  
            $('.modal-body').html(data);
        }
    });
  }
</script>

@endsection()