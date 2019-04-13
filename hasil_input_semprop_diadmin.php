<?php include 'templates/header_Penjadwalan.php' ?>

<?php

	//membutuhkan file fungsi_semprop
	require('fungsi_semprop.php');

	//instansiasi objek class Seminar_Proposal
	$akses = new Seminar_Proposal();
	$akses->koneksi();

?>
<?php include 'templates/navbar_admin.html' ?>

<?php
  
if(isset($_POST['simpan'])){

    $id = $_POST['nim'];
    $nilai_pb = $_POST['nilai_proses_pembimbing'];
    $status = $_POST['status'];
    $nilai_ub = $_POST['nilai_ujian_pembimbing'];
    $nilai_up = $_POST['nilai_ujian_penguji'];


      $akses->InputNilaiDanStatusSemprop($id,$nilai_pb,$status,$id,$nilai_ub,$nilai_up);

     

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