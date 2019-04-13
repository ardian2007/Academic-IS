<?php include 'templates/header_Penjadwalan.php' ?>
<?php

  //membutuhkan file fungsi_semprop
  require('fungsi_pendadaran.php');

  //instansiasi objek class Seminar_Proposal
  $akses = new ujian_pendadaran();
  $akses->koneksi();

?>
<?php include 'templates/navbar_admin.html' ?>


    <br>

    <h2 align="center">DATA UJIAN PENDADARAN</h2>
<br>
<table align="center">
<form name="pencarian" method="POST" action = "hasil_cari_pengungumanPD_diadmin.php" ">            
      
                    <tr> <td>
                    <input type="text" placeholder="masukan nim" name="nim" title ="masukan nim" class="form-control">  
                    </td>
                    <td>
                    <button id="submit2" name="submit2" class='butn butn2 ml-2'>cari</button></td>
                   </tr>

          </form>
        </table>
    
<br><br>

    <table border='1' align='center' width='80%'' height='30%'>
    <tr align='center' bgcolor='#D3D3D3'>
      <th height='50'>Nim</th>
      <th height='50' >Nama</th>
      <th height='50'>Nilai Penguji 1</th>
       <th height='50'>Nilai Penguji 2</th>
        <th height='50'>Nilai Pembimbing</th>
      <th height='50'>Status</th>
      <th height='50'>Action</th>
    </tr>

<?php

$nim=$_GET['nim'];

$akses->DeleteDataPendadaran($nim);

foreach ($akses->LihatPengumumanNilaiDanStatusSemuaMahasiswaPendadaran() as $key) {
        
        
           
        


        echo"
       
         <tr>
          <td align='center'>$key[nim]</td>
          <td align='center'>$key[nama_mhs]</td>
          <td align='center'>$key[nilai_penguji_1]</td>
           <td align='center'>$key[nilai_penguji_2]</td>
            <td align='center'>$key[nilai_pembimbing]</td>
          <td align='center'>$key[status]</td>
          <td align='center'><a href='update_pendadaran_diadmin.php?nim=$key[nim]' role='button' class='btn btn-outline-primary'>UPDATE</a>
          <a href='delete_pendadaran_diadmin.php?nim=$key[nim]' role='button' class='btn btn-outline-primary'>DELETE</a></td>
          </tr>
         
        ";


      
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


