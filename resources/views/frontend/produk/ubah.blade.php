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

					<form onsubmit="simpan(event,this)" action="{{route('produk.update',[$d->id])}}" id="contact_form" method="POST" enctype="multipart/form-data">
						@csrf
						@method('put')
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
							@if(is_null($d->logo))
							<div class="col-md-6">
								@include('form.vertikal.input-berkas',['id'=>'logo','required'=>true,'label'=>'Logo','accept'=>'image/png,image/jpeg'])
							</div>
							@else
							<div class="col-md-6" id="unggah-logo" style="display: none"></div>
							<div class="col-md-12">
								<h5 class="text-center">Logo</h5>
								<center>
									<img src="{{$d->logo}}" alt="{{$d->nama}}" class="img-thumbnail" style="max-width: 200px;">
									<br>
									<button style="cursor: pointer;" onclick="hapusLogo(event,{{$d->id}},this)" class="btn btn-danger btn-sm mt-2">hapus</button>
								</center>
							</div>
							@endif
							<div class="col-md-12">
								<h4>Daftar Gambar Screenshot</h4>
							</div>
							@if(count($d->screenshots) > 0)
							@foreach($d->screenshots as $s)
							<div class="col-md-3">
								<center>
									<a href="" onclick="showGambar(event,'{{$s->url}}', '{{$d->nama}}')">
										<img style="max-width: 130px;" src="{{$s->url}}" alt="{{$d->nama}}">
									</a>
									<br>
									<button style="cursor: pointer;" onclick="hapusGambar(event, {{$s->id}}, this)" type="button" class="mt-2 btn btn-danger btn-sm">hapus</button>
								</center>
							</div>
							@endforeach
							@else
							<div class="col-md-12">
								<div class="alert alert-danger">
									Tidak ada gambar screenshot
								</div>
							</div>
							@endif
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
								@include('plugins.form.ckeditor',['id'=>'deskripsi','label'=>'Deskripsi Produk','value'=>$d->deskripsi])
							</div>
							<div class="col-md-12" id="deskripsi-error">
								
							</div>
							<div class="col-md-6" id="unggah-berkas" style="display: none;"></div>
							<div class="col-md-6" id="unggah-dokumentasi" style="display: none;"></div>
							@if($d->file_path || $d->panduan_path)
							<div class="col-md-12 mb-2">
								<div>
									<a href="{{$d->file_path}}" target="_blank">Berkas Projek</a> 
									<a href="" onclick="hapusFile(event, this)" class="btn btn-danger btn-sm">hapus</a>
									<br>
								</div>
								<div>
									<a href="{{$d->panduan_path}}" target="_blank">Dokumentasi Projek</a>
									<a href="" onclick="hapusDokumentasi(event, this)" class="btn btn-danger btn-sm">hapus</a>
								</div>
							</div>
							@endif
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

	function hapusGambar(e, idGambar, el){
		$(el).html('menghapus');
		$(el).attr('disabled',true);
		$.post({
			url : "{{route('produk.hapus-screenshot')}}",
			data : {
				id : idGambar,
				_token : '{{csrf_token()}}'
			},
			success : function(response){
				$(el).parents('.col-md-3').fadeOut();
			}
		})
	}

	function showGambar(e, link, namaProduk){
		e.preventDefault();
		$('#modalGambar').find('img').attr('src', link);
		$('#modalGambar').find('img').attr('alt', namaProduk);
		$('#modalGambar').modal('show');
	}

	function hapusLogo(e, idProduk, el){
		$(el).html('menghapus');
		$(el).attr('disabled',true);
		$(el).parents('.col-md-12').fadeOut();
		$('#unggah-logo').html('<div class="form-group "><label for="logo" class="control-label">Logo</label><input required="required" accept="image/png,image/jpeg" name="logo" type="file" class="form-control" id="logo" value=""></div>');
		$('#unggah-logo').fadeIn();
	}

	function hapusFile(e, el){
		e.preventDefault();
		$(el).parent().fadeOut();
		$('#unggah-berkas').html('<div class="form-group ">   <label for="file_projek" class="control-label">Berkas Projek</label>     <input required="required" accept="application/x-zip-compressed," name="file_projek" type="file" class="form-control" id="file_projek" value="">       </div></div>');
		$('#unggah-berkas').fadeIn();
	}

	function hapusDokumentasi(e, el){
		e.preventDefault();
		$(el).parent().fadeOut();
		$('#unggah-dokumentasi').html('<div class="form-group ">   <label for="file_dokumentasi" class="control-label">Dokumentasi Projek</label>     <input required="required" accept="application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword" name="file_dokumentasi" type="file" class="form-control" id="file_dokumentasi" value="">       </div>');
		$('#unggah-dokumentasi').fadeIn();
	}


</script>
@endpush

@section('modal')
<div class="modal fade" tabindex="-1" role="dialog" id="modalGambar">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">{{$d->nama}}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<img class="img-thumbnail" src="" alt="">
			</div>
		</div>
	</div>
</div>
@endsection