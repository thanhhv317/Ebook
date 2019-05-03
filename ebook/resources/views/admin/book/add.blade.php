@extends('admin.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Thêm sách mới
    <small>add Book</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Book</a></li>
    <li class="active">Thêm sách</li>
  </ol>
</section>
@include('admin.blocks.error')

<!-- Main content -->
<section class="content">
  <!-- SELECT2 EXAMPLE -->
  <div class="box box-default">
  <form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    <div class="box-header with-border">
      <h3 class="box-title">Thêm Sách</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div><!-- /.box-header -->
    <div class="box-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Tên sách</label>
            <input type="text" class="form-control txtName" name="txtName" required="" value="{!! old('txtName') !!}">
          </div>

          <div class="form-group">
            <label>Thể loại</label>
            <select class="form-control select2" name="slKind">
              @foreach($kind as $item)
              <option value="{!! $item['id'] !!}">{!! $item['name'] !!}</option>
              @endforeach()
            </select>
          </div>

          <div class="form-group">
            <label>Tác giả</label>
            <select class="form-control select2" name="slAuthor" >
              @foreach($author as $item)
              <option value="{!! $item['id'] !!}">{!! $item['name'] !!}</option>
              @endforeach()
            </select>
          </div>

          <div class="form-group">
            <label>Nhà xuất bản</label>
            <select class="form-control select2" name="slPublisher" >
               @foreach($publisher as $item)
              <option value="{!! $item['id'] !!}">{!! $item['name'] !!}</option>
              @endforeach()
            </select>
          </div>

          <div class="form-group">
            <label>Giá tiền</label>
            <input type="text" class="form-control txtPrice" required="" name="txtPrice" value="{!! old('txtPrice') !!}">
          </div>

          <div class="form-group">
            <label>Số lượng</label>
            <input type="text" class="form-control txtQuantity" name="txtQuantity" required="" value="{!! old('txtQuantity') !!}">
          </div>

        </div><!-- /.col -->
        <div class="col-md-6">
          <div class="form-group">
            <label>Mô tả</label>
            <textarea name="txtDescription" cols="83" rows="5" required="" >{!! old('txtDescription') !!}</textarea>
          </div>

          <div class="form-group">
            <label for="">Hình ảnh</label>
            <input type="file" name="fImage" value="{!! old('fImage') !!}">
            <hr>
          </div>
          <a onclick="loadAddDetail()" style="cursor: pointer;">thêm ảnh chi tiết</a>
          <br>
          <div class="add-this">
          </div>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.box-body -->
    <div class="box-footer">
        <div class="form-group">
          <div class="col-md-7"></div>
          <div class="col-md-5">
            <input type="submit" class="btn btn-success" value="Thêm mới" >
            <input type="button"  class="btn btn-danger" value="Hủy" onclick="cancelAdd()">
          </div>
        </div>
    </div>
  </form>
  </div><!-- /.box -->
</section><!-- /.content -->

<script>
  function loadAddDetail(){
    $('div.add-this').append('<input type="file" name="imageDetail[]"><br>');
  }
  function cancelAdd(){
    window.location='http://localhost:8080/www/framework/ebook/admin/book/list';
  }
</script>

@endsection()