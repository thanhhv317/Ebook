@extends('master')
@section('content')

	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({!! url('resources/uploads/pages/'.$page->image) !!});">
		<h2 class="l-text2 t-center">
			{!! $page->text !!}
		</h2>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-60">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-lg-3 p-b-75">
					<div class="rightbar">
						<!-- Search -->
						<div class="pos-relative bo11 of-hidden">
							<input class="s-text7 size16 p-l-23 p-r-50 searchOrder" type="text" name="searchOrder" placeholder="Search">

							<button class="flex-c-m size5 ab-r-m color1 color0-hov trans-0-4" onclick="seachOrder();">
								<i class="fs-13 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>

						<!-- Tags -->
						<h4 class="m-text23 p-t-50 p-b-25">
							Tags
						</h4>

						<div class="wrap-tags flex-w">
							@foreach($kind as $item)
							<a href="{{ url('product/'.$item->id) }}" class="tag-item">
								{!! $item->name !!}
							</a>
							@endforeach
						</div>
					</div>
				</div>
				<div class="col-md-8 col-lg-9 p-b-75">
					<div class="p-r-50 p-r-0-lg">
						<!-- item blog -->
						<div class="item-blog p-b-80 order-detail">
							bạn phải nhập mã đơn hàng
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script>
		function seachOrder(){
			var idOrder = $('.searchOrder').val();
			$.ajax({
				url: "{{ url('check') }}"+'/'+idOrder,
				success: function(data) { 
		          	$('.order-detail').html(data);
		        }
			});
		}
	</script>

@endsection()