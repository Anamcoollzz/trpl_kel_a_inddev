@extends('layouts.box')

@section('box')

<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">{{ $title }}</h3>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-8">
						<table class="table table-striped table-bordered">
							<tbody>
								<tr>
									<td width="300px"><strong>No</strong></td>
									<td>{{$d->no}}</td>
								</tr>
								<tr>
									<td width="300px"><strong>Waktu</strong></td>
									<td>{{$d->created_at}}</td>
								</tr>
								<tr>
									<td width="300px"><strong>User</strong></td>
									<td>{{$d->user->nama}}</td>
								</tr>
								<tr>
									<td><strong>Status</strong></td>
									<td>
										@if($d->status == 'waiting for payment' || $d->status == 'waiting payment verification')
										<span class="badge bg-warning">{{$d->status}}</span>
										@else
										<span class="badge">{{$d->status}}</span>
										@endif
									</td>
								</tr>
								<tr>
									<td colspan="2" align="center"><strong>Produk Dibeli</strong></td>
								</tr>
								@foreach ($d->detail as $a)
								<tr>
									<td><strong>{{$a->nama_produk}}</strong></td>
									<td>{{rp($a->harga_jual)}}</td>
								</tr>
								@endforeach
								<tr>
									<td><strong>Total</strong></td>
									<td>
										{{rp($d->detail->sum(function($item){return $item->harga_jual;}))}}
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-md-4">
						@foreach ($d->detail as $a)
						<h3 class="text-center">{{$a->nama_produk}}</h3>
						<hr>
						<div class="row">
							<div class="col-md-4">
								<img class="img-thumbnail" src="{{$a->produk->logo}}" alt="{{$a->nama_produk}}">
							</div>
							<div class="col-md-8">
								<table class="table">
									<tbody>
										<tr>
											<td>Harga</td>
											<td>{{rp($a->harga_jual)}}</td>
										</tr>
										<tr>
											<td>Developer</td>
											<td>{{$a->produk->user->nama}}</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						@endforeach
					</div>
				</div>
				
			</div>
			@if($d->status == 'pending')
			<div class="box-footer">
				<a class="btn btn-flat btn-primary" data-toggle="modal" data-target="#modal-verifikasi">Verifikasi</a>
				<a class="btn btn-flat btn-danger" data-toggle="modal" data-target="#modal-tolak">Tolak</a>
			</div>
			@endif
		</div>
		@if($d->status == 'waiting payment verification')
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Pembayaran</h3>
			</div>
			<div class="box-body">
				<table class="table">
					<tbody>
						<tr>
							<td>Nama Pengirim</td>
							<td>:</td>
							<td>{{$d->nama_pengirim}}</td>
						</tr>
						<tr>
							<td>No Rekening Pengirim</td>
							<td>:</td>
							<td>{{$d->norek_pengirim}}</td>
						</tr>
						<tr>
							<td>Tanggal Transfer</td>
							<td>:</td>
							<td>{{$d->nama_pengirim}}</td>
						</tr>
						<tr>
							<td>Bukti Transfer</td>
							<td>:</td>
							<td>
								<img class="img-thumbnail" style="max-width: 200px;" src="{{$d->bukti_transfer}}" alt="{{$d->norek_pengirim}}">
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		@endif
	</div>
</div>

@if($d->status == 'pending')
<div class="modal fade" id="modal-tolak">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title">Alasan Penolakan</h4>
			</div>
			<form action="{{ route('admin.produk.tolak',[$d->id]) }}" method="post">
				@csrf
				@method('put')
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							@include('form.vertikal.textarea',['id'=>'alasan_ditolak','label'=>'Alasan Ditolak','required'=>true])
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-flat btn-default pull-left" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-danger btn-flat">Tolak</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-verifikasi">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title">Verifikasi Produk</h4>
			</div>
			<form action="{{ route('admin.produk.verifikasi',[$d->id]) }}" method="post" enctype="multipart/form-data">
				@csrf
				@method('put')
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							@include('form.vertikal.input',['id'=>'link_demo','label'=>'Link Demo','required'=>true])
						</div>
						<div class="col-md-12">
							@include('form.vertikal.input-arsip',['id'=>'projek_bundling','label'=>'Projek Bundling Dokumentasi','required'=>true])
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-flat btn-default pull-left" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary btn-flat">Verifikasi</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endif

@endsection

@push('script')
<script>
	@if($errors->has('alasan_ditolak'))
	$('[data-target="#modal-tolak"]').trigger('click');
	@endif

	@if($errors->has('link_demo') || $errors->has('projek_bundling'))
	$('[data-target="#modal-verifikasi"]').trigger('click');
	@endif
</script>
@endpush