<div class="row">
<div class="col-md-12">
	<div class="col-md-4">
		<img class="img-responsive img-thumbnail" src="{!! asset('resources/uploads/authors/'.$data->image) !!}" style="width:300px;height: 200px;">
		<hr>
	</div>
	<div class="col-md-8">
		<label for="">Tên tác giả : </label>
		<label style="color: red">{!! $data->name !!}.</label>
		<br>
		<label for="">Ngày sinh: </label>
		<label >
			{!! 
				\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->birthday)->format('Y-m-d')
			!!}.
		</label>
		<br>
		<label for="">Thông tin : </label>
		<label >{!! $data->info !!}.</label>
		<br>
	</div>
</div>
</div>