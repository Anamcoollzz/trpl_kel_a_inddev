@push('style')
<style>
#upload {
	margin: 0;
	width: 100%;
}
#upload ul li p {
	width: 100%;
	top: 15px;
	left: 100px;
	font-size: 12px;
}
#upload ul li {
	height: 70px;
}
#upload ul li canvas {
	top: 10px;
}
#upload ul li span {
	background: none;
	background-color: #E12626;
	padding: 3px 15px;
	color: white;
	font-size: 10px;
	top: 23px;
	width: auto;
	height: auto;
}
#upload ul li.working span {
	height: auto;
}
</style>
@endpush
@push('css')
<!-- The main CSS file -->
<link href="{{asset('upload-assets/css/style.css')}}" rel="stylesheet" />
@endpush
@push('js')
<script src="{{asset('upload-assets/js/jquery.knob.js')}}"></script>

<!-- jQuery File Upload Dependencies -->
<script src="{{asset('upload-assets/js/jquery.ui.widget.js')}}"></script>
<script src="{{asset('upload-assets/js/jquery.iframe-transport.js')}}"></script>
<script src="{{asset('upload-assets/js/jquery.fileupload.js')}}"></script>
<!-- Our main JS file -->
<script src="{{asset('upload-assets/js/script.js')}}"></script>
@endpush