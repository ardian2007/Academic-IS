<?php 
include '../Class_penjadwalan.php';
$nim        =$_POST['nim'];
$penguji1   =$_POST['penguji1'];
$penguji2   =$_POST['penguji2'];
$tanggal    =date("Y-m-d", strtotime($_POST['tanggal']));
$ruang      =$_POST['ruang'];
$waktu      =$_POST['waktu'];

$akses = new Penjadwalan();

// bikin ID jadwal
$idjadwal  = $akses->createIdJadwal("UP", $penguji1, $penguji2, $tanggal, $waktu, $ruang);
// Cek Penguji sama atau tdk
    $nilai_penguji1vs2=$akses->cekDuaPengujiYangSama($penguji1,$penguji2);
// Cek Dosen Penguji 1 dan 2 Dalam Sehari
    $nilai_penguji1=$akses->CekPengujiDalamSehari($penguji1,$tanggal);
    $nilai_penguji2=$akses->CekPengujiDalamSehari($penguji2,$tanggal);
// Cek Waktu Dlm Sehari
    $nilai_waktuDS=$akses->cekWaktuDalamSehari($waktu,$tanggal);
// Cek Ruang Dalam Sehari    
    $nilai_ruangDS=$akses->cekRuangDalamSehari($ruang,$tanggal);
// Cek Ruang Waktu Dalam Sehari
    $nilai_ruangwaktudlmsehari=$akses->cekRuangWaktuDalamSehari($ruang,$waktu,$tanggal);
    // Insert to Database
if ($nilai_penguji1vs2==true) {
    if ($nilai_penguji1==true) {
        if ($nilai_penguji2==true) {
            if ($nilai_waktuDS==true) {
                if ($nilai_ruangDS==true) {
                    if ($nilai_ruangwaktudlmsehari==true) {
                        $akses->insertPenguji($idjadwal,$penguji1);
                        $akses->insertPenguji($idjadwal,$penguji2);
                        $akses->insertJadwal($idjadwal,"UNDARAN",$nim,$tanggal,$waktu,$ruang);
                        include 'redirect/redirect_sukses.php';
                    }else {include 'redirect/redirect_failed.php';}
                }else {include 'redirect/redirect_failed.php';}
            }else {include 'redirect/redirect_failed.php';}
        }else {include 'redirect/redirect_failed.php';}
    }else {include 'redirect/redirect_failed.php';}
}else {include 'redirect/redirect_failed.php';}

?>