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
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/jquery-ui-1.12.1.custom/jquery-ui.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/shop_styles.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/shop_responsive.css')}}">

</head>

<body>

	<div class="super_container">

		@include('frontend.header')

		<!-- Home -->

		<div class="home">
			<div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{asset('frontend/images/shop_background.jpg')}}"></div>
			<div class="home_overlay"></div>
			<div class="home_content d-flex flex-column align-items-center justify-content-center">
				<h2 class="home_title text-center">
					@isset($pencarian)
					<font color="#DD3B3B">Pencarian</font>
					<br>
					@endisset
					{{$judul}}
				</h2>
			</div>
		</div>

		<!-- Shop -->

		<div class="shop">
			<div class="container">
				<div class="row">
					<div class="col-lg-3">

						<!-- Shop Sidebar -->
						<div class="shop_sidebar">
							<div class="sidebar_section">
								<div class="sidebar_title">Kategori</div>
								<ul class="sidebar_categories">
									@foreach ($_kategori as $k)
									<li><a href="{{$k->url}}">{{$k->nama}}</a></li>
									@endforeach
								</ul>
							</div>
						{{-- <div class="sidebar_section filter_by_section">
							<div class="sidebar_title">Filter By</div>
							<div class="sidebar_subtitle">Price</div>
							<div class="filter_price">
								<div id="slider-range" class="slider_range"></div>
								<p>Range: </p>
								<p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
							</div>
						</div>
						<div class="sidebar_section">
							<div class="sidebar_subtitle color_subtitle">Color</div>
							<ul class="colors_list">
								<li class="color"><a href="#" style="background: #b19c83;"></a></li>
								<li class="color"><a href="#" style="background: #000000;"></a></li>
								<li class="color"><a href="#" style="background: #999999;"></a></li>
								<li class="color"><a href="#" style="background: #0e8ce4;"></a></li>
								<li class="color"><a href="#" style="background: #df3b3b;"></a></li>
								<li class="color"><a href="#" style="background: #ffffff; border: solid 1px #e1e1e1;"></a></li>
							</ul>
						</div>
						<div class="sidebar_section">
							<div class="sidebar_subtitle brands_subtitle">Brands</div>
							<ul class="brands_list">
								<li class="brand"><a href="#">Apple</a></li>
								<li class="brand"><a href="#">Beoplay</a></li>
								<li class="brand"><a href="#">Google</a></li>
								<li class="brand"><a href="#">Meizu</a></li>
								<li class="brand"><a href="#">OnePlus</a></li>
								<li class="brand"><a href="#">Samsung</a></li>
								<li class="brand"><a href="#">Sony</a></li>
								<li class="brand"><a href="#">Xiaomi</a></li>
							</ul>
						</div> --}}
					</div>

				</div>

				<div class="col-lg-9">
					
					<!-- Shop Content -->

					<div class="shop_content">
						<div class="shop_bar clearfix">
							<div class="shop_product_count"><span>{{$total}}</span> produk ditemukan</div>
							@if(count($data) > 4)
							<div class="shop_sorting">
								<span>Urutkan berdasarkan :</span>
								<ul>
									<li>
										<span class="sorting_text">highest rated<i class="fas fa-chevron-down"></span></i>
										<ul>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>Nama</li>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "price" }'>Harga</li>
										</ul>
									</li>
								</ul>
							</div>
							@endif
						</div>

						<div class="product_grid">
							<div class="product_grid_border"></div>
							{{-- @foreach(range(1,30) as $i) --}}
							@foreach ($data as $d)
							<!-- Product Item -->
							<div class="product_item">
								<div class="product_border"></div>
								<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{$d->logo}}" alt="{{$d->nama}}"></div>
								<div class="product_content">
									<div class="product_price">{{$d->harga_jual}}</div>
									<div class="product_name"><div><a href="{{$d->url}}" tabindex="0">{{$d->nama}}</a></div></div>
								</div>
								<div class="product_fav"><i class="fas fa-heart"></i></div>
								{{-- <ul class="product_marks">
									<li class="product_mark product_discount">-25%</li>
									<li class="product_mark product_new">new</li>
								</ul> --}}
							</div>

							@endforeach
							{{-- @endforeach --}}
						</div>

						{{$data->links()}}

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
<script src="{{asset('frontend/plugins/Isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('frontend/plugins/jquery-ui-1.12.1.custom/jquery-ui.js')}}"></script>
<script src="{{asset('frontend/plugins/parallax-js-master/parallax.min.js')}}"></script>
<script src="{{asset('frontend/js/shop_custom.js')}}"></script>
@include('frontend.script')
</body>

</html>