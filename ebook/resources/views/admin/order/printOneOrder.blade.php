<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>In phiếu bán hàng</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<script>
		window.print();
	</script>
	<div class="float-right">Mẫu số: {!! $order['id'] !!} &nbsp;</div><br>
	<div class="col-md-12">
		<h1 style="text-align: center">HÓA ĐƠN BÁN HÀNG</h1>
	</div>
	<br>
	<div class="col-md-12">
		<h6 style="text-align: center">Ngày......tháng......năm 20...</h6>
		<br>
		<p>Đơn vị bán: Công ty TNHH Tbook.</p>
		<p>Địa chỉ: 240 An Dương Vương - Phường 9 - Quận 5 - TP Hồ Chí Minh.</p>
		<p>Số điện thoại: ..............................................................</p>
		<hr>
		<p>Họ tên người mua hàng: {!! $order['name'] !!}</p>
		<p>Địa chỉ: {!! $order['address'] !!}</p>

		<p>Email: {!! $order['email'] !!} </p>
		<p>Số điện thoại: {!! $order['phone'] !!}</p>
		<p>Hình thức thanh toán: {!! ($order['payMethod']==1) ? "Thanh toán khi nhận hàng":" đã thanh toán qua Paypal" !!}</p>
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">STT</th>
					<th scope="col">Tên hàng hóa</th>
					<th scope="col">Số lượng</th>
					<th scope="col">Giá x1</th>
					<th scope="col">Thành tiền</th>
				</tr>
			</thead>
			<tbody>
				@for($i=0;$i< count($dataOrder);++$i)
				<tr>
					<th scope="row">{!! $i+1 !!}</th>
					<td>{!! $dataBook[$i]['name'] !!}</td>
			      <td>{!! $dataOrder[$i]['quantity'] !!}</td>
			      <td>{!! number_format($dataBook[$i]['price'],0,',','.') !!}</td>
			      <td>{!! number_format(($dataBook[$i]['price']*$dataOrder[$i]['quantity']),0,',','.') !!}</td>
				</tr>
				@endfor
			</tbody>
		</table>
		<p>Tổng cộng: {!! number_format($order['totalPrice'],0,',','.') !!} VND.</p>
		<hr>
	</div>
	<div class="row">
		<div class="col-md-6" style="text-align: center;">
			<p>Người mua hàng</p>
			<p>(Ký, ghi rõ họ tên)</p>
		</div>
		<div class="col-md-6"style="text-align: center;">
			<p>Người bán hàng</p>
			<p>(Ký, ghi rõ họ tên)</p>
		</div>
		<p> </p>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<div class="col-md-12" style="text-align: center;">
			<i>(Cần kiểm tra đối chiếu khi giao, nhận hóa đơn) </i>
		</div>
	</div>
</body>
</html>