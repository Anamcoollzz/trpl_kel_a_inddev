@extends('create-form')
@section('form')
@method('PUT')
@include('input',['id'=>'nama','value'=>$d->nama,'label'=>'Nama'])
@include('input',['id'=>'uri_routing','value'=>$d->uri_routing,'label'=>'URI Routing'])
@endsection