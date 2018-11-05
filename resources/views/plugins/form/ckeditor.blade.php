<div style="margin-top: 20px; color: #0e8ce4;
    font-size: 18px; margin-bottom: 20px;">
	{{$label}}
<textarea id="{{isset($id)?$id:'ckeditor-area'}}" class="editor" name="{{isset($id)?$id:'ckeditor-area'}}" rows="10" cols="80">{{isset($value)?$value:''}}</textarea>
</div>