<!-- jQuery 2.1.4 -->
    <script src="{!! url('public/admin/plugins/jQuery/jQuery-2.1.4.min.js') !!}" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{!! url('public/admin/bootstrap/js/bootstrap.min.js') !!}" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="{!! url('public/admin/plugins/datatables/jquery.dataTables.min.js') !!}" type="text/javascript"></script>
    <script src="{!! url('public/admin/plugins/datatables/dataTables.bootstrap.min.js') !!}" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="{!! url('public/admin/plugins/slimScroll/jquery.slimscroll.min.js') !!}" type="text/javascript"></script>
    <!-- Select2 -->
    <script src="{!! url('public/admin/plugins/select2/select2.full.min.js') !!}" type="text/javascript"></script>
    <!-- InputMask -->
    <script src="{!! url('public/admin/plugins/input-mask/jquery.inputmask.js') !!}" type="text/javascript"></script>
    <script src="{!! url('public/admin/plugins/input-mask/jquery.inputmask.date.extensions.js') !!}" type="text/javascript"></script>
    <script src="{!! url('public/admin/plugins/input-mask/jquery.inputmask.extensions.js') !!}" type="text/javascript"></script>
    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
    <script src="{!! url('public/admin/plugins/daterangepicker/daterangepicker.js') !!}" type="text/javascript"></script>
    <!-- bootstrap color picker -->
    <script src="{!! url('public/admin/plugins/colorpicker/bootstrap-colorpicker.min.js') !!}" type="text/javascript"></script>
    <!-- bootstrap time picker -->
    <script src="{!! url('public/admin/plugins/timepicker/bootstrap-timepicker.min.js') !!}" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="{!! url('public/admin/plugins/slimScroll/jquery.slimscroll.min.js') !!}" type="text/javascript"></script>
    <!-- iCheck 1.0.1 -->
    <script src="{!! url('public/admin/plugins/iCheck/icheck.min.js') !!}" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="{!! url('public/admin/plugins/fastclick/fastclick.min.js') !!}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{!! url('public/admin/dist/js/app.min.js') !!}" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{!! url('public/admin/dist/js/demo.js') !!}" type="text/javascript"></script>
    <!-- ckediter -->
    <script type="text/javascript" language="javascript" src="{!! url('public/admin/js/ckeditor/ckeditor.js') !!}" ></script>
    <!-- socket io -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.dev.js"></script>
    
    <!-- FastClick -->
    <script src="{!! url('public/admin/plugins/fastclick/fastclick.min.js') !!}" type="text/javascript"></script>
    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
      $("div.alert").delay(3000).slideUp();

      // delete image_book->image
      $('a#del_img-demo').on('click',function(){
        // var url ='http://localhost:8080/www/framework/ebook/admin/book/delimg/';
        var url = "{{ url('admin/book/delimg') }}";
        var _token = $("form[name='frmProductEdit']").find("input[name='_token']").val();
        var idHinh = $(this).parent().find('img').attr('idHinh');
        var img = $(this).parent().find('img').attr('src');
        var rid = $(this).parent().find('img').attr('id');
        
        $.ajax({
            url: url +'/' +idHinh,
            type: 'GET',
            cache: false,
            data: {'_token': _token,'idHinh':idHinh,'urlHinh':img},
            success: function(data){
                if(data == "Ok"){
                    $('#'+rid).remove();
                }
                else{
                    alert('ERROR !!!');
                }
            }
        })
      });
      $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        $("[data-mask]").inputmask();
    </script>

    <!-- socket io -->
    