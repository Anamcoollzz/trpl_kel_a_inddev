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
	<style>
	select.form-control:not([size]):not([multiple]) {
		height: 50px;
		margin-left: 0;
	}
	.form-control{
		height: 50px;
		padding-left: 25px;
		border-radius: 5px;
		color: #0e8ce4;
	}
	textarea.form-control{
		height: 120px;
	}
	.form-control:focus {
		color: #0e8ce4;
	}
	.has-error > .form-control:focus, .has-error > .form-control {
		color: #dc3545 !important;
	}
	.form-group > label {
		color: #0e8ce4;
		font-size: 18px;
	}
	.form-group.has-error > label {
		color: #dc3545 !important;
	}
</style>
</head>

<body>
	<div class="super_container">
		@include('frontend.header')
		@yield('content')
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