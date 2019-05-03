<html>
<title>Danh mục thể loại</title>
@include('admin.pages.header')
<body>
  <h1><p style="text-align: center;">DANH SÁCH THỂ LOẠI</p></h1>
  <br>
  <hr>

<table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Mã thể loại</th>
      <th scope="col">Tên thể loại</th>
    </tr>
  </thead>
  <tbody>
    <?php $stt=1; ?>
    @foreach( $data as $item)
    <tr>
      <th scope="row">{!! $stt !!}</th>
      <td>{!! $item->id !!}</td>
      <td>{!! $item->name !!}</td>
    </tr>
    <?php $stt++; ?>
   @endforeach
  </tbody>
</table>
</body>
</html>
<script>
  window.print();
</script>
