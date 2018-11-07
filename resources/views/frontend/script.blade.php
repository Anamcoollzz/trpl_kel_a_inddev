<script>
	$(document).ready(function(e){
		$('a.clc').on('click',function(ev){
			$('[name="kategori_search"]').val($(this).data('uri'))
		});

		@if(request()->query('kategori_search'))
		$('[data-uri="{{request()->query('kategori_search')}}"]').trigger('click');
		$('[data-uri="{{request()->query('kategori_search')}}"]').trigger('click');
		@endif
	});
</script>