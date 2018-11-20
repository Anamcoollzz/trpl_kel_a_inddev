<?php 

function uploadPath($file, $folderPath)
{
	return asset(str_replace('\\', '/', str_replace('public', 'storage', $file->store('public/'.$folderPath))));
}

function rp($duit)
{
	return number_format($duit, 0, ',', '.');
}