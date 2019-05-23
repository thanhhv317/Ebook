
<div class="row">
	<div class="col-md 12">
		<h1 style="text-align: center;">Thông tin đơn hàng {{ $order['id'] }}</h1>
		<hr>
	</div>

	<div class="col-md-12">
		<table class="table table-striped">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Tên sách</th>
		      <th scope="col">Số lượng</th>
		      <th scope="col">Tổng tiền</th>
		    </tr>
		  </thead>
		  <tbody>
		    @for($i=0;$i< count($dataOrder);++$i)
		    <tr>
		      <th scope="row">{!! $i+1 !!}</th>
		      <td>{!! $dataBook[$i]['name'] !!}</td>
		      <td>{!! $dataOrder[$i]['quantity'] !!} Cuốn</td>
		      <td>{!! $dataBook[$i]['price'] !!} vnd</td>
		    </tr>
		    @endfor
		    
		  </tbody>
		</table>
	</div>
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<table class="table table-hover">
		  <thead>
		    <tr>
		      	<td scope="col">Tên khách hàng: {{ $order['name'] }}</td>
		      	<td scope="col">Số điện thoại: {{ $order['phone']}}</td>
			</tr>
		  </thead>
		  <tbody>
			<tr>
				<td scope="row">Email: {{ $order['email']}}</td>
			
				<td scope="row">Địa chỉ: {{ $order['address']}}</td>
			</tr>
			<tr>
				<td scope="row">Ngày lập: {{ $order['created_at']}}</td>
				<td scope="row">Ghi chú: {{ $order['content'] }}</td>

			</tr>
		
		</table>
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
		<h2>Tổng tiền: {{ $order['totalPrice']}} VND</h2>
	</div>
	<div class="col-md-1"></div>
</div>
