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
					<form action="{{route('profil.update-password')}}" id="contact_form" method="POST">
						@method('put')
						@csrf
						<div class="row">
							<div class="col-md-6">
								@include('frontend.input_password',['id'=>'password','label'=>'Password'])
							</div>
							<div class="col-md-6">
								@include('frontend.input_password',['id'=>'password_confirmation','label'=>'Konfirmasi Password'])
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