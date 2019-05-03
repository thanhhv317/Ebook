<form action="{!! url('admin/home/add') !!}" method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-4"></div>
		<h1 class="col-md-4">THÊM MỚI SLIDE</h1>
	</div>
	<input type="hidden" class="_token" value="{!! csrf_token() !!}" name="_token">
	<div class="form-group row">
		<label for="inputEmail3" class="col-sm-2 col-form-label">Tiêu đề</label>
		<div class="col-sm-10">
			<input type="text" class="form-control txtTitle" required=""  placeholder="title" name="txtTitle">
		</div>
	</div>
	<div class="form-group row">
		<label for="inputEmail3" class="col-sm-2 col-form-label">Mô tả</label>
		<div class="col-sm-10">
			<input type="text" class="form-control txtDescription" required="" placeholder="text content" name="txtDescription">
		</div>
	</div>
	<div class="form-group row">
		<label for="inputEmail3" class="col-sm-2 col-form-label">Text Button</label>
		<div class="col-sm-10">
			<input type="text" class="form-control txtBtnText" required="" placeholder="Text Button" name="txtBtnText">
		</div>
	</div>
	<div class="form-group row">
		<label for="inputEmail3" class="col-sm-2 col-form-label">Link Button</label>
		<div class="col-sm-10">
			<input type="text" class="form-control txtBtnLink" required=""  placeholder="Link Button" name="txtBtnLink">
		</div>
	</div>
	<div class="form-group row">
		<label for="inputEmail3" class="col-sm-2 col-form-label">Hình ảnh</label>
		<div class="col-sm-10">
			<input type="file" class="form-control fImage" required="" name="fImage">
		</div>
	</div>
	<input type="submit" class="btn btn-success" value="Thêm mới"/>
</form>
