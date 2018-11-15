@extends('layouts.app')
@section('content')

<div class="contact_form">
	<div class="container">
		<div class="row">
			@if(session('msg'))
			<div class="col-lg-10 offset-lg-1">
				<div class="alert alert-success">
					{{session('msg')}}
				</div>
			</div>
			@endif
			<div class="col-lg-10 offset-lg-1">
				<div class="contact_form_container">
					<div class="contact_form_title">{{$title}}</div>

					<form onsubmit="simpan(event,this)" action="{{route('produk.store')}}" id="contact_form" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col-md-6">
								@include('form.vertikal.input',['id'=>'nama','required'=>true,'label'=>'Nama Produk','value'=>$d->nama])
							</div>
							<div class="col-md-6">
								@include('form.vertikal.select',['id'=>'id_kategori','required'=>true,'label'=>'Pilih Kategori','selectData'=>$kategori,'selected'=>$d->id_kategori])
							</div>
							<div class="col-md-6">
								@include('form.vertikal.input-number',['id'=>'tahun_dibuat','required'=>true,'min'=>2000,'max'=>2050,'label'=>'Tahun Dibuat','value'=>$d->tahun_dibuat])
							</div>
							<div class="col-md-6">
								@include('form.vertikal.input-number',['id'=>'tahun_selesai_dibuat','required'=>true,'min'=>2000,'max'=>2050,'label'=>'Tahun Selesai Dibuat','value'=>$d->tahun_selesai_dibuat])
							</div>
							<div class="col-md-6">
								@include('form.vertikal.input-number',['id'=>'harga','required'=>true,'min'=>50000,'label'=>'Harga','value'=>$d->harga])
							</div>
							<div class="col-md-6">
								@include('form.vertikal.input-berkas',['id'=>'logo','required'=>true,'label'=>'Logo','accept'=>'image/png,image/jpeg'])
							</div>
							<div class="col-md-12">
								<h4>Daftar Gambar Screenshot</h4>
							</div>
							@foreach($d->screenshots as $s)
							<div class="col-md-3">
								<center>
									<img style="max-width: 130px;" src="{{$s->url}}" alt="{{$d->nama}}">
									<br>
									<button onclick="hapusGambar(event, {{$s->id}})" type="button" class="btn btn-danger">X</button>
								</center>
							</div>
							@endforeach
							<div class="col-md-12 mt-2">
								<div id="upload">
									<div id="drop">
										<input type="hidden" name="upload_url" value="{{route('produk.upload-gambar')}}">
										<input type="hidden" name="hapus_gambar_url" value="{{route('produk.hapus-gambar')}}">
										DRAG dan DROP screenshot produk <font color="#B64444">atau</font>

										<a>Telusuri</a>
										<input type="file" name="upload_gambar" multiple accept="image/png,image/jpeg" />
									</div>

									<ul>
										<!-- The file uploads will be shown here -->
									</ul>
									<div id="name-upload-area">
										
									</div>
								</div>
							</div>
							<div class="col-md-12" id="desk">
								@include('plugins.form.ckeditor',['id'=>'deskripsi','label'=>'Deskripsi Produk','value'=>old('deskripsi')])
							</div>
							<div class="col-md-12" id="deskripsi-error">
								
							</div>
							<div class="col-md-6">
								@include('form.vertikal.input-arsip',['id'=>'file_projek','required'=>true,'label'=>'Berkas Projek'])
							</div>
							<div class="col-md-6">
								@include('form.vertikal.input-berkas',['id'=>'file_dokumentasi','required'=>true,'label'=>'Dokumentasi Projek','accept'=>'application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword'])
							</div>
							<div class="col-md-12">
								<div class="alert alert-info">
									Berkas projek yang diterima hanya dengan ekstensi zip
									<br>
									Dokumentasi projek yang diterima hanya dengan ekstensi zip, docx, doc atau pdf
								</div>
							</div>
							<div class="col-md-12">
								<div class="contact_form_button">
									<button type="submit" class="button contact_submit_button">Simpan Produk</button>
								</div>
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
	<div class="panel"></div>
</div>
@endsection

@include('import-upload')
@include('plugins.ckeditor',['id'=>'deskripsi'])
@push('script')
<script>
	function simpan(e,el){
		e.preventDefault();
		$('#deskripsi-error').empty();
		if(CKEDITOR.instances.deskripsi.getData()){
			if(!document.getElementById('contact_form').checkValidity()){
				$('#error-kabeh').html('cek formnya terlebih dahulu');
				$('html, body').animate({
					scrollTop: $('#error-kabeh').offset().top
				}, 1000);
			}else{
				document.getElementById('contact_form').submit();
			}
		}else{
			$('#deskripsi-error').html('<div class="alert alert-danger">Deskripsi wajib diisi</div>');
			$('html, body').animate({
				scrollTop: $('#desk').offset().top
			}, 1000);
		}
	}

	function hapusGambar(e, idGambar){
		$.get({
			url : "{{route('hapus-gambar')}}"
		})
	}
</script>
@endpush