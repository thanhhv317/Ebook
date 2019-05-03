@extends('admin.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Chi tiết của trang chủ
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Front-end </a></li>
    <li class="active">Trang chủ</li>
  </ol>
</section>
<br>


<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Danh sách các slide</h3>
          <div class="box-tools pull-right">
            <div class="btn-group"> 
                <a style="cursor: pointer;" onclick="addslide()" class="btn btn-circle btn-bordered btn-fill btn-to-success show-tooltip" title="Add new record" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus"></i></a>
                <a style="cursor: pointer;" onclick="editAll()" class="btn btn-circle btn-bordered btn-fill btn-to-success show-tooltip" title="Edit all record" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-edit"></i></a>
            </div>
            <div class="btn-group">
                <a class="btn btn-circle btn-bordered btn-fill btn-to-lime show-tooltip" title="Refresh" href="#" onclick="location.reload();"><i class="fa fa-repeat"></i></a>
            </div>
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
          <hr>
          <br>
        </div><!-- /.box-header -->
        <!-- box option -->
          
        <div class="box-body">
          <?php $i=1; ?>
          @foreach ($result as $key => $value)
            <div class="col-md-6 slide{!! $result[$key]['id'] !!}">
              <div class="box box-orange">
                  <div class="box-title">
                      <h3><i class="fa fa-file"></i>Thông tin slide số {!! $i !!}</h3>
                      <div class="box-tool">
                      </div>
                  </div>
                  <div class="box-content">
                      <form action="#" class="form-horizontal">
                          <div class="form-group">
                              <label class="col-sm-3 col-md-2 control-label">slide:</label>
                              <div class="col-sm-9 col-md-8 controls">
                                  <div class="fileupload fileupload-new" data-provides="fileupload">
                                      <div class="fileupload-new img-thumbnail" >
                                          <img src="{!! asset('resources/uploads/slides/'.$result[$key]['image']) !!}" alt="" style="width: 200px; height: 150px;" />
                                      </div>

                                  </div>

                                  <p style=" font-weight: bold">{!! $result[$key]['title'] !!}</p>
                                  <p style="color:blue;"><b style=" font-weight: bold;color:black">Link của button: </b>{!! $result[$key]['linkbtn'] !!}</p>
                                  <span class="label label-important" style="color: red">{!! $result[$key]['id'] !!}</span>:
                                  <span>{!! $result[$key]['description'] !!}</span>
                                  <div>
                                      <p>Text của Button:<i>{!! $result[$key]['textbtn'] !!}</i></p>
                                      <button type="button" class="btn btn-primary editslide" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-edit" onclick="getViewEdit({!!  $result[$key]['id'] !!});" > Sửa</i>
                                      </button>
                                      <button type="button" class="btn btn-danger deleteslide"><i class="fa fa-times" onclick="getDelete({!!  $result[$key]['id'] !!});" > Xóa</i>
                                      </button>
                                  </div>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
          <?php $i++; ?>
        @endforeach

        
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Danh sách các banner</h3>
          <div class="box-tools pull-right">
            <div class="btn-group"> 
                <a style="cursor: pointer;" onclick="addBanner()" class="btn btn-circle btn-bordered btn-fill btn-to-success show-tooltip" title="Add new record" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus"></i></a>
                <a style="cursor: pointer;" onclick="editAllBanner()" class="btn btn-circle btn-bordered btn-fill btn-to-success show-tooltip" title="Edit all record" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-edit"></i></a>
            </div>
            <div class="btn-group">
                <a class="btn btn-circle btn-bordered btn-fill btn-to-lime show-tooltip" title="Refresh" href="#" onclick="location.reload();"><i class="fa fa-repeat"></i></a>
            </div>
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
          <hr>
          <br>
        </div><!-- /.box-header -->
        <!-- box option -->
          
        <div class="box-body">
        <?php $i=1; ?>
        @foreach ($dataBanner as $key => $value)
          <div class="col-md-6 slide{!! $dataBanner[$key]['id'] !!}">
            <div class="box box-orange">
              <div class="box-title">
                  <h3><i class="fa fa-file"></i>Thông tin banner số {!! $i !!}</h3>
                  <div class="box-tool">
                  </div>
              </div>

              <div class="box-content">
                <form action="#" class="form-horizontal">
                  <div class="form-group">
                    <div class="col-md-4">
                      <div class="thumbnail">
                          <img src="{!! asset('resources/uploads/banners/'.$dataBanner[$key]['image']) !!}" alt="Nature" style="width:100%">
                      </div>
                    </div>
                    <div class="col-md-8">
                      
                        <p><label for="">Nội dung:</label>
                        {!! $dataBanner[$key]['textbtn'] !!}</p>
                        <p><label for="">Link:</label><i style="color: blue">
                        {!! $dataBanner[$key]['linkbtn'] !!}</i></p>
                        <hr>
                          <button type="button" class="btn btn-primary editslide" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-edit" onclick="editBanner({!!  $dataBanner[$key]['id'] !!});" > Sửa</i>
                          </button>
                      
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <?php $i++; ?>
        @endforeach



        
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->

<script>
  function addslide(){
    $.ajax({
        url: "{!! url('admin/home/add') !!}",
        success: function(data) {  
            $('.modal-body').html(data);
        }
    });
  }

  function getViewEdit(id){
    $.ajax({
        url: "{!! url('admin/home/edit/') !!}"+'/'+id,
        success: function(data) {  
            $('.modal-body').html(data);
        }
    });
  }

  function getDelete(id){
    swal({
              title: "Bạn có muốn xóa ?",
              text: "Dữ liệu sẽ mất!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                    
                swal("Đã xóa", {
                icon: "success",
                });
                var cl = 'slide'+id;
                $('.'+cl).html(''); 
                $.ajax({
                        url: "{!! url('admin/home/delete') !!}"+'/'+id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                                      
                        }
                    });
              
            } else {
                swal("Mời tiếp tục");
            }
        });
  }  
  function editAll(){
    $.ajax({
        url: "{!! url('admin/home/editAll') !!}",
        success: function(data) {  
            $('.modal-body').html(data);
        }
    });
  }

  function addBanner(){
    $.ajax({
        url: "{!! url('admin/home/addbn') !!}",
        success: function(data) {  
            $('.modal-body').html(data);
        }
    });
  }
  function editBanner(id){
    $.ajax({
        url: "{!! url('admin/home/editbn/') !!}"+'/'+id,
        success: function(data) {  
            $('.modal-body').html(data);
        }
    });
  }
</script>
@endsection()