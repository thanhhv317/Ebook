<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Danh sách Hóa đơn</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<script>
		window.print();
	</script>
	<div class="row">
		<div class="col-md-12">
			<h1 style="text-align: center;">DANH SÁCH HÓA ĐƠN</h1>
		</div>
		<hr>
		<br>
		<br>

		<div class="col-md-12">
			<table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">STT</th>
			      <th scope="col">Mã hóa đơn</th>
			      <th scope="col">Người đặt</th>
			      <th scope="col">Địa chỉ</th>
			      <th scope="col">Số lượng</th>
			      <th scope="col">Thành tiền</th>
			      <th scope="col">Ngày đặt</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php $i=1; ?>
			  	@foreach($order as $item)
			    <tr>
			      <th scope="row">{{ $i }}</th>
			      <td>{!! $item['id'] !!}</td>
			      <td>{!! $item['name'] !!}</td>
			      <td>{!! $item['address'] !!}</td>
			      <td>{!! $item['quantity'] !!}</td>
			      <td>{!! $item['totalPrice'] !!}</td>
			      <td>{!! $item['created_at'] !!}</td>
			    </tr>
			    <?php $i++; ?>
			    @endforeach
			  </tbody>
			</table>
		</div>
		<br>
		<div class="col-md-8"></div>
		<div class="col-md-4">Ngày xuất: <?php date_default_timezone_set('Asia/Bangkok');echo date(" h:i:s d/m/Y", time()); ?></div>
	</div>
</body>
</html>