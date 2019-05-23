@extends('admin.master')
@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Thống kê các bình luận phản hồi từ khách hàng
            <small>List book</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('admin/dashboard/list') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Feedback</a></li>
            <li class="active">List</li>
          </ol>
        </section>
        <br>
        
        <section class="content-title">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"></h3>
                  <div class="btn-toolbar pull-right">
                    
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
                  <h3 class="box-title">Dữ liệu các bình luận</h3>
                </div><!-- /.box-header -->
                <!-- box option -->
                
                
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Người bình luận</th>
                        <th>Sách được bình luận</th>
                        <th>Nội dung</th>
                        <th>Thời gian</th>
                        <th>Chức năng</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $item)
                      <tr class="feedback{{ $item->id }}">
                        <td>{!! $item->user !!}</td>
                        <td>{!! $item->book !!}</td>
                        <td>{!! $item->content !!}</td>
                        <td>
                        {!! 
                          \Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->diffForHumans();
                        !!}
                        </td>
                        <td class="visible-md visible-lg">
                          <div class="col-md-3"></div>
                          <div class="btn-group">
                            <a style="cursor: pointer;" onclick="detailFeedback({!! $item->id !!})" data-toggle="modal" data-target=".bd-example-modal-lg" ><i class="fa fa-fw fa-search-minus"></i></a>
                            <a style="cursor: pointer;" onclick="removeFeedback({!! $item->id !!})"><i class="fa fa-fw fa-remove"></i></a>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th></th>
                        
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
<script>
  function detailFeedback(id){
    $.ajax({
        url: "{!! url('admin/statistical/detailFeedback') !!}"+'/'+id,
        success: function(data) {  
            $('.modal-body').html(data);
        }
    });
  }
  function removeFeedback(id){
    swal({
      title: "Bạn có chắc chắn muốn xóa!",
      text: "Tất cả dữ liệu về bình luận này sẽ mất nếu bạn đồng ý!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
        url: "{!! url('admin/statistical/deleteFeedback') !!}"+'/'+id,
          success: function(data) { 
            if(data == 1 ){
              swal("Xóa thành công bình luận!", {icon: "success",});
              $('.feedback'+id).html(' ');
            }
            else{
              swal("Lỗi hệ thống, vui lòng kiểm tra lại!", {icon: "error",});
            }
          }
        });
        
      } else {
        swal("Hủy bỏ!");
      }
    })
  }
</script>

@endsection()