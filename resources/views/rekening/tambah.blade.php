@extends('create-form')
@section('form')
@include('input',['id'=>'atas_nama','label'=>'Atas Nama'])
@include('input',['id'=>'nama_bank','label'=>'Nama Bank'])
@include('input',['id'=>'cabang','label'=>'Cabang'])
@include('input_number',['id'=>'no_rek','label'=>'No Rekening'])
@endsection