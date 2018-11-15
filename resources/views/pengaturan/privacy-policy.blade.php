@extends('create-form')
@section('form')
@include('form.wysihtml5',['id'=>'privacy_policy','label'=>'Privacy Policy','value'=>$d?$d->value:''])
@endsection

@include('import-wysihtml5')