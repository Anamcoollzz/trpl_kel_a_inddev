@extends('create-form')
@section('form')
@method('PUT')
@include('input',['id'=>'atas_nama','label'=>'Atas Nama','value'=>$d->atas_nama])
@include('input',['id'=>'nama_bank','label'=>'Nama Bank','value'=>$d->nama_bank])
@include('input',['id'=>'cabang','label'=>'Cabang','value'=>$d->cabang])
@include('input_number',['id'=>'no_rek','label'=>'No Rekening','value'=>$d->no_rek])
@endsection