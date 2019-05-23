<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>In phiếu bán hàng</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	
	
	<div class="col-md-12">
		<br>
		<p>Đơn vị bán: Công ty TNHH Tbook.</p>
		<p>Họ tên người mua hàng: {!! $order['name'] !!}</p>
		<p>Địa chỉ: {!! $order['address'] !!}</p>

		<p>Email: {!! $order['email'] !!} </p>
		<p>Số điện thoại: {!! $order['phone'] !!}</p>
		<p>Hình thức thanh toán: {!! ($order['payMethod']==1) ? "Thanh toán khi nhận hàng":" đã thanh toán qua Paypal" !!}</p>
		<p>Tình trạng đơn hàng: 
		<?php 
			$tmp = array(
				0 => 'Chưa giải quyết',
				1 => 'Bị hủy bỏ',
				2 => 'Hết hạn',
				3 => 'Đang xử lý',
				4 => 'Hoàn thành',
				5 => 'Phiếu khống',
				6 => 'Đang vận chuyển'
			);

			foreach ($tmp as $key => $value) {
				if($order['status'] ==$key){
					echo $value;
					break;	
				}
			}

		?>
		</p>
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
	
</body>
</html>