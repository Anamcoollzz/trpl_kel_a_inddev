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

					<form action="{{route('rekeningku.store')}}" id="contact_form" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col-md-6">
								@include('form.vertikal.input',['id'=>'atas_nama','required'=>true,'label'=>'Atas Nama'])
							</div>
							<div class="col-md-6">
								@include('form.vertikal.input',['id'=>'nama_bank','required'=>true,'label'=>'Nama Bank'])
							</div>
							<div class="col-md-6">
								@include('form.vertikal.input',['id'=>'cabang','required'=>true,'label'=>'Cabang'])
							</div>
							<div class="col-md-6">
								@include('form.vertikal.input',['id'=>'no_rek','required'=>true,'label'=>'No Rekening'])
							</div>
							<div class="col-md-12">
								<div class="contact_form_button">
									<button type="submit" class="button contact_submit_button">Simpan Rekening</button>
								</div>
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@include('plugins.ckeditor',['id'=>'deskripsi'])