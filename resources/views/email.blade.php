<div class="form-group {{ isset($errors) ? ($errors->has('email') ? 'has-error': '' ) : '' }}">
  <label for="{{ 'email' }}" class="col-lg-2 control-label">Email</label>
  <div class="col-sm-6">
    <input @isset($readonly) readonly="readonly" @endisset name="email" type="text" class="form-control" id="email" placeholder="Email" value="{{ old('email') ? (!isset($name) ? old('email') : old('email')[$index]) : (isset($value) ? $value : '') }}">
    @if(isset($errors)) @if($errors->has('email'))<span class="help-block">{{$errors->first('email')}}</span>@endif @endif
  </div>
</div>