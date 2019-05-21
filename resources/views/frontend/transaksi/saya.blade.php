<!DOCTYPE html>
<html lang="en">
<head>
	<title>{{$title}}</title>
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
					<div class="col-md-10 offset-1">
						<h3>Transaksi Saya</h3>
						@if(count($data) > 0)
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>No</th>
									<th>Waktu</th>
									<th>Status</th>
									<th>Total</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($data as $d)
								<tr>
									<td>{{$loop->iteration}}</td>
									<td>{{$d->no}}</td>
									<td>{{$d->created_at}}</td>
									<td>
										@if($d->status == 'waiting for payment' || $d->status == 'waiting payment verification')
										<span class="badge badge-warning">{{$d->status}}</span>
										@elseif($d->status == 'success')
										<span class="badge badge-success">{{$d->status}}</span>
										@else
										<span class="badge">{{$d->status}}</span>
										@endif
									</td>
									<td align="right">{{rp($d->detail->sum(function($item){return $item->harga_jual;}))}}</td>
									<td>
										@if($d->status == 'waiting for payment')
										<a href="{{ route('transaksi.show',[$d->id]) }}" class="btn btn-sm btn-primary">Bayar</a>
										@else
										<a href="{{ route('transaksi.show',[$d->id]) }}" class="btn btn-sm btn-success">Rincian</a>
										@endif
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						@else
						<div class="alert alert-danger">
							Anda belum transaksi :(
						</div>
						@endif
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