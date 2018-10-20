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
					<div class="contact_form_title">Profil Saya</div>
					<table class="table">
						<tbody>
							<tr>
								<td>Nama</td>
								<td>{{Auth::user()->nama}}</td>
							</tr>
							<tr>
								<td>Jenis Kelamin</td>
								<td>{{Auth::user()->jenis_kelamin}}</td>
							</tr>
							<tr>
								<td>No HP</td>
								<td>{{Auth::user()->no_hp}}</td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td>{{Auth::user()->alamat}}</td>
							</tr>
							<tr>
								<td>Jenis Member</td>
								<td>{{Auth::user()->tingkat_member}}</td>
							</tr>
							<tr>
								<td>Email</td>
								<td>{{Auth::user()->email}}</td>
							</tr>
							<tr>
								<td>Status</td>
								<td>
									<span class="badge badge-success">verified</span>
								</td>
							</tr>
							<tr>
								<td>Waktu Mendaftar</td>
								<td>{{Auth::user()->created_at}}</td>
							</tr>
							<tr>
								<td>Terakhir diperbarui</td>
								<td>{{Auth::user()->updated_at}}</td>
							</tr>
						</tbody>
					</table>
					<a href="{{route('profil.ubah')}}" class="btn btn-primary">Ubah Profil</a>
					<a href="{{route('profil.ubah-password')}}" class="btn btn-primary">Ubah Password</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection