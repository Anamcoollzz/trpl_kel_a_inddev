<!DOCTYPE html>
<html lang="en">
<head>
<title>{{$title}}</title>
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
					<div class="contact_form_container">
						<div class="contact_form_title">Masuk</div>

						<form action="{{route('masuk',['goto'=>request()->query('goto')])}}" id="contact_form" method="post">
							@csrf
							<div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
								<input type="text" id="email" class="contact_form_email input_field" placeholder="Email" required="required" name="email">
								<input type="password" id="password" class="contact_form_email input_field" placeholder="Password" required="required" name="password">
								<button style="margin-top: 0px;" type="submit" class="button contact_submit_button">Masuk</button>
							</div>
						</form>

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