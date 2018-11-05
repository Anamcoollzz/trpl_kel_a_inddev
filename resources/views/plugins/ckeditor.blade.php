@push('js')
<!-- CK Editor -->
<script src="{{asset('plugins/ckeditor/ckeditor.js')}}"></script>
@endpush

@push('script')
	<script>
		$(document).ready(function(e){
			CKEDITOR.replace(
				@isset($id)
				'{{$id}}'
				@else
				'ckeditor-area'
				@endisset
				);
		});
	</script>
@endpush