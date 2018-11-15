@push('css')
<link rel="stylesheet" href="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
@endpush

@push('js')
<script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
@endpush

@push('script')
<script>
	$(function () {
		$(".textarea").wysihtml5();
	});
</script>
@endpush