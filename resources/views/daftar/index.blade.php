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
			@if(count($errors->all())>0)
			<div class="col-lg-10 offset-lg-1">
				<div class="alert alert-danger">
					@foreach($errors->all() as $message)
					{{$message}}
					@endforeach
				</div>
			</div>
			@endif
			<div class="col-lg-10 offset-lg-1">
				<div class="contact_form_container">
					<div class="contact_form_title">Daftar</div>

					<form action="{{route('daftar')}}" id="contact_form" method="POST">
						@csrf
						<div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
							<input value="{{old('nama')}}" type="text" id="nama" class="contact_form_name input_field" placeholder="Nama" required="required" name="nama">
							{{-- <input value="{{old('no_hp')}}" type="text" id="no_hp" class="contact_form_email input_field" placeholder="No Hp" required="required" name="no_hp"> --}}
							<input value="{{old('email')}}" type="email" id="email" class="contact_form_phone input_field" placeholder="Email" name="email">
							<input type="password" id="password" class="contact_form_phone input_field" placeholder="Password" name="password">
						</div>
						<div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
							<input type="password" id="password_confirmation" class="contact_form_phone input_field" placeholder="Konfirmasi Password" name="password_confirmation">
						</div>
						{{-- <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
							<input type="password" id="password" class="contact_form_phone input_field" placeholder="Password" name="password">
						</div> --}}
						{{-- <div class="contact_form_text">
							<textarea id="alamat" class="text_field contact_form_message" name="alamat" rows="4" placeholder="Alamat" required="required">{{old('alamat')}}</textarea>
						</div> --}}
						<div class="contact_form_button">
							<button type="submit" class="button contact_submit_button">Daftar</button>
							{{-- <a href="{{route('form-masuk')}}" class="button contact_submit_button">Masuk</a> --}}
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
	<div class="panel"></div>
</div>
@endsection