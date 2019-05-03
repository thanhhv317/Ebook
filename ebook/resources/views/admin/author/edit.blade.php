@extends('admin.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Sửa tác giả
    <small>edit Author</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Author</a></li>
    <li class="active">sửa</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- SELECT2 EXAMPLE -->
  <div class="box box-default">

@include('admin.blocks.error')
  <form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">

    <div class="box-header with-border">
      <h3 class="box-title">Sửa tác giả</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div><!-- /.box-header -->

    <div class="box-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Tên tác giả</label>
            <input type="text" class="form-control" name="txtName" value="{!! old('txtName'),isset($author->name) ?$author->name: null !!}">
          </div>

          <div class="form-group">
            <label>Ngày sinh</label>
            <input type="text" placeholder="yyyy-mm-dd" class="form-control" name="txtBirthday" value="{!! old('txtBirthday'),isset($author['birthday']) ? $author['birthday'] : null  !!}">
          </div>

          <div class="form-group">
            <label>Thông tin</label>
            <textarea name="txtDescription" cols="83" rows="5"  >{!! old('txtDescription'),isset($author['info']) ? $author['info'] : null  !!}</textarea>
          </div>
        </div><!-- /.col -->
        <div class="col-md-6">
          <div class="form-group">
            <div class="col-md-3">
            <label for="">Hình ảnh</label>
            </div>  
            <img class="img-responsive img-thumbnail" src="{!! asset('resources/uploads/authors/'.$author->image) !!}" style="width:300px;height: 200px;">
          </div>
          <div class="form-group">
            <input type="file" name="fImage" value="{!! old('fImage') !!}">
            <hr>
          </div>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.box-body -->
    <div class="box-footer">
        <div class="form-group">
          <div class="col-md-7"></div>
          <div class="col-md-5">
            <input type="submit" class="btn btn-success" value="Sửa" >
            <input type="button"  class="btn btn-danger" value="Hủy" onclick="cancelAdd()">
          </div>
        </div>
    </div>
  </form>
  </div><!-- /.box -->
</section><!-- /.content -->

<script>
  function cancelAdd(){
    window.location='http://localhost:8080/www/framework/ebook/admin/author/list';
  }
</script>

@endsection()