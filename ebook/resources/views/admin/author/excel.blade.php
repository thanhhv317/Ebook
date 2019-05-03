<html>
<title>Danh mục tác giả</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
  body {
  font-family: DejaVu Sans;
  }
</style>
<body>
  <p style="text-align: center;">DANH SÁCH TÁC GIẢ</p>

<table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Mã Tác giả</th>
      <th scope="col">Tên Tác giả</th>
      <th scope="col">Ngày sinh</th>
      <th scope="col">Thông tin</th>
      </tr>
  </thead>
  <tbody>
    <?php $stt=1; ?>
    @foreach( $result as $item)
    <tr>
      <th scope="row">{!! $stt !!}</th>
      <td>{!! $item->id !!}</td>
      <td>{!! $item->name !!}</td>
      <td>{!! $item->birthday !!}</td>
      <td>{!! $item->info !!}</td>
    </tr>
    <?php $stt++ ?>
   @endforeach
  </tbody>
</table>
</body>
</html>