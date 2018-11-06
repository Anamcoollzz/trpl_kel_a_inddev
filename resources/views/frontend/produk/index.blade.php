<!DOCTYPE html>
<html lang="en">
<head>
	<title>IndDev</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="OneTech shop project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/bootstrap4/bootstrap.min.css')}}">
	<link href="{{asset('frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/OwlCarousel2-2.2.1/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/slick-1.8.0/slick.css') }}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/main_styles.css') }}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/responsive.css') }}">
	@include('frontend.produk.override-dropdown-kategori')
</head>
<style>
.ubah_produk_button {
	position: relative;
	left: 0px;
	visibility: hidden;
	opacity: 0;
	width: 100%;
	height: 48px;
	background: #E40E82;
	border: none;
	outline: none;
	font-size: 18px;
	font-weight: 400;
	color: #FFFFFF;
	cursor: pointer;
	border-bottom-left-radius: 0;
	border-bottom-right-radius: 0;
	margin-top: 0;
}
.ubah_produk_button:hover {
	background-color: #FB2D9D;
}
</style>
<body>

	<div class="super_container">

		<!-- Header -->

		@include('frontend.header')

		<!-- Deals of the week -->

		<div class="deals_featured">
			<div class="container">
				<div class="row">
					@if(session('success_msg'))
					<div class="col-md-12">
						<div class="alert alert-success">
							<h4>Sukses</h4>
							{{session('success_msg')}}
						</div>
					</div>
					@endif
					<div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">
						@include('frontend.produk.unggulan')

						<!-- Featured -->
						<div class="featured">
							<!-- Product Panel -->
							<div class="product_panel panel active">
								<div class="featured_slider slider">
									@foreach($data as $d)
									<!-- Slider Item -->
									<div class="featured_slider_item">
										<div class="border_active"></div>
										<div class="product_item d-flex flex-column align-items-center justify-content-center text-center">
											<div class="product_image d-flex flex-column align-items-center justify-content-center">
												<img src="{{$d->logo}}" alt="{{$d->nama}}">
											</div>
											<div class="product_content">
												<div class="product_price">{{$d->harga_jual}}</div>
												<div class="product_name">
													<div>
														<a href="product.html">{{$d->nama}}</a>
														<br>
														<span class="badge badge-{{$d->warna_status}}">{{$d->status}}</span>
													</div>
												</div>
												<div class="product_extras">

													{{-- <div class="product_color">
														<input type="radio" checked name="product_color" style="background:#b19c83">
														<input type="radio" name="product_color" style="background:#000000">
														<input type="radio" name="product_color" style="background:#999999">
													</div> --}}
													<button class="product_cart_button" style="border-radius: 0;">Lihat</button>
													@if($d->status == 'pending')
													<button class="product_cart_button ubah_produk_button">Ubah</button>
													@endif
												</div>
											</div>
											{{-- <div class="product_fav"><i class="fas fa-heart"></i></div> --}}
											{{-- <ul class="product_marks">
												<li class="product_mark product_discount">-25%</li>
												<li class="product_mark product_new">new</li>
											</ul> --}}
										</div>
									</div>
									@endforeach
								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		@include('frontend.footer')

	</div>

	<script src="{{asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
	<script src="{{asset('frontend/styles/bootstrap4/popper.js')}}"></script>
	<script src="{{asset('frontend/styles/bootstrap4/bootstrap.min.js')}}"></script>
	<script src="{{asset('frontend/plugins/greensock/TweenMax.min.js')}}"></script>
	<script src="{{asset('frontend/plugins/greensock/TimelineMax.min.js')}}"></script>
	<script src="{{asset('frontend/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
	<script src="{{asset('frontend/plugins/greensock/animation.gsap.min.js')}}"></script>
	<script src="{{asset('frontend/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
	<script src="{{asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
	<script src="{{asset('frontend/plugins/slick-1.8.0/slick.js')}}"></script>
	<script src="{{asset('frontend/plugins/easing/easing.js')}}"></script>
	<script src="{{asset('frontend/js/custom.js')}}"></script>
</body>

</html>