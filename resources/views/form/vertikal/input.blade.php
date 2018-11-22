<div class="form-group {{ $errors->has($id) ? 'has-error': '' }}">
  <label for="{{ $id }}" class="control-label">{{ $label }}</label>
  <input 
  @isset($readonly) readonly="readonly" @endisset 
  @isset($required) required="required" @endisset 
  @isset($min) min="{{$min}}" @endisset 
  @isset($max) max="{{$max}}" @endisset 
  @isset($accept) accept="{{$accept}}" @endisset 
  name="{{ isset($name) ? $name : $id }}" 
  @isset($type) type="{{$type}}" @else type="text" @endisset 
  class="form-control" 
  id="{{ $id }}" 
  value="{{ old($id) ? (!isset($name) ? old($id) : old($id)[$index]) : (isset($value) ? $value : '') }}">
  @if($errors->has($id))
  <span class="help-block" style="color: #E31515;">{{$errors->first($id)}}</span>
  @endif
</div>