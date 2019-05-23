@extends('master')
@section('content')

	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({!! url('resources/uploads/pages/'. $page->image) !!});">
		<h2 class="l-text2 t-center">
			{!! $page->text !!}
		</h2>
	</section>
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="col-md-12">
			@if(Session::has('flash_message'))
                <div style="text-align: center;" class="alert alert-{!! Session::get('flash_level') !!}">
                    {!! Session::get('flash_message') !!}
                </div>
            @endif
		</div>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 p-b-30">
					<div class="p-r-20 p-r-0-lg">
						<div class="col-md-12">
							<iframe class="embed-responsive" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.7153934169364!2d106.66567001431694!3d10.756403862505435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752efb1b8338b5%3A0x32b5b554b23b845b!2zMjQwIEFuIETGsMahbmcgVsawxqFuZywgUGjGsOG7nW5nIDksIFF14bqtbiA1LCBI4buTIENow60gTWluaCwgVmlldG5hbQ!5e0!3m2!1sen!2s!4v1558544042160!5m2!1sen!2s" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
					</div>
				</div>

				<div class="col-md-6 p-b-30">
					<form class="leave-comment" action="{!! url('contact') !!}" method="post">
						@csrf
						<h4 class="m-text26 p-b-36 p-t-15">
							Gửi tin nhắn cho chúng tôi
						</h4>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Full Name">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="phone" placeholder="Phone Number">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="email" placeholder="Email Address">
						</div>

						<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="message" placeholder="Message"></textarea>

						<div class="w-size25">
							<!-- Button -->
							<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
								Send
							</button>
						</div>
					</form>
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
		$("div.alert").delay(7000).slideUp();
	</script>
<!--===============================================================================================-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="{!! url('public/page/js/map-custom.js') !!}"></script>
<!--===============================================================================================-->
	<script src="{!! url('public/page/js/main.js') !!}"></script>
@endsection()