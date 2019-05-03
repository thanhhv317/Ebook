@extends('admin.master')
@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Danh sách tác giả
            <small>List author</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Author</a></li>
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
                        <a href="{!! route('admin.author.getAdd') !!}" class="btn btn-circle btn-bordered btn-fill btn-to-success show-tooltip" title="Add new record"><i class="fa fa-plus"></i></a>
                    </div>
                    <div class="btn-group">
                        <a class="btn btn-circle btn-bordered btn-fill show-tooltip" title="Print" href="{!! route('admin.author.getPrint') !!}" target="_blank"><i class="fa fa-print"></i></a>
                        <a class="btn btn-circle btn-bordered btn-fill show-tooltip" title="Export to PDF" href="{!! route('admin.author.getPdf') !!}" target="_blank"><i class="fa fa-file-text-o"></i></a>
                        <a class="btn btn-circle btn-bordered btn-fill show-tooltip" title="Export to Exel" href="{!! route('admin.author.getExcel') !!}" target="_blank"><i class="fa fa-table"></i></a>
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
                  <h3 class="box-title">Dữ liệu tác giả</h3>
                </div><!-- /.box-header -->
                <!-- box option -->
                
                
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Số thứ tự</th>
                        <th>Tên tác giả</th>
                        <th>Ngày sinh</th>
                        <th>Chức năng</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $stt=1; ?>
                      @foreach($data as $item)
                      <tr>
                        <td>{!! $stt !!}</td>
                        <td>{!! $item->name !!}</td>
                        <td>{!! \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->birthday)->format('Y-m-d') !!}</td>
                        <td class="visible-md visible-lg">
                          <div class="col-md-3"></div>
                          <div class="btn-group">
                            <a style="cursor: pointer;" onclick="detailAuthor({!! $item->id !!})" data-toggle="modal" data-target=".bd-example-modal-lg" ><i class="fa fa-fw fa-search-minus"></i></a>
                            <a href="{!! url('admin/author/edit',$item->id) !!}"><i class="fa fa-fw fa-pencil-square-o"></i></a>
                            <a style="cursor: pointer;" onclick="removeAuthor({!! $item->id !!})"><i class="fa fa-fw fa-remove"></i></a>
                          </div>
                        </td>
                      </tr>
                      <?php $stt++; ?>
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
  function removeAuthor(id){
    swal({
              title: "Bạn có muốn xóa ?",
              text: "Dữ liệu sẽ mất luôn cả những cuốn sách thuộc tác giả này!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                    
                swal("Đã xóa", {
                icon: "success",
                });
                $.ajax({
                        url: "{!! url('admin/author/delete') !!}"+'/'+id,
                        success: function(data) {  
                            $('.main-contain').html(data);
                        }
                    });
                //window.location='http://localhost:8080/www/framework/ebook/admin/book/list';  
            } else {
                swal("Mời tiếp tục");
            }
        });
  }
  function detailAuthor(id){
    $.ajax({
        url: "{!! url('admin/author/detail') !!}"+'/'+id,
        success: function(data) {  
            $('.modal-body').html(data);
        }
    });
  }
</script>

@endsection()