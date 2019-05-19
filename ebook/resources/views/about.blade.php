@extends('master')
@section('content')

	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({!! asset('resources/uploads/abouts/'.$about['banner']) !!});">
		<h2 class="l-text2 t-center">
			About
		</h2>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-38">
		<div class="container">
			<div class="row">
				<div class="col-md-4 p-b-30">
					<div class="hov-img-zoom">
						<img src="{!! asset('resources/uploads/abouts/'.$about['image']) !!}" alt="IMG-ABOUT">
					</div>
				</div>

				<div class="col-md-8 p-b-30">
					<h3 class="m-text26 p-t-15 p-b-16">
						{!! $about['story'] !!}
					</h3>

					<p class="p-b-28">
						{!! $about['description'] !!}
					</p>

					<div class="bo13 p-l-29 m-l-9 p-b-10">
						<p class="p-b-11">
							{!! $about['slogant'] !!}
						</p>

						<span class="s-text7">
							- {!! $about['author'] !!}
						</span>
					</div>
				</div>
			</div>
		</div>
	</section>


<!--===============================================================================================-->
	<script type="text/javascript" src="{!! url('public/page/vendor/jquery/jquery-3.2.1.min.js') !!}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{!! url('public/page/vendor/animsition/js/animsition.min.js') !!}"></script>

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

@endsection()