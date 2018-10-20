<div class="form-group {{ isset($errors) ? ($errors->has($id) ? 'has-error': '' ) : '' }}">
  <label for="{{ $id }}">{{ $label }}</label>
    <select name="{{ isset($name) ? $name : $id }}" type="text" class="form-control" id="{{ $id }}">
    	@foreach($selectData as $s)
    	<option  
    	@if(old($id)) 
    		@if(!isset($name))
    			@if(old($id) == $s['value'])
    				selected
    			@endif
    		@else
    			@if(old($id)[$index] == $s['value'] )
    				selected
				@endif
			@endif
    	@elseif(isset($selected))
    		@if($selected == $s['value'])
    			selected
    		@endif
    	@endif
    	" value="{{ $s['value'] }}">{{ $s['text'] }}</option>
    	@endforeach
    </select>
</div>