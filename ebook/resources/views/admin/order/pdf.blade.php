<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Danh sách Hóa đơn</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<style>
	 	body {
		  	font-family: DejaVu Sans;
	  	}
	  	table{
		  	font-size: 80%;
	  	}
	</style>
</head>
<body>
	
	<h1 style="text-align: center;">DANH SÁCH HÓA ĐƠN</h1>
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
	
	<p>Ngày xuất: <?php date_default_timezone_set('Asia/Bangkok');echo date(" h:i:s d/m/Y", time()); ?></p>
</body>
</html>