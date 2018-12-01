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
					<div class="contact_form_title">{{$title}}</div>
					<table class="table">
						<tbody>
							<tr>
								<td>Nama</td>
								<td>{{$developer->nama}}</td>
							</tr>
							<tr>
								<td>Jenis Kelamin</td>
								<td>{{$developer->jenis_kelamin}}</td>
							</tr>
							<tr>
								<td>No HP</td>
								<td>{{$developer->no_hp}}</td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td>{{$developer->alamat}}</td>
							</tr>
							<tr>
								<td>Jenis Member</td>
								<td>{{$developer->tingkat_member}}</td>
							</tr>
							<tr>
								<td>Email</td>
								<td>
									<a href="mailto:{{$developer->email}}">
										{{$developer->email}}
									</a>
								</td>
							</tr>
							<tr>
								<td>Status</td>
								<td>
									<span class="badge badge-success">verified</span>
								</td>
							</tr>
							<tr>
								<td>Waktu Mendaftar</td>
								<td>{{$developer->created_at}}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection