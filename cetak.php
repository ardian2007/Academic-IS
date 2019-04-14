
<?php include 'templates/header_Penjadwalan.php' ?>


<?php

	//membutuhkan file fungsi_semprop
	require('fungsi_semprop.php');

	//instansiasi objek class Seminar_Proposal
	$akses = new Seminar_Proposal();
	$akses->koneksi();

?>
<?php include 'templates/navbar_mhs.html' ?>

<?php
$nim=$_GET['nim'];
foreach ($akses->cetak($nim) as $key) {

include "docxtemplate.class.php";
 

$docx = new DOCXTemplate('template.docx');
$docx -> set('nama', "$key[nama_mhs]" );
$docx -> set('nim', "$key[nim]" );
$docx -> set('dosen_pembimbing', "$key[nama_dsn]");
$docx -> set('nilai_proses_pembimbing', "$key[nilai_proses_pembimbing]" );
$docx -> set('nilai_ujian_pembimbing', "$key[nilai_ujian_pembimbing]" );
$docx -> set('nilai_penguji', "$key[nilai_ujian_penguji]" );

$docx->saveAs('surat_keterangan.docx');
// $docx->downloadAs('surat_keterangan.docx');

header('Content-type:application/msword');
header('Content-disposition: attachment;filename=surat_keterangan.docx');
readfile('surat_keterangan.docx');


}
?>
<?php include 'templates/footer_Penjadwalan.php' ?>