@extends('create-form')
@section('other-box')
<div class="alert alert-info">
	Jika password atau avatar dikosongi maka dianggap tetap
</div>
@endsection
@section('form')
@method('PUT')
@include('input',['id'=>'nama','value'=>$d->nama,'label'=>'Nama'])
@include('input',['id'=>'no_hp','value'=>$d->no_hp,'label'=>'No HP'])
@include('email',['value'=>$d->email])
@include('password')
@include('password_confirmation')
@include('input_image',['id'=>'avatar','label'=>'Avatar'])
@include('textarea',['id'=>'alamat','label'=>'Alamat','value'=>$d->alamat])
@endsection