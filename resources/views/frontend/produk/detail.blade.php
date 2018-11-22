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
					@if(session('error_msg'))
					<div class="col-md-12">
						<div class="alert alert-danger">
							{{session('error_msg')}}
						</div>
					</div>
					@endif

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
							<div class="product_text">
								<p>
									{!!substr($d->deskripsi, 0, 200)!!} 
									<br>
									<a style="color: #6A98E5; cursor: pointer;" href="#" id="selengkapnya">
										selengkapnya
									</a>
								</p>
							</div>
							<div class="order_info d-flex flex-row" style="margin-top: 0;">
								<form action="{{ route('beli') }}" method="post">

									<div class="product_price">{{rp($d->harga_jual)}}</div>
									<div class="button_container">
										@csrf
										<input type="hidden" name="id_produk" value="{{$d->id}}">
										<button type="submit" class="button cart_button">Beli</button>
									</form>
									@if($d->link_demo)
									<a href="{{$d->link_demo}}" target="_blank">
									<button type="button" style="background-color: #CD3333" class="button cart_button">Demo</button>
									</a>
									@endif
									<div class="product_fav {{$isWishlist?'active':''}}" onclick="tambahKeWishlist({{$d->id}})"><i class="fas fa-heart"></i></div>
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

	<div class="modal fade" tabindex="-1" role="dialog" id="modalSelengkapnya">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">{{$d->nama}}</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					{!!$d->deskripsi!!}
				</div>
			</div>
		</div>
	</div>

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
<script>

	function tambahKeWishlist(id){
		$.post({
			url : '{{url('daftar-keinginan/tambah')}}',
			data : {
				id_produk : id,
				_token : '{{csrf_token()}}'
			},
			success : function(response, status, code){

				if(response.code == 302){

					window.location = '{{ route('masuk') }}?goto='+location

				}else{

					setTimeout(function(){

						$.get({
							url : '{{ url('api/daftar-keinginan/jumlah') }}',
							success : function(res){
								$('.wishlist_count').html(res.data);
							}
						})

					},1000)
				}
			},
			statusCode : {
				302 : function(){
					window.location = '{{ route('masuk') }}?goto='+location
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(jqXHR.status);
				console.log(textStatus);
				console.log(errorThrown);
			}
		});
	}
	// $(document).ready(funtion(){
		$('#selengkapnya').on('click',function(e){
			e.preventDefault();
			$('#modalSelengkapnya').modal('show');
		})
	// });
</script>
</body>

</html>