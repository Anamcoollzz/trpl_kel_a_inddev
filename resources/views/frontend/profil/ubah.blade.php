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
					<div class="contact_form_title">Ubah Profil</div>
					<form action="{{route('profil.update')}}" id="contact_form" method="POST">
						@method('put')
						@csrf
						<div class="row">
							<div class="col-md-4">
								@include('frontend.input',['id'=>'nama','label'=>'Nama','value'=>Auth::user()->nama])
							</div>
							<div class="col-md-4">
								@include('frontend.input',['id'=>'no_hp','label'=>'No HP','value'=>Auth::user()->no_hp])
							</div>
							<div class="col-md-4">
								@include('frontend.select',['id'=>'jenis_kelamin','label'=>'Jenis Kelamin','selected'=>Auth::user()->jenis_kelamin,'selectData'=>[['text'=>'Laki-laki','value'=>'Laki-laki'],['text'=>'Perempuan','value'=>'Perempuan'],]])
							</div>
							<div class="col-md-4">
								@include('frontend.select',['id'=>'jenis_member','label'=>'Jenis Member','selected'=>Auth::user()->tingkat_member,'selectData'=>[['text'=>'CV','value'=>'cv'],['text'=>'Member','value'=>'member'],]])
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								@include('frontend.textarea',['id'=>'alamat','label'=>'Alamat','value'=>Auth::user()->alamat])
							</div>
						</div>
						<div class="contact_form_button">
							<button type="submit" class="button contact_submit_button">Perbarui</button>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
	<div class="panel"></div>
</div>
@endsection