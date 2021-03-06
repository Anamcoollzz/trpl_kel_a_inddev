<?php 

require_once('Helpers.php');

function tahun($tgl)
{
	return substr($tgl, 0, 4);
}

function bulan($tgl)
{
	return substr($tgl, 5, 2);
}

function tgl($tgl)
{
	return substr($tgl, 8, 2);
}

function namaBulan($bulan){
	switch ($bulan) {
		case '01': return 'Januari'; break;
		case '02': return 'Februari'; break;
		case '03': return 'Maret'; break;
		case '04': return 'April'; break;
		case '05': return 'Mei'; break;
		case '06': return 'Juni'; break;
		case '07': return 'Juli'; break;
		case '08': return 'Agustus'; break;
		case '09': return 'September'; break;
		case '10': return 'Oktober'; break;
		case '11': return 'November'; break;
		case '12': return 'Desember'; break;
		default: return 'Tidak valid!!!'; break;
	}
}

function tglIndo($tgl)
{
	if(is_null($tgl))
		return '';
	return tgl($tgl).' '.namaBulan(bulan($tgl)).' '.tahun($tgl);
}

function englishFormat($tgl)
{
	return substr($tgl, 6, 4).'-'.substr($tgl, 3, 2).'-'.substr($tgl, 0, 2);
}

function formatIndo($tgl)
{
	if(is_null($tgl)){
		return '';
	}
	return tgl($tgl).'-'.bulan($tgl).'-'.tahun($tgl);
}

function waktuIndo($waktu)
{
	return tglIndo($waktu).' '.substr($waktu, 11);
}