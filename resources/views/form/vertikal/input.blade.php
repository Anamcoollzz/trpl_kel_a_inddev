<div class="form-group {{ isset($errors) ? ($errors->has($id) ? 'has-error': '' ) : '' }}">
  <label for="{{ $id }}" class="control-label">{{ $label }}</label>
    <input 
    	@isset($readonly) readonly="readonly" @endisset 
        @isset($required) required="required" @endisset 
    	@isset($min) min="{{$min}}" @endisset 
    	@isset($max) max="{{$max}}" @endisset 
        @isset($accept) accept="{{$accept}}" @endisset 
    	name="{{ isset($name) ? $name : $id }}" 
    	type="{{isset($type)?$type:'text'}}" 
    	class="form-control" 
    	id="{{ $id }}" 
    	value="{{ old($id) ? (!isset($name) ? old($id) : old($id)[$index]) : (isset($value) ? $value : '') }}"
    	>
    @if(isset($errors)) @if($errors->has($id))<span class="help-block">{{$errors->first($id)}}</span>@endif @endif
</div>