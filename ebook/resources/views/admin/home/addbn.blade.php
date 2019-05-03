<form action="{!! url('admin/home/addbn') !!}" method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-4"></div>
		<h1 class="col-md-8">THÊM MỚI BANNER</h1>
	</div>
	<input type="hidden" class="_token" value="{!! csrf_token() !!}" name="_token">
	<div class="form-group row">
		<label for="inputEmail3" class="col-sm-2 col-form-label">Hình ảnh :</label>
		<div class="col-sm-10">
			<input type="file" class="form-control fImage" required="" name="fImage">
		</div>
	</div>
	<div class="form-group row">
		<label for="inputEmail3" class="col-sm-2 col-form-label">Nội dung :</label>
		<div class="col-sm-10">
			<input type="text" class="form-control txtBtnText" required=""  placeholder="Text Button" name="txtBtnText">
		</div>
	</div>
	<div class="form-group row">
		<label for="inputEmail3" class="col-sm-2 col-form-label">Link :	</label>
		<div class="col-sm-10">
			<input type="text" class="form-control txtBtnLink" required="" placeholder="Link Button" name="txtBtnLink">
		</div>
	</div>
	
	<input type="submit" class="btn btn-success addBanner" value="Thêm mới"/>
</form>
