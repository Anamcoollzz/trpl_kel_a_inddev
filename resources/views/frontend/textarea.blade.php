<div class="form-group {{ isset($errors) ? ($errors->has($id) ? 'has-error': '' ) : '' }}">
	<label for="{{ $id }}">{{ $label }}</label>
	<textarea @isset($readonly) readonly="readonly" @endisset name="{{ isset($name) ? $name : $id }}" type="text" class="form-control {{ ($errors->has($id) ? 'is-invalid': '' ) }}" id="{{ $id }}" placeholder="{{ $label }}">{{ old($id) ? (!isset($name) ? old($id) : old($id)[$index]) : (isset($value) ? $value : '') }}</textarea>
	@if(isset($errors)) @if($errors->has($id))<span class="invalid-feedback">{{$errors->first($id)}}</span>@endif @endif
</div>