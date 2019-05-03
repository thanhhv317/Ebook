@extends('admin.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Sửa thể loại
    <small>edit Kind</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Kind</a></li>
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
      <h3 class="box-title">Thêm thể loại sách</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div><!-- /.box-header -->

    <div class="box-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Tên thể loại</label>
            <input type="text" class="form-control" name="txtName" value="{!! old('txtName'),isset($kind->name) ? $kind->name : null  !!}">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group"><br>
            <input type="submit" class="btn btn-success" value="Sửa đổi" >
            <input type="button"  class="btn btn-danger" value="Hủy" onclick="cancelAdd()">
          </div>
        </div>
        </div>
      </div>
    </div>
    <div class="box-footer">
        
    </div>
  </form>
  </div><!-- /.box -->
</section><!-- /.content -->

<script>
  function cancelAdd(){
    window.location='http://localhost:8080/www/framework/ebook/admin/kind/list';
  }
</script>

@endsection()