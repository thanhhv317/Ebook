@extends('master')
@section('content')

	<!-- Slide1 -->
	<section class="slide1">
		<div class="wrap-slick1">
			<div class="slick1">
				<?php $i=1; ?>
				@foreach($result as $key => $value)
				<div class="item-slick1 item1-slick1" style="background-image: url({!! asset('resources/uploads/slides/'.$result[$key]['image']) !!});">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="
						@if($i %3==1)
							fadeInDown
						@elseif($i %3==2)
							rollIn
						@else
							rotateInDownLeft
						@endif
						">
							{!! $result[$key]['title'] !!}
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="
						@if($i %3==1)
							fadeInUp
						@elseif($i %3==2)
							lightSpeedIn
						@else
							rotateInUpRight
						@endif">
							{!! $result[$key]['description'] !!}
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="
						@if($i %3==1)
							zoomIn
						@elseif($i %3==2)
							slideInUp
						@else
							rotateIn
						@endif">
							<!-- Button -->
							<a href="{!! $result[$key]['linkbtn'] !!}" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								{!! $result[$key]['textbtn'] !!}
							</a>
						</div>
					</div>
				</div>
				<?php $i++; ?>
				@endforeach
			</div>
		</div>
	</section>

	<!-- Banner -->
	<section class="banner bgwhite p-t-40 p-b-40">
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="{!! asset('resources/uploads/banners/'.$banners[0]['image']) !!}" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="{!! $banners[0]['linkbtn'] !!}" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								{!! $banners[0]['textbtn'] !!}
							</a>
						</div>
					</div>

					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="{!! asset('resources/uploads/banners/'.$banners[1]['image']) !!}" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="{!! $banners[1]['linkbtn'] !!}" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								{!! $banners[1]['textbtn'] !!}
							</a>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="{!! asset('resources/uploads/banners/'.$banners[2]['image']) !!}" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="{!! $banners[2]['linkbtn'] !!}" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								{!! $banners[2]['textbtn'] !!}
							</a>
						</div>
					</div>

					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="{!! asset('resources/uploads/banners/'.$banners[3]['image']) !!}" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="{!! $banners[3]['linkbtn'] !!}" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								{!! $banners[3]['textbtn'] !!}
							</a>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="{!! asset('resources/uploads/banners/'.$banners[4]['image']) !!}" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="{!! $banners[4]['linkbtn'] !!}" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								{!! $banners[4]['textbtn'] !!}
							</a>
						</div>
					</div>

					<!-- block2 -->
					<div class="block2 wrap-pic-w pos-relative m-b-30">
						<img src="{!! asset('resources/uploads/banners/'.$banners[5]['image']) !!}" alt="IMG">

						<div class="block2-content sizefull ab-t-l flex-col-c-m">
							<h4 class="m-text4 t-center w-size3 p-b-8">
								{!! $banners[5]['textbtn'] !!}
							</h4>

							<div class="w-size2 p-t-25">
								<!-- Button -->
								<a href="{!! $banners[5]['linkbtn'] !!}" class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
									Đăng nhập!
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- New Product -->
	<section class="newproduct bgwhite p-t-45 p-b-105">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Sản phẩm nổi bật
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
					@foreach($book as $item)
					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-label">
							<!-- <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew"> -->
								<img src="{!! asset('resources/uploads/books/'.$item['image']) !!}" alt="IMG-PRODUCT">

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

								<span class="block2-price m-text6 p-r-5" >
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

	<!-- Banner2 -->
	<section class="banner2 bg5 p-t-55 p-b-55">
		<div class="container">
			<div class="sec-title p-b-52">
				<h3 class="m-text5 t-center">
					Tác giả tiêu biểu
				</h3>
			</div>
			<div class="row">
				@foreach($author as $item)
				<div class="col-sm-10 col-md-8 col-lg-6 m-l-r-auto p-t-15 p-b-15">
					<div class="hov-img-zoom pos-relative">
						<img src="{!! url('resources/uploads/authors/'.$item['image']) !!}" alt="IMG-BANNER">

						<div class="ab-t-l sizefull flex-col-c-m p-l-15 p-r-15">
							<span class="m-text9 p-t-45 fs-20-sm">
								Tác giả
							</span>

							<h3 class="l-text1 fs-35-sm" style="text-align: center;">
								{{ $item['name'] }}
							</h3>

							
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>


	<!-- Blog -->
	<!-- <section class="blog bgwhite p-t-94 p-b-65">
		<div class="container">
			<div class="sec-title p-b-52">
				<h3 class="m-text5 t-center">
					Our Blog
				</h3>
			</div>

			<div class="row">
				<div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
					<div class="block3">
						<a href="blog-detail.html" class="block3-img dis-block hov-img-zoom">
							<img src="{!! url('public/page/images/blog-01.jpg') !!}" alt="IMG-BLOG">
						</a>

						<div class="block3-txt p-t-14">
							<h4 class="p-b-7">
								<a href="blog-detail.html" class="m-text11">
									Black Friday Guide: Best Sales & Discount Codes
								</a>
							</h4>

							<span class="s-text6">By</span> <span class="s-text7">Nancy Ward</span>
							<span class="s-text6">on</span> <span class="s-text7">July 22, 2017</span>

							<p class="s-text8 p-t-16">
								Duis ut velit gravida nibh bibendum commodo. Sus-pendisse pellentesque mattis augue id euismod. Inter-dum et malesuada fames
							</p>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
					<div class="block3">
						<a href="blog-detail.html" class="block3-img dis-block hov-img-zoom">
							<img src="{!! url('public/page/images/blog-02.jpg') !!}" alt="IMG-BLOG">
						</a>

						<div class="block3-txt p-t-14">
							<h4 class="p-b-7">
								<a href="blog-detail.html" class="m-text11">
									The White Sneakers Nearly Every Fashion Girls Own
								</a>
							</h4>

							<span class="s-text6">By</span> <span class="s-text7">Nancy Ward</span>
							<span class="s-text6">on</span> <span class="s-text7">July 18, 2017</span>

							<p class="s-text8 p-t-16">
								Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla in tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit ame
							</p>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
					<div class="block3">
						<a href="blog-detail.html" class="block3-img dis-block hov-img-zoom">
							<img src="{!! url('public/page/images/blog-03.jpg') !!}" alt="IMG-BLOG">
						</a>

						<div class="block3-txt p-t-14">
							<h4 class="p-b-7">
								<a href="blog-detail.html" class="m-text11">
									New York SS 2018 Street Style: Annina Mislin
								</a>
							</h4>

							<span class="s-text6">By</span> <span class="s-text7">Nancy Ward</span>
							<span class="s-text6">on</span> <span class="s-text7">July 2, 2017</span>

							<p class="s-text8 p-t-16">
								Proin nec vehicula lorem, a efficitur ex. Nam vehicula nulla vel erat tincidunt, sed hendrerit ligula porttitor. Fusce sit amet maximus nunc
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> -->

	

	<!-- Shipping -->
	<section class="shipping bgwhite p-t-62 p-b-46">
		<div class="flex-w p-l-15 p-r-15">
			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h4 class="m-text12 t-center">
					Giao hàng miễn phí
				</h4>

				<a href="#" class="s-text11 t-center">
					Giao hàng miễn phí trên toàn bộ khu vực tp HCM
				</a>
			</div>

			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
				<h4 class="m-text12 t-center">
					30 Ngày đổi trả
				</h4>

				<span class="s-text11 t-center">
					Đổi trả miễn phí trong vòng 30 ngày
				</span>
			</div>

			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h4 class="m-text12 t-center">
					Giờ mở cửa tiện lợi
				</h4>

				<span class="s-text11 t-center">
					Shop hoạt động từ thứ 2 đến chủ nhật
				</span>
			</div>
		</div>
	</section>


@endsection()