<form action="{!! url('admin/home/editAll') !!}" method="post" enctype="multipart/form-data">

	<input type="hidden" class="_token" value="{!! csrf_token() !!}" name="_token">
	<?php $i=1; ?>
	@foreach($result as $key=>$value)
	<h2 >slide số {!! $i !!}</h2>
	<?php $i++; ?>
	<div class="row">
	    <label for="inputEmail3" class="col-sm-2 col-form-label">Hình ảnh</label>
	    <div class="col-md-4">
	      	<div class="thumbnail">
	          	<img src="{!! asset('resources/uploads/slides/'.$result[$key]['image']) !!}" alt="Nature" style="width:100%">
	      </div>
	    </div>
	    <div class="col-md-4">
	    </div>
  	</div>
  	<input type="hidden" value="{!! $result[$key]['id'] !!}" name="txtID[]">
	<div class="form-group row">
		<label for="inputEmail3" class="col-sm-2 col-form-label">Tiêu đề</label>
		<div class="col-sm-10">
			<input type="text" class="form-control txtTitle"  placeholder="title" name="txtTitle[]" value="{!! $result[$key]['title'] !!}">
		</div>
	</div>
	<div class="form-group row">
		<label for="inputEmail3" class="col-sm-2 col-form-label">Mô tả</label>
		<div class="col-sm-10">
			<input type="text" class="form-control txtDescription"  placeholder="text content" name="txtDescription[]" value="{!! $result[$key]['description'] !!}">
		</div>
	</div>
	<div class="form-group row">
		<label for="inputEmail3" class="col-sm-2 col-form-label">Text Button</label>
		<div class="col-sm-10">
			<input type="text" class="form-control txtBtnText"  placeholder="Text Button" name="txtBtnText[]" value="{!! $result[$key]['textbtn'] !!}">
		</div>
	</div>
	<div class="form-group row">
		<label for="inputEmail3" class="col-sm-2 col-form-label">Link Button</label>
		<div class="col-sm-10">
			<input type="text" class="form-control txtBtnLink"  placeholder="Link Button" name="txtBtnLink[]" value="{!! $result[$key]['linkbtn'] !!}">
		</div>
	</div>	
	<input type="hidden"  name="fImageOld[]" value="{!! $result[$key]['image'] !!}">
	<hr>
	@endforeach
	@if ($result != null)
		<input type="submit" class="btn btn-primary addslide" value="Lưu lại"/>
	@endif
</form>
