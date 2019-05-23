@extends('admin.master')
@section('content')
<?php 
    $tmp = array(
        0 => 'Chưa giải quyết',
        1 => 'Bị hủy bỏ',
        2 => 'Hết hạn',
        3 => 'Đang xử lý',
        4 => 'Hoàn thành',
        5 => 'Phiếu khống',
        6 => 'Đang vận chuyển'
      );
    ?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Thống kê về đơn đặt hàng
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('admin/dashboard/list') }}"><i class="fa fa-dashboard"></i> Home</a></li>
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

        
        <section class="content-title">
            <div class="col-xs-12">
              <div class="box">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Loại hóa đơn</th>
                            <th scope="col">Tổng số lượng</th>
                            <th scope="col">Xem chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $j=0; ?>
                        @for($i=0;$i<7;++$i)
                        <tr>
                            <th scope="row">{{ $j++  }}</th>
                            <td>{{ $tmp[$i] }}</td>
                            <td>
                              @if(isset($order[$i]))
                                {{ $order[$i]->num }}
                              @elseif(!isset($order[$i]))
                                0
                              @endif
                            </td>
                            <td>
                              <a href="{{ url('admin/order/list/'.$i) }}" target="_blank" class="btn btn-primary"  >Nhấn để xem</a>
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
              </div>
            </div> 
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Biểu đồ tỉ lệ Phần trăm các đơn hàng trong hệ thống</h3>
                </div><!-- /.box-header -->
                <!-- box option -->
                
                
                <div class="box-body">
                  <div id="chartContainer" style="height: 300px; width: 100%;"></div>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
  exportEnabled: true,
  animationEnabled: true,
  title:{
    text: ""
  },
  legend:{
    cursor: "pointer",
    itemclick: explodePie
  },
  data: [{
    type: "pie",
    showInLegend: true,
    toolTipContent: "{name}: <strong>{y/}%</strong>",
    indexLabel: "{name} - {y}%",
    dataPoints: [
    

    
      @for($i=0;$i<7;++$i)
          @if(isset($order[$i]))
        { y: 
          {!! ($order[$i]->status == $i) ? ($order[$i]->num/$sum)*100 :0 !!}, name: "{!! $tmp[$i] !!}"},
          @else
          { y:0 , name: "{!! $tmp[$i] !!}" },
          @endif

      @endfor
    ]
  }]
});
chart.render();
}

function explodePie (e) {
  if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
    e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
  } else {
    e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
  }
  e.chart.render();

}
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@endsection()