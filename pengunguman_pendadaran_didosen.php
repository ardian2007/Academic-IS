<?php include 'templates/header_Penjadwalan.php' ?>
<?php

    //membutuhkan file fungsi_semprop
    require('fungsi_pendadaran.php');

    //instansiasi objek class Seminar_Proposal
    $akses = new ujian_pendadaran();
    $akses->koneksi();

?>

    <?php include 'templates/navbar_dosen.html' ?>
    <br>

    <h2 align="center">PENGUNGUMAN PENDADARAN</h2>
<br>
<table align="center">
<form name="pencarian" method="POST" action = "hasil_pencarian_didosen.php" ">            
      
                    <tr> <td>
                    <input type="text" placeholder="masukan nim" name="nim" title ="masukan nim" class="form-control">  
                    </td>
                    <td>
                    <button id="submit1" name="submit1" class='butn butn2 ml-2'>cari</button></td>
                   </tr>

          </form>
        </table>
    
<br><br>

        <table border='1' align='center' width='80%'' height='30%'>
    <tr align='center' bgcolor="#D3D3D3">
      <th height="50">Nim</th>
      <th height="50" >Nama</th>
      <th height="50">Status</th>
       <th height="50">Lihat Rincian</th>

    </tr>

<?php

      foreach ($akses->lihatstatusmahasiswapendadaran() as $key) {
        


        echo"
       
        

        <tr>
          <td align='center'>$key[nim]</td>
          <td align='center'>$key[nama_mhs]</td>
          <td align='center'>$key[status]</td>
          <td align='center'><a href='lihat_nilai_pendadaran_didosen.php?nim=$key[nim]' class='btn btn-outline-primary' role='button' aria-pressed='true'>lihat</a></td>
          </tr>
          
        ";


      
    }

        
      ?>

<?php include 'templates/footer_Penjadwalan.php' ?>