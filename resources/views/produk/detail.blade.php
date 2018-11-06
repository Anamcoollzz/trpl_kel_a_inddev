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
									<td width="300px"><strong>Nama</strong></td>
									<td>{{$d->nama}}</td>
								</tr>
								<tr>
									<td width="300px"><strong>Tahun Dibuat</strong></td>
									<td>{{$d->tahun_dibuat}}</td>
								</tr>
								<tr>
									<td width="300px"><strong>Tahun Selesai Dibuat</strong></td>
									<td>{{$d->tahun_selesai_dibuat}}</td>
								</tr>
								<tr>
									<td><strong>Tanggal Diunggah</strong></td>
									<td>{{tglIndo($d->created_at)}}</td>
								</tr>
								<tr>
									<td><strong>Developer</strong></td>
									<td>{{$d->user->nama}}</td>
								</tr>
								<tr>
									<td><strong>Harga Jual</strong></td>
									<td>{{$d->harga_jual}}</td>
								</tr>
								<tr>
									<td><strong>Status</strong></td>
									<td>
										<span class="badge bg-{{$d->warna_status}}">
											{{ $d->status }}
										</span>
									</td>
								</tr>
								<tr>
									<td><strong>Kategori</strong></td>
									<td>{{$d->kategori->nama}}</td>
								</tr>
								<tr>
									<td><strong>Berkas Projek</strong></td>
									<td><a href="{{$d->file_path}}" class="btn btn-primary btn-flat">Unduh</a></td>
								</tr>
								<tr>
									<td><strong>Berkas Dokumentasi</strong></td>
									<td><a href="{{$d->panduan_path}}" class="btn btn-primary btn-flat">Unduh</a></td>
								</tr>
								<tr>
									<td><strong>Viewer</strong></td>
									<td>{{$d->hit}}</td>
								</tr>
								<tr>
									<td><strong>Dibeli</strong></td>
									<td>{{$d->dibeli}}</td>
								</tr>
								@if($d->status == 'rejected')
								<tr>
									<td><strong>Alasan Penolakan</strong></td>
									<td>{{$d->alasan_ditolak}}</td>
								</tr>
								@endif
							</tbody>
						</table>
					</div>
					<div class="col-md-4">
						<h3 class="text-center">Logo</h3>
						<hr>
						<img class="img-thumbnail" src="{{$d->logo}}" alt="{{$d->nama}}">
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
		@if(count($d->screenshots) > 0)
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Screenshot Produk</h3>
			</div>
			<div class="box-body">
				<div class="row">
					@foreach ($d->screenshots as $s)
					<div class="col-md-3">
						<a href="{{$s->url}}" target="_blank">
							<img class="img-thumbnail" src="{{$s->url}}" alt="{{$d->nama}}">
						</a>
					</div>
					@endforeach
				</div>
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