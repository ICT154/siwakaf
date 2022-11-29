<?php  
/*----------------------------------*/
date_default_timezone_set("Asia/Jakarta"); 
$today = getdate();  	// now
	$hr_00 = $today["mday"]; 	if(strlen($hr_00)=='1'){$hr_00="0".$hr_00 ;}
	$bl_00 = $today['mon'];   	if(strlen($bl_00)=='1'){$bl_00="0".$bl_00;}
	$th_00 = $today['year']; 
	$jm_00 = $today['hours'];	if(strlen($jm_00)=='1'){$jm_00="0".$jm_00;}
	$mn_00 = $today['minutes'];	if(strlen($mn_00)=='1'){$mn_00="0".$mn_00;}
	$dt_00 = $today['seconds']; if(strlen($dt_00)=='1'){$dt_00="0".$dt_00;}
	$weekday = $today["wday"];
/*----------------------------------*/ 
function formatTgl($tgl){
	$tgl00=substr($tgl, 8, 2)."-".substr($tgl, 5, 2)."-".substr($tgl, 0, 4);
	return $tgl00;
}
function formatTglJam($tgl){
	$tgl00=substr($tgl, 8, 2)."-".substr($tgl, 5, 2)."-".substr($tgl, 0, 4)." ".substr($tgl, 11, 5);
	return $tgl00;
}