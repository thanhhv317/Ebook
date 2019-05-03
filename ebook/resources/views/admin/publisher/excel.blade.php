<html>
<title>Danh mục nhà xuất bản</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
  body {
  font-family: DejaVu Sans;
  }
</style>
<body>
  <p style="text-align: center;">DANH SÁCH NHÀ XUẤT BẢN</p>

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
    @foreach( $result as $item)
    <tr>
      <th scope="row">{!! $stt !!}</th>
      <td>{!! $item->id !!}</td>
      <td>{!! $item->name !!}</td>
      <td>{!! $item->address !!}</td>
    </tr>
    <?php $stt++ ?>
   @endforeach
  </tbody>
</table>
</body>
</html>