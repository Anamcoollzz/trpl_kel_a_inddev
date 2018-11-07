<!DOCTYPE html>
<html lang="en">
<head>
	@include('title')
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="OneTech shop project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/bootstrap4/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/OwlCarousel2-2.2.1/animate.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/product_styles.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/product_responsive.css')}}">

</head>

<body>

	<div class="super_container">

		@include('frontend.header')

		<!-- Single Product -->

		<div class="single_product">
			<div class="container">
				<div class="row">

					<!-- Images -->
					<div class="col-lg-2 order-lg-1 order-2">
						<ul class="image_list">
							@foreach ($d->screenshots as $s)
							<li data-image="{{$s->url}}"><img src="{{$s->url}}" alt="{{$d->nama}}"></li>
							@endforeach
						</ul>
					</div>

					<!-- Selected Image -->
					<div class="col-lg-5 order-lg-2 order-1">
						<div class="image_selected"><img src="{{$d->logo}}" alt="{{$d->nama}}"></div>
					</div>

					<!-- Description -->
					<div class="col-lg-5 order-3">
						<div class="product_description">
							<div class="product_category">{{$d->kategori->nama}}</div>
							<div class="product_name">{{$d->nama}}</div>
							{{-- <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div> --}}
							<div class="product_text"><p>{!!$d->deskripsi!!}</p></div>
							<div class="order_info d-flex flex-row">
								<form action="#">

									<div class="product_price">{{$d->harga_jual}}</div>
									<div class="button_container">
										<button type="button" class="button cart_button">Beli</button>
										<button onclick="window.location='{{$d->link_demo}}'" type="button" style="background-color: #CD3333" class="button cart_button">Demo</button>
										<div class="product_fav"><i class="fas fa-heart"></i></div>
									</div>

								</form>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

		@include('frontend.produk.sering-dilihat')

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
	<script src="{{asset('frontend/plugins/easing/easing.js')}}"></script>
	<script src="{{asset('frontend/js/product_custom.js')}}"></script>
	@include('frontend.script')
</body>

</html>