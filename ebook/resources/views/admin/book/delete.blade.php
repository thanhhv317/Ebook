@include('admin.pages.header')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Danh sách các loại sách
            <small>List book</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Book</a></li>
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
                        <a href="{!! route('admin.book.getAdd') !!}" class="btn btn-circle btn-bordered btn-fill btn-to-success show-tooltip" title="Add new record"><i class="fa fa-plus"></i></a>
                    </div>
                    <div class="btn-group">
                        <a class="btn btn-circle btn-bordered btn-fill show-tooltip" title="Print" href="#"><i class="fa fa-print"></i></a>
                        <a class="btn btn-circle btn-bordered btn-fill show-tooltip" title="Export to PDF" href="#"><i class="fa fa-file-text-o"></i></a>
                        <a class="btn btn-circle btn-bordered btn-fill show-tooltip" title="Export to Exel" href="#"><i class="fa fa-table"></i></a>
                    </div>
                    <div class="btn-group">
                        <a onclick="importBook()" style="cursor: pointer;" class="btn btn-circle btn-bordered btn-fill btn-to-success show-tooltip" title="Import Excel" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-file-excel-o"></i></a>
                        <a class="btn btn-circle btn-bordered btn-fill btn-to-lime show-tooltip" title="Refresh" href="#"><i class="fa fa-repeat"></i></a>
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
                  <h3 class="box-title">Dữ liệu các loại sách</h3>
                </div><!-- /.box-header -->
                <!-- box option -->
                
                
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Tên sách</th>
                        <th>Tác giả</th>
                        <th>Thể loại</th>
                        <th>Giá tiền</th>
                        <th>Thời gian</th>
                        <th>Chức năng</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $item)
                      <tr>
                        <td>{!! $item->name !!}</td>
                        <td>{!! $item->author !!}</td>
                        <td>{!! $item->kind !!}</td>
                        <td>{!! $item->price !!}</td>
                        <td>
                        {!! 
                          \Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->diffForHumans();
                        !!}
                        </td>
                        <td class="visible-md visible-lg">
                          <div class="col-md-3"></div>
                          <div class="btn-group">
                            <a style="cursor: pointer;" onclick="detailBook({!! $item->id !!})" data-toggle="modal" data-target=".bd-example-modal-lg" ><i class="fa fa-fw fa-search-minus"></i></a>
                            <a href="{!! url('admin/book/edit',$item->id) !!}"><i class="fa fa-fw fa-pencil-square-o"></i></a>
                            <a style="cursor: pointer;" onclick="removeBook({!! $item->id !!})"><i class="fa fa-fw fa-remove"></i></a>
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
        @include('admin.pages.footer')
<script>
  function removeBook(id){
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
                $.ajax({
                        url: "{!! url('admin/book/delete') !!}"+'/'+id;
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
  function detailBook(id){
    $.ajax({
        url: "{!! url('admin/book/detail') !!}"+'/'+id,
        success: function(data) {  
            $('.modal-body').html(data);
        }
    });
  }
  function importBook(){
    $.ajax({
        url: "{!! url('admin/book/import') !!}",
        success: function(data) {  
            $('.modal-body').html(data);
        }
    });
  }
</script>