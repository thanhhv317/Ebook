<div class="row">
<div class="col-md-12">
	<div class="col-md-4">
		<img class="img-responsive img-thumbnail" src="{!! asset('resources/uploads/books/'.$data->image) !!}" style="width:300px;height: 200px;">
		<hr>
		Hình ảnh phụ: 
		<br>
		@foreach ($imageBook as $item)
			<img class="img-responsive img-thumbnail" src="{!! asset('resources/uploads/books/detail/'.$item->image) !!}" style="width:125px;height: 90px;">
		@endforeach
	</div>
	<div class="col-md-8">
		<div class="col-md-6">	
		<label for="">Tên sách : </label>
		<label style="color: red">{!! $data->name !!}.</label>
		<br>
		<label for="">Tác giả : </label>
		<label >{!! $data->author !!}.</label>
		<br>
		<label for="">Thể loại : </label>
		<label >{!! $data->kind !!}.</label>
		<br>
		<label for="">Nhà xuất bản : </label>
		<label >{!! $data->publisher !!}.</label>
		<br>
		<label for="">Số lượng : </label>
		<label >{!! $data->quantity !!} Quyển sách.</label>
		<br>
		<label for="">Giá tiền : </label>
		<label >{!! $data->price !!} VND.</label>
		<br>
		<label for="">Thời gian : </label>
		<label >
			{!! 
				\Carbon\Carbon::createFromTimeStamp(strtotime($data->created_at))->diffForHumans();
			!!}
		</label>
		</div>
		<div class="col-md-6">
			<?php $url = url('product/'.$data->id); ?>
			{!! QrCode::size(200)->generate($url); !!}
		</div>	
		<br>
		<hr>
		<label>Mô tả :</label>
		{!! $data->description !!}
	</div>
</div>
</div>