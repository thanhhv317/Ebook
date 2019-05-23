@extends('admin.master')
@section('content')

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Thống kê về chi tiết sách
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('admin/dashboard/list') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">book</a></li>
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
                        <a class="btn btn-circle btn-bordered btn-fill show-tooltip" title="Print" href="{!! route('admin.book.getPrint') !!}" target="_blank"><i class="fa fa-print"></i></a>
                        <a class="btn btn-circle btn-bordered btn-fill show-tooltip" title="Export to PDF" href="{!! route('admin.book.getPdf') !!}" target="_blank"><i class="fa fa-file-text-o"></i></a>
                        <a class="btn btn-circle btn-bordered btn-fill show-tooltip" title="Export to Exel" href="{!! route('admin.book.getExcel') !!}" target="_blank"><i class="fa fa-table"></i></a>
                    </div>
                    <div class="btn-group">
                        
                        <a class="btn btn-circle btn-bordered btn-fill btn-to-lime show-tooltip" title="Refresh" href="#" onclick="refreshPage()"><i class="fa fa-repeat"></i></a>
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
                  <h3 class="box-title">Biểu đồ danh sách 5 cuốn sách được đặt hàng nhiều nhất</h3>
                </div><!-- /.box-header -->
                <!-- box option -->
                
                
                <div class="box-body">
                  <div id="chartContainer" style="height: 300px; width: 100%;"></div>

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
                  <h3 class="box-title">Biểu đồ danh sách 5 cuốn sách được đánh giá nhiều nhất</h3>
                </div><!-- /.box-header -->
                <!-- box option -->
                
                
                <div class="box-body">
                  <div id="chartContainer2" style="height: 300px; width: 100%;"></div>

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
                  <h3 class="box-title">Biểu đồ sách thống kê theo thể loại</h3>
                </div><!-- /.box-header -->
                <!-- box option -->
                
                
                <div class="box-body">
                  <div id="chartContainer3" style="height: 300px; width: 100%;"></div>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

<script>
window.onload = function () {
  createChart1();
  createChart2();
  createChart3();
function createChart1(){
  var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    theme: "light1", // "light1", "light2", "dark1", "dark2"
    title:{
      text: ""
    },
    axisY: {
      title: "Số lượng (cuốn)"
    },
    data: [{        
      type: "column",  
      showInLegend: true, 
      legendMarkerColor: "grey",
      legendText: "Thống kê",
      dataPoints: [    
      @foreach($order as $item)  
        { y: {!! $item->num !!}, label: "{!! $item->name !!}" },
        @endforeach
      ]
    }]
  });
  chart.render();
  }
  function createChart2(){
  var chart = new CanvasJS.Chart("chartContainer2", {
    animationEnabled: true,
    theme: "light2", // "light1", "light2", "dark1", "dark2"
    title:{
      text: ""
    },
    axisY: {
      title: "đánh giá (lượt)"
    },
    data: [{        
      type: "column",  
      showInLegend: true, 
      legendMarkerColor: "grey",
      legendText: "Thống kê",
      dataPoints: [    
      @foreach($feedback as $item)  
        { y: {!! $item->num !!}, label: "{!! $item->name !!}" },
        @endforeach
      ]
    }]
  });
  chart.render();
  }
function createChart3(){
  var chart = new CanvasJS.Chart("chartContainer3", {
  animationEnabled: true,
  title:{
    text: "Percent Book for Kind",
    horizontalAlign: "left"
  },
  data: [{
    type: "doughnut",
    startAngle: 60,
    //innerRadius: 60,
    indexLabelFontSize: 17,
    indexLabel: "{label} - #percent%",
    toolTipContent: "<b>{label}:</b> {y} (#percent%)",
    dataPoints: [
      @foreach($kind as $item)
      { y: {!! $item->num !!}, label: "{!! $item->name !!}" },
      
      @endforeach
    ]
  }]
});
chart.render();

}

}
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@endsection()