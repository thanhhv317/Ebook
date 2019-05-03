<form action="{!! url('admin/home/editbn/'.$id) !!}" method="post" enctype="multipart/form-data">
	<input type="hidden" class="_token" value="{!! csrf_token() !!}" name="_token">

	<div class="row">
	    <div class="col-md-4">
	      	<div class="thumbnail">
	          	<img src="{!! asset('resources/uploads/banners/'.$data['image']) !!}" alt="Nature" style="width:50%">
	      	</div>
	  	</div>
  		<div class="col-md-8">
  			<div class="form-group">
	  			<label for="inputEmail3" class="col-sm-2 col-form-label">Nội dung :</label>
				<div class="col-sm-10">
					<input type="text" class="form-control txtBtnText"  placeholder="nội dung" name="txtBtnText" value="{!! $data['textbtn'] !!}">
				</div>
			</div>
			<br>
			<br>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 col-form-label">Link :</label>
				<div class="col-sm-10">
					<input type="text" class="form-control txtBtnLink"  placeholder="link" name="txtBtnLink" value="{!! $data['linkbtn'] !!}">
				</div>
	  		</div>
	  		<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 col-form-label">Hình ảnh</label>
				<div class="col-sm-10">
					<input type="file" class="form-control fImage" name="fImage">
					<input type="hidden" name="fImageOld" value="{!! $data['image'] !!}">
				</div>
			</div>
	  		<hr>
	  		<hr>
	<input type="submit" class="btn btn-primary" value="Lưu lại"/>
  	</div>
	</div>
</form>
