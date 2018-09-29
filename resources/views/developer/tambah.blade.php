@extends('create-form')
@section('form')
@include('input',['id'=>'nama','label'=>'Nama'])
@include('input',['id'=>'uri_routing','label'=>'URI Routing'])
@endsection