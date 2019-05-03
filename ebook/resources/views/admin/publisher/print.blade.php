<html>
<title>Danh mục nhà xuất bản</title>
@include('admin.pages.header')
<body>
  <h1><p style="text-align: center;">DANH SÁCH NHÀ XUẤT BẢN</p></h1>
  <br>
  <hr>

<table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Mã</th>
      <th scope="col">Tên nhà xuất bản</th>
      <th scope="col">Địa chỉ</th>
    </tr>
  </thead>
  <tbody>
    <?php $stt=1; ?>
    @foreach( $data as $item)
    <tr>
      <th scope="row">{!! $stt !!}</th>
      <td>{!! $item->id !!}</td>
      <td>{!! $item->name !!}</td>
      <td>{!! $item->address !!}</td>
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
