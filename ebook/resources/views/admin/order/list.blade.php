@extends('admin.master')
@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Danh sách các đơn đặt hàng
            <small>List order</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Order</a></li>
            <li class="active">Danh sách</li>
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
                        <a href="{!! url('cart') !!}" class="btn btn-circle btn-bordered btn-fill btn-to-success show-tooltip" target="_blank" title="Add new record"><i class="fa fa-plus"></i></a>
                    </div>
                    <div class="btn-group">
                        <a class="btn btn-circle btn-bordered btn-fill show-tooltip" title="Print" href="{!! (isset($status))? url('admin/order/printS/'.$status) : url('admin/order/printA') !!}" target="_blank"><i class="fa fa-print"></i></a>
                        <a class="btn btn-circle btn-bordered btn-fill show-tooltip" title="Export to PDF" href="{!! (isset($status))? url('admin/order/pdfS/'.$status) : url('admin/order/pdfA') !!}" target="_blank"><i class="fa fa-file-text-o"></i></a>
                        @if(!isset($status))
                        <a class="btn btn-circle btn-bordered btn-fill show-tooltip" title="Export to Exel" href="{!! url('admin/order/excelA') !!}" target="_blank"><i class="fa fa-table"></i></a>
                        @endif
                    </div>
                    <div class="btn-group">
                        <a class="btn btn-circle btn-bordered btn-fill btn-to-lime show-tooltip" title="Refresh" href="#" onclick="location.reload();"><i class="fa fa-repeat"></i></a>
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
                  <h3 class="box-title">Dữ liệu các đơn đặt hàng</h3>
                </div><!-- /.box-header -->
                <!-- box option -->
                
                
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Người đặt</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                        <th>Địa chỉ</th>
                        <th>Trạng thái</th>
                        <th>Ngày đặt</th>
                        <th>Chức năng</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($order as $item)
                        <form action="" method="POST">
                      <tr class="order{{ $item->id }}">
                        <td>{!! $item->name !!}</td>
                        <td>{!! $item->quantity !!}</td>
                        <td>{!! $item->totalPrice !!}</td>
                        <td>{!! $item->address !!}</td>
                        <td><select class="form-control" name="status" id="status{{ $item->id }}">
                          <option value="0" {{ ($item->status ==0)? "selected":"" }}>Chưa giải quyết</option>
                          <option value="1" {{ ($item->status ==1)? "selected":"" }}>Bị hủy bỏ</option>
                          <option value="2" {{ ($item->status ==2)? "selected":"" }}>Hết hạn</option>
                          <option value="3" {{ ($item->status ==3)? "selected":"" }}>Đang xử lý</option>
                          <option value="4" {{ ($item->status ==4)? "selected":"" }}>Hoàn thành</option>
                          <option value="5" {{ ($item->status ==5)? "selected":"" }}>Phiếu khống</option>
                          <option value="6" {{ ($item->status ==6)? "selected":"" }}>Vận chuyển</option>
                          @csrf
                        </select><input type="button" class="btn btn-success" onclick="updateStatus('{!! $item->id !!}')" value="OK" /></td>
                        <td>
                        {!! 
                          \Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->diffForHumans();
                        !!}
                        </td>
                        <td class="visible-md visible-lg">
                          <div class="col-md-3"></div>
                          <div class="btn-group">
                            <a style="cursor: pointer;" onclick="viewDetail('{!! $item->id !!}')"  data-toggle="modal" data-target=".bd-example-modal-lg" ><i class="fa fa-fw fa-search-minus"></i></a>
                            <a title="Print" href="{!! url('admin/order/print/'. $item->id) !!}" target="_blank"><i class="fa fa-print"></i></a>
                            <a style="cursor: pointer;" onclick="deleteOrder('{!! $item->id !!}')" ><i class="fa fa-fw fa-remove"></i></a>
                          </div>
                        </td>
                      </tr>
                        </form>
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
  function updateStatus(id){
    var status = $('#status'+id).find(":selected").val();
    $.ajax({
        url: "{!! url('admin/order/edit') !!}"+'/'+id,
        data: {status: status},
        success: function(data) { 
          swal("Thành công!", "Đơn hàng đã được cập nhật!", "success");
        }
    });
  }
  function viewDetail(id){
    $.ajax({
        url: "{!! url('admin/order/detail') !!}"+'/'+id,
        success: function(data) { 
          $('.modal-body').html(data);
        }
    });
  }
  function deleteOrder(id){
    swal({
      title: "Bạn có chắc chắn muốn xóa!",
      text: "Tất cả dữ liệu chi tiết về hóa đơn sẽ mất nếu bạn đồng ý!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
        url: "{!! url('admin/order/delete') !!}"+'/'+id,
          success: function(data) { 
            if(data == 1 ){
              swal("Xóa thành công hóa đơn!", {icon: "success",});
              $('.order'+id).html(' ');
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