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
					<div class="col-lg-10 offset-lg-1">
						@if(session('success_msg'))
						<div class="alert alert-success">
							{{session('success_msg')}}
						</div>
						@endif
						<div class="cart_container">
							<div class="cart_title">{{$title}}</div>
							<div class="cart_items">
								<ul class="cart_list">
									@foreach ($transaksi->detail as $d)
									<li class="cart_item clearfix">
										<div class="cart_item_image">
											<a href="{{$d->produk->url}}">
												<img src="{{$d->produk->logo}}" alt="{{$d->nama_produk}}">
											</a>
										</div>
										<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
											<div class="cart_item_name cart_info_col">
												<div class="cart_item_title">Produk</div>
												<div class="cart_item_text">
													<a href="{{$d->produk->url}}">
														{{$d->nama_produk}}
													</a>
												</div>
											</div>
											<div class="cart_item_price cart_info_col">
												<div class="cart_item_title">Harga</div>
												<div class="cart_item_text">{{rp($d->harga_jual)}}</div>
											</div>
										</div>
									</li>
									@endforeach
								</ul>
							</div>

							<!-- Order Total -->
							<div class="order_total">
								@if($transaksi->status == 'waiting for payment' || $transaksi->status == 'waiting payment verification')
								<span  style="text-align: left; float: left;" class="mt-4 badge badge-warning">{{$transaksi->status}}</span>
								@elseif($transaksi->status == 'success')
								<span  style="text-align: left; float: left;" class="mt-4 badge badge-success">{{$transaksi->status}}</span>
								@else
								<span  style="text-align: left; float: left;" class="mt-4 badge">{{$transaksi->status}}</span>
								@endif
								<div class="order_total_content text-md-right">
									<div class="order_total_title">Total Yang Harus Dibayar :</div>
									<div class="order_total_amount">{{rp($total)}}</div>
								</div>
							</div>
							@if($transaksi->status == 'waiting for payment')
							<div class="row mt-5">
								<div class="col-md-12 mb-3">
									<div class="card">
										<div class="card-body">
											<h4>
												Silakan transfer ke salah satu akun rekening berikut 
												<button id="unggah-btn" onclick="showPembayaran(event)" class="btn btn-primary btn-sm float-right" href=""> 
													Unggah Bukti Pembayaran
												</button>
											</h4>
										</div>
									</div>
								</div>
								@foreach ($rekening as $r)
								<div class="col-md-4">
									<div class="card">
										<div class="card-body">
											<center>
												<img src="{{$r->gambar}}" style="max-width: 150px;" alt="{{$r->atas_nama}}">
												<br>
												<strong>{{$r->nama_bank}}</strong>
												<br>
												Atas Nama {{$r->atas_nama}} 
												<br>
												No Rekening {{$r->no_rek}}
												<br>
												Cabang {{$r->cabang}}
											</center>
										</div>
									</div>
								</div>
								@endforeach
							</div>

							@else
							<div class="card mt-5">
								<div class="card-body">
									<h3 class="text-center">Pembayaran berhasil dilakukan</h3>
									<table class="table">
										<tbody>
											<tr>
												<td>Nama Pengirim</td>
												<td>:</td>
												<td>{{$transaksi->nama_pengirim}}</td>
											</tr>
											<tr>
												<td>No Rekening Pengirim</td>
												<td>:</td>
												<td>{{$transaksi->norek_pengirim}}</td>
											</tr>
											<tr>
												<td>Tanggal Transfer</td>
												<td>:</td>
												<td>{{$transaksi->nama_pengirim}}</td>
											</tr>
											<tr>
												<td>Bukti Transfer</td>
												<td>:</td>
												<td>
													<img class="img-thumbnail" style="max-width: 200px;" src="{{$transaksi->bukti_transfer}}" alt="{{$transaksi->norek_pengirim}}">
												</td>
											</tr>
										</tbody>
									</table>
									@if($transaksi->status != 'success')
									<div class="alert alert-info">
										Ketika pembayaran berhasil diverifikasi maka tombol unduh akan aktif
									</div>
									@endif
								</div>
							</div>

							<div class="card mt-5">
								<div class="card-body">
									@if($transaksi->status == 'success')
									<a href="" class="btn btn-success ">
										Unduh Program
									</a>
									<a href="" class="btn btn-danger ">
										Unduh Dokumentasi
									</a>
									<a style="background-color: #9C0CC5; border-color: #9C0CC5" href="" class="btn btn-success ">
										Unduh Program & Dokumentasi
									</a>
									@else
									<a href="" class="btn btn-success disabled">Unduh Program</a>
									<a href="" class="btn btn-danger disabled">Unduh Dokumentasi</a>
									<a style="background-color: #9C0CC5; border-color: #9C0CC5" href="" class="btn btn-success disabled">Unduh Program & Dokumentasi</a>
									@endif
								</div>
							</div>
							
							@endif

						</div>
					</div>
				</div>
			</div>
		</div>

		
		@if($transaksi->status == 'waiting for payment')

		<form action="{{ route('bayar',[$transaksi->id]) }}" method="post" enctype="multipart/form-data">
			@csrf
			@method('put')
			<div class="modal fade" tabindex="-1" role="dialog" id="modalPembayaran">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Isi Bukti Pembayaran</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								@foreach ($rekening as $r)
								<div class="col-md-6">
									<div class="card mt-2">
										<div class="card-body">
											<center>
												<img src="{{$r->gambar}}" style="max-width: 150px;" alt="{{$r->atas_nama}}">
												<br>
												<strong>{{$r->nama_bank}}</strong>
												<br>
												Atas Nama {{$r->atas_nama}} 
												<br>
												No Rekening {{$r->no_rek}}
												<br>
												Cabang {{$r->cabang}}
												<br>
												<input @if(count($errors->all()) > 0) @if(old('rekening') == $r->id) checked="checked" @endif @endif required="required" type="radio" value="{{$r->id}}" name="rekening"> Pilih
											</center>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							@include('form.vertikal.input',['id'=>'nama_pengirim','required'=>true,'label'=>'Nama Pengirim'])
							@include('form.vertikal.input',['id'=>'norek_pengirim','required'=>true,'label'=>'No Rekening Pengirim'])
							@include('form.vertikal.input-date',['id'=>'tanggal_transfer','required'=>true,'label'=>'Tanggal Transfer'])
							@include('form.vertikal.input-gambar',['id'=>'bukti_transfer','required'=>true,'label'=>'Bukti Transfer'])
							<button type="submit" class="btn btn-primary btn-sm">Bayar</button>
						</div>
					</div>
				</div>
			</div>
		</form>

		@endif

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
	<script>
		function showPembayaran(e){
			e.preventDefault();
			$('#modalPembayaran').modal('show');
		}
		@if(count($errors->all()) > 0)
		$('#unggah-btn').trigger('click');
		@endif
	</script>
</body>

</html>