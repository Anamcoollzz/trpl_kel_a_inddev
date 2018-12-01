@extends('create-form')
@section('form')
@include('input',['id'=>'atas_nama','label'=>'Atas Nama'])
{{-- @include('input',['id'=>'nama_bank','label'=>'Nama Bank']) --}}
@include('select',['id'=>'nama_bank','label'=>'Pilih Bank','selectData'=>[
	[
		'text'=>'BNI','value'=>'BNI',
	],
	[
		'text'=>'BRI','value'=>'BRI',
	],
	[
		'text'=>'BCA','value'=>'BCA',
	],
	[
		'text'=>'BTN','value'=>'BTN',
	],
	[
		'text'=>'MANDIRI','value'=>'MANDIRI',
	],
	],
	])
@include('input',['id'=>'cabang','label'=>'Cabang'])
@include('input_number',['id'=>'no_rek','label'=>'No Rekening'])
@endsection