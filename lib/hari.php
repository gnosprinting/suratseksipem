<?php

// function untuk menampilkan nama hari ini dalam bahasa indonesia
// di buat oleh malasngoding.com

function hari_ini(){
	$hari = date ("D");

	switch($hari){
		case 'Sun':
			$hari_ini = "Minggu";
		break;

		case 'Mon':
			$hari_ini = "Senin";
		break;

		case 'Tue':
			$hari_ini = "Selasa";
		break;

		case 'Wed':
			$hari_ini = "Rabu";
		break;

		case 'Thu':
			$hari_ini = "Kamis";
		break;

		case 'Fri':
			$hari_ini = "Jumat";
		break;

		case 'Sat':
			$hari_ini = "Sabtu";
		break;

		default:
			$hari_ini = "Tidak di ketahui";
		break;
	}

	return $hari_ini;

}
$sad = '2019-09-19';
//echo "Hari ini adalah ". hari_ini($sad);

?>
