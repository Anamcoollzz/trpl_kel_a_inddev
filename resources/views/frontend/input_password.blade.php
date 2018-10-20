<div class="form-group {{ isset($errors) ? ($errors->has($id) ? 'has-error': '' ) : '' }}">
	<label for="{{ $id }}">{{ $label }}</label>
	<input @isset($readonly) readonly="readonly" @endisset name="{{ isset($name) ? $name : $id }}" type="password" class="form-control {{ ($errors->has($id) ? 'is-invalid': '' ) }}" id="{{ $id }}" placeholder="{{ $label }}" value="{{ old($id) ? (!isset($name) ? old($id) : old($id)[$index]) : (isset($value) ? $value : '') }}">
	@if(isset($errors)) @if($errors->has($id))<span class="invalid-feedback">{{$errors->first($id)}}</span>@endif @endif
</div>