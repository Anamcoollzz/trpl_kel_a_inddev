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
					<div class="contact_form_title">Verifikasi tahap 1</div>

					<form action="{{route('tahap1-post')}}" id="contact_form" method="POST">
						@csrf
						<div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
							<input value="{{old('nama')?old('nama'):Auth::user()->nama}}" type="text" id="nama" class="contact_form_name input_field" placeholder="Nama" required="required" name="nama">
							<input value="{{old('no_hp')?old('no_hp'):Auth::user()->no_hp}}" type="text" id="no_hp" class="contact_form_email input_field" placeholder="No Hp" required="required" name="no_hp">
							<input value="{{old('email')?old('email'):Auth::user()->email}}" type="email" id="email" class="contact_form_phone input_field" placeholder="Email" name="email">
						</div>
						<div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
							<input type="password" id="password" class="contact_form_phone input_field" placeholder="Password" name="password">
							<select name="jenis_kelamin">
								<option value="">Pilih Jenis Kelamin</option>
								<option value="Laki-laki">Laki-laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
							<select name="jenis_member">
								<option value="">Pilih Jenis Member</option>
								<option value="member">Biasa</option>
								<option value="cv">CV</option>
							</select>
						</div>
						{{-- <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
							
						</div> --}}
						<div class="contact_form_text">
							<textarea id="alamat" class="text_field contact_form_message" name="alamat" rows="4" placeholder="Alamat" required="required">{{old('alamat')?old('alamat'):Auth::user()->alamat}}</textarea>
						</div>
						<div class="alert alert-info">
							<ul>
								<li>Jika anda mendaftar sebagai jenis member biasa maka anda mendaftar sebagai solo programmer</li>
								<li>Jika anda mendaftar sebagai jenis member CV maka anda mendaftar tim programmer (perusahaan)</li>
							</ul>
						</div>
						<div class="contact_form_button">
							<button type="submit" class="button contact_submit_button">Ke Tahap 2</button>
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