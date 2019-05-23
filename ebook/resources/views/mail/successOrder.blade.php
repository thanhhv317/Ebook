<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Send email</title>
</head>
<body>
	<p>Xin chào bạn, {{ $e_name }}</p>
	<p>Chúng tôi nhận được đơn đặt hàng của bạn với gmail là {{ $e_email }}.</p>
	<p>Mã đặt hàng của bạn là {{ $e_orderId }}, bạn có thể theo dõi đơn hàng của bạn tại {{ url('checkOrder') }}</p>
	
</body>
</html>