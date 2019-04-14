<?php include 'templates/header_Penjadwalan.php' ?>

<?php

	//membutuhkan file fungsi_semprop
	require('fungsi_pendadaran.php');

	//instansiasi objek class Seminar_Proposal
	$akses = new ujian_pendadaran();
	$akses->koneksi();

?>
<?php include 'templates/navbar_admin.html' ?>

<?php
  
if(isset($_POST['simpan1'])){
    $id_pd = $_POST['nim'];
    $nilai_1 = $_POST['nilai_penguji_1'];
    $nilai_2 = $_POST['nilai_penguji_2'];
    $nilai_3 = $_POST['nilai_pembimbing'];
    $status1 = $_POST['status'];
    $nim1 = $_POST['nim'];


      $akses->InputNilaiDanStatusPendadaran($id_pd, $nim1, $status1, $nilai_1, $nilai_2, $nilai_3);

     

      }
    
      ?>


<!DOCTYPE html>
<html>
<head>
  <title>javascript-- pesan</title>
  <script type="text/javascript">
    function pesan(){
      alert("DATA ANDA TELAH TERSIMPAN TERIMA KASIH")
    }
  </script>
</head> 
<body onload="pesan()">
  

</body>
</html>

<?php include 'templates/footer_Penjadwalan.php' ?>