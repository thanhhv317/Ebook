@extends('master')
@section('content')

	<!-- Title Page -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url({!! url('public/page/images/heading-pages-02.jpg') !!});">
		<h2 class="l-text2 t-center">
			Women
		</h2>
		<p class="m-text13 t-center">
			New Arrivals Women Collection 2018
		</p>
	</section>


	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							Thể loại
						</h4>

						<ul class="p-b-54">
							<!-- <li class="p-t-4">
								<a href="#" class="s-text13 active1">
									All
								</a>
							</li> -->
							@foreach($kind as $item)
							<li class="p-t-4">
								<a href="#" class="s-text13">
									{!! $item->name !!}
								</a>
							</li>
							@endforeach							
						</ul>

						<!--  -->
						<h4 class="m-text14 p-b-32">
							Filters
						</h4>

						<div class="filter-price p-t-22 p-b-50 bo3">
							<div class="m-text15 p-b-17">
								Price
							</div>

							<div class="wra-filter-bar">
								<div id="filter-bar"></div>
							</div>

							<div class="flex-sb-m flex-w p-t-16">
								<div class="w-size11">
									<!-- Button -->
									<button class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4">
										Filter
									</button>
								</div>

								<div class="s-text3 p-t-10 p-b-10">
									Range: <span id="value-lower">610</span>K - <span id="value-upper">980</span>K
								</div>
							</div>
						</div>

						<div class="search-product pos-relative bo4 of-hidden">
							<input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search Products...">

							<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
								<i class="fs-12 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<!--  -->
					<div class="flex-sb-m flex-w p-b-35">
						

						<span class="s-text8 p-t-5 p-b-5">
							Tổng {!! $book->total() !!} kết quả được tìm thấy
						</span>
					</div>

					<!-- Product -->
					<div class="row">
						@foreach($book as $item)
						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative block2-label">
									<img src="{!! asset('resources/uploads/books/'.$item->image) !!}" alt="IMG-PRODUCT">

									<div class="block2-overlay trans-0-4">
										<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
										</a>

										<div class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button -->
											<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" onclick="addCart({!! $item->id !!},'{!! $item->name !!}',{!! $item->price !!},'{!! $item->image !!}')" >
												Thêm vào giỏ
											</button>
										</div>
									</div>
								</div>

								<div class="block2-txt p-t-20" style="text-align: center;">
									<a href="{!! url('product-detail/'.$item->id) !!}" class="block2-name dis-block s-text3 p-b-5">
										{!! $item->name !!}
									</a>

									<span class="block2-price m-text6 p-r-5">
										{!! number_format($item->price,0,',','.') !!} VND
									</span>
								</div>
							</div>
						</div>
						@endforeach
					</div>

					<!-- Pagination -->
					<div class="pagination flex-m flex-w p-t-26">
						@for($i=1;$i<=$book->lastPage();$i++)
						<a href="{!! $book->url($i) !!}" class="item-pagination flex-c-m trans-0-4 {!! ($book->currentPage() == $i)?'active-pagination':'' !!} ">{!! $i !!}</a>
						@endfor
						<!-- <a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">2</a> -->
					</div>
				</div>
			</div>
		</div>
	</section>

	<script type="text/javascript" src="{!! url('public/page/vendor/jquery/jquery-3.2.1.min.js') !!}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{!! url('public/page/vendor/animsition/js/animsition.min.js') !!}"></script>

<!--===============================================================================================-->
	<script type="text/javascript" src="{!! url('public/page/vendor/daterangepicker/moment.min.js') !!}"></script>
	<script type="text/javascript" src="{!! url('public/page/vendor/daterangepicker/daterangepicker.js') !!}"></script>

<!--===============================================================================================-->
	<script type="text/javascript" src="{!! url('public/page/vendor/noui/nouislider.min.js') !!}"></script>
	<script type="text/javascript">
		/*[ No ui ]
	    ===========================================================*/
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 50, 500 ],
	        connect: true,
	        range: {
	            'min': 50,
	            'max': 500
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]) ;
	    });

	    

	</script>

@endsection()