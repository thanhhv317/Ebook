<html>
<title>Danh mục sách</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
  body {
  font-family: DejaVu Sans;
  }
</style>
<body>
  <p style="text-align: center;">DANH MỤC SÁCH</p>

<table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên sách</th>
      <th scope="col">Thể loại</th>
      <th scope="col">Tác giả</th>
      <th scope="col">Nhà xuất bản</th>
      <th scope="col">Giá tiền</th>
      <th scope="col">Số lượng</th>
    </tr>
  </thead>
  <tbody>
    <?php $stt=1; ?>
    @foreach( $result as $item)
    <tr>
      <th scope="row">{!! $stt !!}</th>
      <td>{!! $item->name !!}</td>
      <td>{!! $item->kind !!}</td>
      <td>{!! $item->author !!}</td>
      <td>{!! $item->publisher !!}</td>
      <td>{!! $item->price !!}</td>
      <td>{!! $item->quantity !!}</td>
      
    </tr>
    <?php $stt++ ?>
   @endforeach
  </tbody>
</table>
</body>
</html>