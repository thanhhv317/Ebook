<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Detail Feedback</title>
</head>
<body>
	<p>Người đóng góp: <b>{{ $data->user}}</b></p>
	<p>Thời gian: {{ $data->created_at }}</p>
	<p>sách nhận được đóng góp: {{ $data->book }}</p>
	<p>Nội dung: {{ $data->content }}</p>
</body>
</html>