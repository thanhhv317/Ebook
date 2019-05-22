@extends('master')
@section('content')
	<!-- breadcrumb -->
	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="{!! url('product') !!}" class="s-text16">
			Sản phẩm
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<span class="s-text17">
			{!! $book['name'] !!}
		</span>
	</div>

	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>

					<div class="slick3">
						<div class="item-slick3" data-thumb="{!! asset('resources/uploads/books/'.$book['image']) !!}">
							<div class="wrap-pic-w">
								<img src="{!! asset('resources/uploads/books/'.$book['image']) !!}" alt="IMG-PRODUCT">
							</div>
						</div>
						@foreach($detail as $item)
						<div class="item-slick3" data-thumb="{!! asset('resources/uploads/books/detail/'.$item->image) !!}">
							<div class="wrap-pic-w">
								<img src="{!! asset('resources/uploads/books/detail/'.$item->image) !!}" alt="IMG-PRODUCT">
							</div>
						</div>
						@endforeach
						
					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">
					{!! $book['name'] !!} 
				</h4>

				<span class="m-text17">
					{!! number_format($book['price'],0,',','.') !!} VND
				</span>

				<p class="s-text8 p-t-10">
					Tác giả: {!! $info[0]->author !!}
				</p>

				<!--  -->
				<div class="p-t-33 p-b-60">
					

					<div class="flex-r-m flex-w p-t-10">
						<div class="w-size16 flex-m flex-w">
							<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
								<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
								</button>

								<input class="size8 m-text18 t-center num-product" type="number" name="num-product" value="1">

								<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
								</button>
							</div>

							<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
								<!-- Button -->
								<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
									Add to Cart
								</button>
							</div>
						</div>
					</div>
				</div>

				<div class="p-b-45">
					<span class="s-text8 m-r-35">Thể loại: {!! $info[0]->kind !!}</span>
					<span class="s-text8">Nhà xuất bản: {!! $info[0]->publisher !!}</span>
				</div>

				<!--  -->
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Mô tả:
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
					</h5>

					<div class="p-t-15 p-b-23">
						<p class="s-text8">
							{!! $book['description'] !!}
						</p>
					</div>
				</div>

				<!-- <div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Additional information
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
						</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Reviews (0)
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
						</p>
					</div>
				</div> -->
			</div>
		</div>
	</div>
	<div class="container bgwhite p-t-35 p-b-80">
		<!-- <div class="w-size14 p-t-30 respon5"> -->
			<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
				<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
					Bình luận
					
				</h5>

				<div class="p-t-15 p-b-23">
				<div class="row">
					<div class="col-md-6">
						<form action="" method="post">
							@csrf
							<textarea name="feedback" id="feedback" cols="30" class="form-control" rows="10"></textarea>
							<input type="button" class="btn btn-success"  onclick=" {!! (auth::user()) ? ('addFeedback(' .$book['id']. ')') : 'errorLogin()' !!}" value="Gửi bình luận"/>
						</form>
					</div>
					<div class="col-md-6">
						Các bình luận liên quan: <hr>
						@foreach($feedback as $item)
						<div class="row">
							<div class="col-md-3" style="text-align: center;">
								<img src="{!! asset('resources/uploads/users/'.$item['image']) !!}" alt="Responsive image" class="img-thumbnail rounded-circle" style="max-width: 50%;" >
								
							</div>
							<div class="col-md-9">
								<b>{!! $item['name'] !!}</b> - <small>{!! 
                          \Carbon\Carbon::createFromTimeStamp(strtotime($item['created_at']))->diffForHumans();
                        !!}</small>
								<p>{!! $item['content'] !!}</p>
							</div>
						</div>
						<hr>
						@endforeach
					</div>
				</div>
				</div>
			</div>
		<!-- </div> -->
	</div>


	<!-- Relate Product -->
	<section class="relateproduct bgwhite p-t-45 p-b-138">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Sản phẩm gợi ý
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">

				@foreach($book_recomment as $item)

					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative">
								<img src="{!! url('resources/uploads/books/'.$item['image']) !!}" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button -->
										<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" onclick="addCart({!! $item['id'] !!},'{!! $item['name'] !!}',{!! $item['price'] !!},'{!! $item['image'] !!}')">
											Thêm vào giỏ
										</button>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20" style="text-align: center;">
								<a href="{!! url('product-detail/'.$item['id']) !!}" class="block2-name dis-block s-text3 p-b-5">
									{!! $item['name'] !!}
								</a>

								<span class="block2-price m-text6 p-r-5">
									{!! number_format($item['price'],0,',','.').' VND' !!}
								</span>
							</div>
						</div>
					</div>
				@endforeach
				</div>
			</div>

		</div>
	</section>


<!--===============================================================================================-->
	<script type="text/javascript" src="{!! url('public/page/vendor/jquery/jquery-3.2.1.min.js') !!}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{!! url('public/page/vendor/animsition/js/animsition.min.js') !!}"></script>
<!--===============================================================================================-->
	
<!--===============================================================================================-->
	<script type="text/javascript" src="{!! url('public/page/vendor/select2/select2.min.js') !!}"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
<!--===============================================================================================-->

<!--===============================================================================================-->
	<script type="text/javascript" src="{!! url('public/page/vendor/sweetalert/sweetalert.min.js') !!}"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});

		$('.btn-addcart-product-detail').each(function(){
			var nameProduct = $('.product-detail-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>
	<script>
		function addFeedback(idbook){
			var content = $('#feedback').val();
			$.ajax({
		        url: "{!! url('admin/feedback/edit') !!}"+'/'+idbook,
		        data:{
		        	content:content,
		        	user_id: {!! (auth::user())? auth::user()->id:'0' !!}
		        },
		        success: function(data) { 
		          	location.reload();
		        }
		    });
		}

		function errorLogin(){
			swal('Vui lòng đăng nhập trước')
		}
	</script>

<!--===============================================================================================-->
	<script src="{!! url('public/page/js/main.js') !!}"></script>

@endsection()