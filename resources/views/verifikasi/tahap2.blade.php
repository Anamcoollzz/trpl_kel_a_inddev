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
					<div class="contact_form_title">Verifikasi tahap 2</div>
					<div class="alert alert-info">
						Menunggu verifikasi email dari admin
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel"></div>
</div>
@endsection