<html>
<title>Danh mục tác giả</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
  body {
  font-family: DejaVu Sans;
  }
</style>
<body>
  <h1><p style="text-align: center;">DANH SÁCH TÁC GIẢ</p></h1>
  <br>
  <hr>

<table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên Tác Giả</th>
      <th scope="col">Ngày Sinh</th>
    </tr>
  </thead>
  <tbody>
    <?php $stt=1; ?>
    @foreach( $result as $item)
    <tr>
      <th scope="row">{!! $stt !!}</th>
      <td>{!! $item->name !!}</td>
      <td>{!! $item->birthday !!}</td>
    </tr>
    <?php $stt++ ?>
   @endforeach
  </tbody>
</table>
</body>
</html>