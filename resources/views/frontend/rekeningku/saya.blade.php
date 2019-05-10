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
						@if(session('success_msg'))
						<div class="alert alert-success">
							{{session('success_msg')}}
						</div>
						@endif
						<h3>Rekening</h3>
						<a href="{{ route('tambah-rekening') }}" class="btn btn-primary">Tambah Rekening</a>
						<br>
						<br>
						@if(count($data) > 0)
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Atas Nama</th>
									<th>Bank</th>
									<th>Cabang</th>
									<th>No Rek</th>
									<th>Status</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($data as $d)
								<tr>
									<td>{{$loop->iteration}}</td>
									<td>{{$d->atas_nama}}</td>
									<td>{{$d->nama_bank}}</td>
									<td>{{$d->cabang}}</td>
									<td>{{$d->no_rek}}</td>
									<td>
										@if($d->default == 'ya')
										<span class="badge badge-success">default</span>
										@endif
									</td>
									<td>
										<a href="{{ route('rekeningku.ubah',[$d->id]) }}" class="btn btn-sm btn-primary">Ubah</a>
										<a onclick="hapus(event,'{{ route('rekeningku.hapus',[$d->id]) }}')" href="#" class="btn btn-sm btn-danger">Hapus</a>
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
	</div>
	<form action="" method="post" id="form-hapus">
		@csrf
		@method('DELETE')
	</form>
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
	<script>
		function hapus(e, url){
			e.preventDefault();
			if(confirm('Anda yakin?')){
				$('#form-hapus').attr('action',url);
				$('#form-hapus').submit();
			}
		}
	</script>
</body>

</html>