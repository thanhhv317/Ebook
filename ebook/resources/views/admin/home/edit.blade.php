<form action="{!! url('admin/home/edit/'.$id) !!}" method="post" enctype="multipart/form-data">
	<input type="hidden" class="_token" value="{!! csrf_token() !!}" name="_token">

	<div class="row">
	    <div class="col-md-4">
	      <h1>SỬA SLIDE</h1>
	    </div>
	    <div class="col-md-4">
	      	<div class="thumbnail">
	          	<img src="{!! asset('resources/uploads/slides/'.$data['image']) !!}" alt="Nature" style="width:100%">
	      </div>
	    </div>
	    <div class="col-md-4">
	    </div>
  	</div>
	<div class="form-group row">
		<label for="inputEmail3" class="col-sm-2 col-form-label">Tiêu đề</label>
		<div class="col-sm-10">
			<input type="text" class="form-control txtTitle"  placeholder="title" name="txtTitle" value="{!! $data['title'] !!}">
		</div>
	</div>
	<div class="form-group row">
		<label for="inputEmail3" class="col-sm-2 col-form-label">Mô tả</label>
		<div class="col-sm-10">
			<input type="text" class="form-control txtDescription"  placeholder="text content" name="txtDescription" value="{!! $data['description'] !!}">
		</div>
	</div>
	<div class="form-group row">
		<label for="inputEmail3" class="col-sm-2 col-form-label">Text Button</label>
		<div class="col-sm-10">
			<input type="text" class="form-control txtBtnText"  placeholder="Text Button" name="txtBtnText" value="{!! $data['textbtn'] !!}">
		</div>
	</div>
	<div class="form-group row">
		<label for="inputEmail3" class="col-sm-2 col-form-label">Link Button</label>
		<div class="col-sm-10">
			<input type="text" class="form-control txtBtnLink"  placeholder="Link Button" name="txtBtnLink" value="{!! $data['linkbtn'] !!}">
		</div>
	</div>
	<div class="form-group row">
		<label for="inputEmail3" class="col-sm-2 col-form-label">Hình ảnh</label>
		<div class="col-sm-10">
			<input type="file" class="form-control fImage" name="fImage">
			<input type="hidden" name="fImageOld" value="{!! $data['image'] !!}">
		</div>
	</div>
	<input type="submit" class="btn btn-primary addBanner" value="Lưu lại"/>
</form>
