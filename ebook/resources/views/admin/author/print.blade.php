<html>
<title>Danh mục tác giả</title>
@include('admin.pages.header')
<body>
  <h1><p style="text-align: center;">DANH SÁCH TÁC GIẢ</p></h1>
  <br>
  <hr>

<table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên Tác Giả</th>
      <th scope="col">Ngày sinh</th>
    </tr>
  </thead>
  <tbody>
    <?php $stt=1; ?>
    @foreach( $data as $item)
    <tr>
      <th scope="row">{!! $stt !!}</th>
      <td>{!! $item->name !!}</td>
      <td>{!! $item->birthday !!}</td>
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
