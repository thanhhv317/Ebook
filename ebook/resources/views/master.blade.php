<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="UTF-8">
	@include('header')
</head>
<body class="animsition">

	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			

			<div class="wrap_header">
				<!-- Logo -->
				<a href="index.html" class="logo">
					<img src="{!! url('public/page/images/icons/logo.png') !!}" alt="IMG-LOGO">
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li>
								<a href="{!! url('home') !!}">Trang chủ</a>
							</li>
							<!-- mun active thi add  class="sale-noti" -->
							<li >
								<a href="{!! url('product') !!}">Sản phẩm</a>
							</li>

							<!-- <li>
								<a href="">Blog</a>
							</li> -->

							<li>
								<a href="{!! url('about') !!}">Thông tin</a>
							</li>

							<li>
								<a href="{!! url('contact') !!}">Liên hệ</a>
							</li>
							@if(Auth::user()  && Auth::user()->level==2)
							
							<li>
								<a href="{!! url('admin/book/list') !!}">Admin</a>
							</li>
							@endif
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
					@if(Auth::user())
					<div class="header-wrapicon1">
						<img src="{!! url('public/page/images/icons/icon-header-01.png') !!}" class="header-icon1 js-show-header-dropdown" alt="ICON">
					
						<div class="header-cart header-dropdown" style="width: 200px">
							<ul class="header-cart-wrapitem2">
								
							</ul>

							<div>
								<p>{!! Auth::user()->name !!}</p>
								<hr>
								<a href="{!! url('profile') !!}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Xem thông tin
								</a>
								<a href="{!! route('logout') !!}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
										Đăng xuất
								</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			                     @csrf
			                    </form>
							</div>
						</div>
					</div>
					@else
					<a href="{!! route('login') !!}">Đăng nhập</a>
					@endif

					<span class="linedivide1"></span>

					<div class="header-wrapicon2">
						<img src="{!! url('public/page/images/icons/icon-header-02.png') !!}" class="header-icon1 js-show-header-dropdown" alt="ICON" onclick="clickShowCartIcon()">
						<span class="header-icons-noti" >0</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								
							</ul>

							<div class="header-cart-total">
								Total: $75.00
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="{!! url('cart') !!}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Xem giỏ hàng
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="{{ url('checkout') }}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4 checkoutCart">
										Thanh toán
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="index.html" class="logo-mobile">
				<img src="{!! url('public/page/images/icons/logo.png') !!}" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					@if(Auth::user())
					<div class="header-wrapicon1">
						<img src="{!! url('public/page/images/icons/icon-header-01.png') !!}" class="header-icon1 js-show-header-dropdown" alt="ICON">
					
						<div class="header-cart header-dropdown" style="width: 200px">
							<ul class="header-cart-wrapitem2">
								
							</ul>

							<div>
								<p>{!! Auth::user()->name !!}</p>
								<hr>
								<a href="{!! url('profile') !!}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Xem thông tin
								</a>
								<a href="{!! route('logout') !!}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Đăng xuất
								</a>
							</div>
						</div>
					</div>

					@else
					<a href="{!! route('login') !!}" >Đăng nhập</a>
					@endif

					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
						<img src="{!! url('public/page/images/icons/icon-header-02.png') !!}" class="header-icon1 js-show-header-dropdown" alt="ICON" onclick="clickShowCartIcon()">
						<span class="header-icons-noti">0</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								
							</ul>

							<div class="header-cart-total">
								Total: $75.00
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="{!! url('cart') !!}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Xem giỏ hàng
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="{{ url('checkout') }}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4 checkoutCart">
										Thanh toán
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">
					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							Miễn phí vận chuyển cho đơn hàng trên 200k
						</span>
					</li>


					<li class="item-menu-mobile">
						<a href="{!! url('home') !!}">Trang chủ</a>
					</li>

					<li class="item-menu-mobile">
						<a href="{!! url('product') !!}">Sản phẩm</a>
					</li>

					<!-- <li class="item-menu-mobile">
						<a href="">Blog</a>
					</li> -->

					<li class="item-menu-mobile">
						<a href="{!! url('about') !!}">Thông tin</a>
					</li>

					<li class="item-menu-mobile">
						<a href="{!! url('contact') !!}">Liên hệ</a>
					</li>
					@if(Auth::user() && Auth::user()->level==2)
					<li class="item-menu-mobile">
						<a href="{!! url('admin/book/list') !!}">Admin</a>
					</li>
					@endif
				</ul>
			</nav>
		</div>
	</header>

	<!-- Main content -->
    @yield('content')
    <!-- Your Page Content Here -->

	<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Liên lạc
				</h4>

				<div>
					<p class="s-text7 w-size27">
						Nếu có câu hỏi nào vui lòng liên hệ số điện thoại (+84) 0332 072 362.
					</p>

					<div class="flex-m p-t-30">
						<a href="https://www.facebook.com/thanhfuzu18" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="https://www.youtube.com/channel/UCN4AhzL9_RFZjmC-mvLvqhQ?view_as=subscriber" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
					</div>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Categories
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Men
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Women
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Dresses
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Sunglasses
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Links
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Search
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							About Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Contact Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Help
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Track Order
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Shipping
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							FAQs
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Newsletter
				</h4>

				<form>
					<div class="effect1 w-size9">
						<input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
						<span class="effect1-line"></span>
					</div>

					<div class="w-size2 p-t-20">
						<!-- Button -->
						<button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
							Subscribe
						</button>
					</div>

				</form>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">
			<a href="#">
				<img class="h-size2" src="{!! url('public/page/images/icons/paypal.png') !!}" alt="IMG-PAYPAL">
			</a>

			<a href="#">
				<img class="h-size2" src="{!! url('public/page/images/icons/visa.png') !!}" alt="IMG-VISA">
			</a>

			<a href="#">
				<img class="h-size2" src="{!! url('public/page/images/icons/mastercard.png') !!}" alt="IMG-MASTERCARD">
			</a>

			<a href="#">
				<img class="h-size2" src="{!! url('public/page/images/icons/express.png') !!}" alt="IMG-EXPRESS">
			</a>

			<a href="#">
				<img class="h-size2" src="{!! url('public/page/images/icons/discover.png') !!}" alt="IMG-DISCOVER">
			</a>

			<div class="t-center s-text8 p-t-20">
				Copyright © 2018 All rights reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
			</div>
		</div>
	</footer>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>



	@include('footer')

</body>
</html>
