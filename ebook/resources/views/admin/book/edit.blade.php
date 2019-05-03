@extends('admin.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Sửa sách
    <small>edit Book</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Book</a></li>
    <li class="active">Sửa sách</li>
  </ol>
</section>
@include('admin.blocks.error')

<!-- Main content -->
<section class="content">
  <!-- SELECT2 EXAMPLE -->
  <div class="box box-default">
  <form action="" method="POST" enctype="multipart/form-data" name="frmProductEdit">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    <div class="box-header with-border">
      <h3 class="box-title"><i class="fa fa-book"></i></h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div><!-- /.box-header -->
    <div class="box-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Tên sách</label>
            <input type="text" class="form-control txtName" name="txtName" required="" value="{!! $book['name'] !!}">
          </div>

          <div class="form-group">
            <label>Thể loại</label>
            <select class="form-control select2" name="slKind">
              @foreach($kind as $item)
              @if($item['id'] == $book['kind_id'])
                <option selected value="{!! $item['id'] !!}">{!! $item['name'] !!}</option>
              @else
              <option value="{!! $item['id'] !!}">{!! $item['name'] !!}</option>
              @endif
              @endforeach()
            </select>
          </div>

          <div class="form-group">
            <label>Tác giả</label>
            <select class="form-control select2" name="slAuthor" >
              @foreach($author as $item)
              @if($item['id'] == $book['kind_id'])
                <option selected value="{!! $item['id'] !!}">{!! $item['name'] !!}</option>
              @else
              <option value="{!! $item['id'] !!}">{!! $item['name'] !!}</option>
              @endif
              @endforeach()
            </select>
          </div>

          <div class="form-group">
            <label>Nhà xuất bản</label>
            <select class="form-control select2" name="slPublisher" >
              @foreach($publisher as $item)
              @if($item['id'] == $book['kind_id'])
                <option selected value="{!! $item['id'] !!}">{!! $item['name'] !!}</option>
              @else
              <option value="{!! $item['id'] !!}">{!! $item['name'] !!}</option>
              @endif
              @endforeach()
            </select>
          </div>

          <div class="form-group">
            <label>Giá tiền</label>
            <input type="text" class="form-control txtPrice" required="" name="txtPrice" value="{!! old('txtPrice'),isset($book['price']) ? $book['price'] : null  !!}">
          </div>

          <div class="form-group">
            <label>Số lượng</label>
            <input type="text" class="form-control txtQuantity" name="txtQuantity" required="" value="{!! old('txtQuantity'),isset($book['quantity']) ? $book['quantity'] : null  !!}">
          </div>

        </div><!-- /.col -->
        <div class="col-md-6">
          <div class="form-group">
            <label>Mô tả</label>
            <textarea name="txtDescription" cols="83" rows="5" required="" >{!! old('txtDescription'),isset($book['description']) ? $book['description'] : null !!}</textarea>
          </div>

          <div class="form-group">
            <div class="col-md-3">
            <label for="">Hình ảnh</label>
            </div>  
            <img class="img-responsive img-thumbnail" src="{!! asset('resources/uploads/books/'.$book['image']) !!}" style="width:300px;height: 200px;">
            <input type="file" name="fImage" value="{!! old('fImage') !!}">
          </div>
          
        </div><!-- /.col -->
      </div><!-- /.row -->
      <hr>
        <div class="col-md-6">
          @foreach($imageBook as $key=> $item)
          <div class="form-group" id="{!! $key !!}">
              <img src="{!! asset('resources/uploads/books/detail/'.$item['image']) !!}" style="width: 200px; margin-bottom: 20px" idHinh="{!! $item['id'] !!}" id="{!! $key !!}">
              <a href="javascript:void(0)" type="button" id="del_img-demo" class="btn btn-danger btn-circle icon_del" ><i class="fa fa-times"></i></a>
          </div>
          @endforeach
        </div>
        <div class="col-md-6">
          <a onclick="loadAddDetail()" style="cursor: pointer;">thêm ảnh chi tiết</a>
          <br>
          <div class="add-this">
          </div>
        </div>
    </div><!-- /.box-body -->
    <div class="box-footer">
        <div class="form-group">
          <div class="col-md-7"></div>
          <div class="col-md-5">
            <input type="submit" class="btn btn-success" value="Hoàn tất" >
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
    swal({
              title: "Hủy bỏ ?",
              text: "Không sửa nữa!",
              icon: "error",
              buttons: true,
              dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                    
                swal("OK", {
                icon: "success",
                });
                window.location='http://localhost:8080/www/framework/ebook/admin/book/list';  
            } else {
                swal("Mời tiếp tục");
            }
        });
    
  }
</script>

@endsection()