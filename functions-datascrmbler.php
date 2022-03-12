<?php
//Key Display || Genrate Key Fuction : "displayKey()"
function displayKey($key){
	printf("value='%s'", $key);
}

//Scrmbler Data
function scrmblerData($orgnalData, $key){
	$orgnalKey = "abcdefghijklmnopqrstuvwxyz1234567890";
	$data      = '';
	$lenth     = strlen($orgnalData);
	for ($i = 0; $i < $lenth; $i++) {
		$currentcar = $orgnalData[$i];
		$position   = strpos($orgnalKey, $currentcar);
		if ($position !== false) {
			$data .= $key[$position];
		} else {
			$data .= $currentcar;
		}
	}
	return $data;
}

//Decode Data
function decodeData($orgnalData, $key){
	$orgnalKey = "abcdefghijklmnopqrstuvwxyz1234567890";
	$data      = '';
	$lenth     = strlen($orgnalData);
	for ($i = 0; $i < $lenth; $i++) {
		$currentcar = $orgnalData[$i];
		$position   = strpos($key, $currentcar);
		if ($position !== false) {
			$data .= $orgnalKey[$position];
		} else {
			$data .= $currentcar;
		}
	}
	return $data;
}