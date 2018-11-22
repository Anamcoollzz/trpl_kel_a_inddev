<!DOCTYPE html>
<html lang="en">
<head>
	<title>{{$title}}</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="OneTech shop project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{csrf_token()}}" id="_csrf_token">
	<link rel="stylesheet" href="{{asset('frontend/styles/bootstrap4/bootstrap.min.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('frontend/styles/contact_styles.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('frontend/styles/contact_responsive.css')}}" type="text/css">
	@stack('css')
@include('frontend.style-override')
@stack('style')
</head>

<body>
	<div class="super_container">
		@include('frontend.header')
		@yield('content')
		@include('frontend.footer')
	</div>
	@yield('modal')
	<script src="{{asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
	<script src="{{asset('frontend/styles/bootstrap4/popper.js')}}"></script>
	<script src="{{asset('frontend/styles/bootstrap4/bootstrap.min.js')}}"></script>
	<script src="{{asset('frontend/plugins/greensock/TweenMax.min.js')}}"></script>
	<script src="{{asset('frontend/plugins/greensock/TimelineMax.min.js')}}"></script>
	<script src="{{asset('frontend/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
	<script src="{{asset('frontend/plugins/greensock/animation.gsap.min.js')}}"></script>
	<script src="{{asset('frontend/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
	<script src="{{asset('frontend/plugins/easing/easing.js')}}"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
	@stack('js')
	@stack('script')
	<script src="{{asset('frontend/js/contact_custom.js')}}"></script>
	@include('frontend.script')
</body>

</html>