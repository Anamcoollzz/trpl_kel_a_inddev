<!DOCTYPE html>
<html lang="en">
<head>
	<title>Keranjang Belanja</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="OneTech shop project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/bootstrap4/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/cart_styles.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/cart_responsive.css')}}">

</head>

<body>

	<div class="super_container">

		@include('frontend.header')

		<!-- Cart -->

		<div class="cart_section">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1">
						<div class="cart_container">
							<div class="cart_title">Keranjang Belanja</div>
							@if(count($data) > 0)
							<div class="cart_items">
								<ul class="cart_list">
									@foreach ($data as $d)
									<li class="cart_item clearfix">
										<div class="cart_item_image"><img src="{{$d->produk->logo}}" alt="{{$d->produk->nama}}"></div>
										<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
											<div class="cart_item_name cart_info_col">
												<div class="cart_item_title">Nama</div>
												<div class="cart_item_text">
													<a style="color: black" href="{{ url('produk/'.$d->id_produk) }}">
														{{$d->produk->nama}}
													</a>
												</div>
											</div>
											<div class="cart_item_price cart_info_col">
												<div class="cart_item_title">Harga</div>
												<div class="cart_item_text">{{rp($d->produk->harga_jual)}}</div>
											</div>
										</div>
									</li>
									@endforeach
								</ul>
							</div>

							<!-- Order Total -->
							<div class="order_total">
								<div class="order_total_content text-md-right">
									<div class="order_total_title">Total Pesanan :</div>
									<div class="order_total_amount">{{rp($total)}}</div>
								</div>
							</div>

							<form action="{{ route('checkout') }}" method="post">
								<div class="cart_buttons">
									<a href="{{ url('') }}">
										<button type="button" class="button cart_button_clear">Lanjutkan Belanja</button>
									</a>
									@csrf
									<button type="submit" class="button cart_button_checkout">Checkout</button>
								</div>
							</form>

							@else

							<div class="alert alert-danger mt-5">
								Keranjang masih kosong
							</div>

							<div class="cart_buttons">
								<a href="{{ url('') }}">
									<button type="button" class="button cart_button_clear">Lanjutkan Belanja</button>
								</a>
							</div>

							@endif
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
	<script src="{{asset('frontend/plugins/easing/easing.js')}}"></script>
	<script src="{{asset('frontend/js/cart_custom.js')}}"></script>
</body>

</html>