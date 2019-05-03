<html>
<title>Danh mục thể loại</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
  body {
  font-family: DejaVu Sans;
  }
</style>
<body>
  <p style="text-align: center;">DANH SÁCH THỂ LOẠI</p>

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
    @foreach( $result as $item)
    <tr>
      <th scope="row">{!! $stt !!}</th>
      <td>{!! $item->id !!}</td>
      <td>{!! $item->name !!}</td>
    </tr>
    <?php $stt++ ?>
   @endforeach
  </tbody>
</table>
</body>
</html>