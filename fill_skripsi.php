<?php
require_once('class_skripsi.php');

$akses = new Skripsi();
$akses->connect();

foreach ($akses->data_from_semprop() as $k) {
	//echo "$k[idseminar],$k[topik],'sedang_skripsi',$k[semester],$k[nim]";
		$akses->insert_skripsi($k['idseminar'],$k['topik'],'sedang_skripsi',$k['semester'],$k['nim']);
	}

#batas.........

foreach ($akses->get_nilai_ujianSkripsi() as $k) {
	if(is_null($k['nilai']))
	{
		$akses->update_status_skripsi('sedang_skripsi',$k['idskripsi']);
		
	}
	else if( $k['nilai']=='A' ||  $k['nilai']=='A-' ||  $k['nilai']=='B'){
		$akses->update_status_skripsi('lulus',$k['idskripsi']);
	}
	else{
		$akses->update_status_skripsi('sedang_skripsi',$k['idskripsi']);
	}
	}

?>
