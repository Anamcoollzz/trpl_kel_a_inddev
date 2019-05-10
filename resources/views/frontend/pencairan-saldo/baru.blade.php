<!DOCTYPE html>
<html lang="en">
<head>
	<title>Pencairan Saldo Baru</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="OneTech shop project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{asset('frontend/styles/bootstrap4/bootstrap.min.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('frontend/styles/contact_styles.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('frontend/styles/contact_responsive.css')}}" type="text/css">

</head>

<body>

	<div class="super_container">
		@include('frontend.header')
		<div class="contact_form">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1">
						@if(session('error_msg'))
						<div class="alert alert-danger">{{session('error_msg')}}</div>
						@endif
						<h3>Pencairan Saldo</h3>
						<div class="card">
							<div class="card-body">
								@if(Auth::user()->saldo > 10000)
								<div class="alert alert-info">
									Saldo anda saat ini Rp. {{rp(Auth::user()->saldo)}}
									<br>
									Jumlah pencairan wajib kelipatan 10rb
									<br>
									Dalam seminggu maksimal pencairan hanya 2 kali
									<br>
									Maksimal nominal sekali pencairan sebesar 10jt
								</div>
								<form action="{{ route('cairkan-saldo-post') }}" method="post">
									@csrf
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="jumlah_pencairan">Jumlah Yang Dicairkan</label>
												<input required="required" name="jumlah_pencairan" id="jumlah_pencairan" min="10000" max="{{Auth::user()->saldo > 10000000 ? 10000000 : Auth::user()->saldo}}" type="number" class="form-control {{ $errors->has('jumlah_pencairan') ? 'is-invalid' : '' }}">
												@if($errors->has('jumlah_pencairan'))
												<span class="invalid-feedback">{{$errors->first('jumlah_pencairan')}}</span>
												@endif
											</div>	
										</div>
										<div class="col-md-6">
											
											<div class="form-group">
												<label for="id_rekening_member">Pilih Rekening</label>
												<select style="margin-left: 0px;" name="id_rekening_member" id="id_rekening_member"  class="form-control {{ $errors->has('id_rekening_member') ? 'is-invalid' : '' }}">
													@foreach ($rekening as $r)
													<option value="{{$r->id}}">
														{{$r->atas_nama}} [{{$r->no_rek}}]
													</option>
													@endforeach
												</select>
												@if($errors->has('id_rekening_member'))
												<span class="invalid-feedback">{{$errors->first('id_rekening_member')}}</span>
												@endif
											</div>
										</div>
										<div class="col-md-12">
											<button type="submit" class="btn btn-primary">Cairkan</button>
										</div>
									</div>
								</form>
								@else
								<div class="alert alert-danger">
									Mohon maaf anda tidak bisa mencairkan saldo, karena sisa saldo anda Rp. {{Auth::user()->saldo}}
								</div>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel"></div>
		</div>
		@include('frontend.footer')
	</div>

	<script src="{{asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
	<script src="{{asset('frontend/styles/bootstrap4/popper.js')}}"></script>
	<script src="{{asset('frontend/styles/bootstrap4/bootstrap.min.js')}}"></script>
	<script src="{{asset('frontend/plugins/greensock/TweenMax.min.js')}}"></script>
	<script src="{{asset('frontend/plugins/greensock/TimelineMax.min.js')}}"></script>
	<script src="{{asset('frontend/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
	<script src="{{asset('frontend/plugins/greensock/animation.gsap.min.js')}}"></script>
	<script src="{{asset('frontend/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
	<script src="{{asset('frontend/plugins/easing/easing.js')}}"></script>
	{{-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script> --}}
	<script src="{{asset('frontend/js/contact_custom.js')}}"></script>
</body>

</html>