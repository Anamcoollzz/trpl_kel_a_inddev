
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
						<h3>
							Pencairan Saldo 
							<button style="float:right;" class="btn btn-outline-primary">Sisa saldo : {{rp(Auth::user()->saldo)}}</button>
						</h3>
						<a href="{{ route('cairkan-saldo') }}" class="btn btn-primary">Cairkan Saldo</a>
						<br>
						<br>
						@if(count($data) > 0)
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Waktu</th>
									<th>Jumlah</th>
									<th>Status</th>
									<th>Total</th>
									<th>No Rek Tujuan</th>
									<th>Bukti</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($data as $d)
								<tr>
									<td>{{$loop->iteration}}</td>
									<td>{{$d->created_at}}</td>
									<td>{{rp($d->jumlah)}}</td>
									<td>
										@if($d->status == 'pending')
										<span class="badge badge-warning">{{$d->status}}</span>
										@elseif($d->status == 'success')
										<span class="badge badge-success">{{$d->status}}</span>
										@else
										<span class="badge">{{$d->status}}</span>
										@endif
									</td>
									<td align="right">{{rp($d->jumlah)}}</td>
									<td align="right">{{$d->rekening->no_rek}}</td>
									<td>
										@if($d->status == 'success')
										<a target="_blank" href="{{$d->bukti_transfer}}">
											Lihat
										</a>
										@endif
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						{{$data->links('pagination.default')}}
						@else
						<div class="alert alert-danger">
							Anda belum melakukan pencairan :(
						</div>
						@endif
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
	<script src="{{asset('frontend/plugins/easing/easing.js')}}"></script>
	<script src="{{asset('frontend/js/cart_custom.js')}}"></script>
</body>

</html>