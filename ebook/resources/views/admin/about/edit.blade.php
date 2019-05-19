<form action="{!! url('admin/about/edit') !!}" method="post" enctype="multipart/form-data">
	<input type="hidden" class="_token" value="{!! csrf_token() !!}" name="_token">

	<div class="row">
	    <div class="col-md-12">
	      <h1>SỬA THÔNG TIN CHI TIẾT</h1>
	    </div>
  	</div>
  	<div class="form-group row">
		<label for="inputEmail3" class="col-sm-2 col-form-label">banner</label>
		<div class="col-sm-10">
			<input type="file" class="form-control fImage1" name="fImage1">
			<input type="hidden" name="fImageOld1" value="{!! $result['banner'] !!}">
		</div>
	</div>
	
	<div class="form-group row">
		<label for="inputEmail3" class="col-sm-2 col-form-label">Hình ảnh</label>
		<div class="col-sm-10">
			<input type="file" class="form-control fImage2" name="fImage2">
			<input type="hidden" name="fImageOld2" value="{!! $result['image'] !!}">
		</div>
	</div>
	</div>
	<div class="form-group row">
		<label for="inputEmail3" class="col-sm-2 col-form-label">Đề mục</label>
		<div class="col-sm-10">
			<input type="text" class="form-control txtDescription"  placeholder="text content" name="txtStory" value="{!! $result['story'] !!}">
		</div>
	</div>
	<div class="form-group row">
		<label for="inputEmail3" class="col-sm-2 col-form-label">Mô tả</label>
		<div class="col-sm-10">
			<textarea name="txtDescription" class="form-control txtBtnText" id="" cols="30" rows="10">{!! $result['description'] !!}</textarea>
		</div>
	</div>
	<div class="form-group row">
		<label for="inputEmail3" class="col-sm-2 col-form-label">Slogant</label>
		<div class="col-sm-10">
			<input type="text" class="form-control txtBtnLink"  placeholder="Link Button" name="txtSlogant" value="{!! $result['slogant'] !!}">
		</div>
	</div>
	<div class="form-group row">
		<label for="inputEmail3" class="col-sm-2 col-form-label">Người tham khảo</label>
		<div class="col-sm-10">
			<input type="text" class="form-control txtBtnLink"  placeholder="Link Button" name="txtAuthor" value="{!! $result['author'] !!}">
		</div>
	</div>
	
	<input type="submit" class="btn btn-primary" value="Lưu lại"/>
</form>
