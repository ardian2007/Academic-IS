<?php 
include '../Class_penjadwalan.php';
$nim        =$_POST['nim'];
$penguji1   =$_POST['penguji'];
$penguji2   ="00000000";
$tanggal    =date("Y-m-d", strtotime($_POST['tanggal']));
$ruang      =$_POST['ruang'];
$waktu      =$_POST['waktu'];

$akses = new Penjadwalan();

// bikin ID jadwal
$idjadwal  = $akses->createIdJadwal("SP", $penguji1, $penguji2, $tanggal, $waktu, $ruang);
// Cek Dosen Penguji 1 dan 2 Dalam Sehari
    $nilai_penguji1=$akses->CekPengujiDalamSehari($penguji1,$tanggal);
// Cek Waktu Dlm Sehari
    $nilai_waktuDS=$akses->cekWaktuDalamSehari($waktu,$tanggal);
// Cek Ruang Dalam Sehari    
    $nilai_ruangDS=$akses->cekRuangDalamSehari($ruang,$tanggal);
// Cek Ruang Waktu Dalam Sehari
    $nilai_ruangwaktudlmsehari=$akses->cekRuangWaktuDalamSehari($ruang,$waktu,$tanggal);
    // Insert to Database

    if ($nilai_penguji1==true) {
            if ($nilai_waktuDS==true) {
                if ($nilai_ruangDS==true) {
                    if ($nilai_ruangwaktudlmsehari==true) {
                        $akses->insertPenguji($idjadwal,$penguji1);
                        $akses->insertJadwal($idjadwal,"SEMPROP",$nim,$tanggal,$waktu,$ruang);
                        include 'redirect/redirect_sukses.php';
                    }else {include 'redirect/redirect_failed.php';}
                }else {include 'redirect/redirect_failed.php';}
            }else {include 'redirect/redirect_failed.php';}
    }else {include 'redirect/redirect_failed.php';}

?>