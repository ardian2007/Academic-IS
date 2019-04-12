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
  
  if(isset($_POST['submit2'])){


      $nim = $_POST['nim'];
                
                

      foreach ($akses->CariMahasiswaBerdasarkanNimPadaPengumumanHasilSemprop($nim) as $key) {
          # code...
        
        
        echo"
        <br>
        <h2 align='center'>Data Mahasiswa</h2>
        <br>
        <table align='center'>
        <tr>
        <td width='700px'>

  <div class='form-group'>
    <label for='formGroupExampleInput'>Nim </label>
    <input name='nim' value='$key[nim]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input' align='center'>
    <label for='formGroupExampleInput'>Nama </label>
    <input name='nama' value='$key[nama_mhs]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
    <label for='formGroupExampleInput'>Nilai Proses Pembimbing </label>
    <input name='nama' value='$key[nilai_proses_pembimbing]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
    <label for='formGroupExampleInput'>Nilai Ujian Pembimbing </label>
    <input name='nama' value='$key[nilai_ujian_pembimbing]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
    <label for='formGroupExampleInput'>Nilai Ujian Penguji </label>
    <input name='nama' value='$key[nilai_ujian_penguji]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
    <label for='formGroupExampleInput'>Status </label>
    <input name='nama' value='$key[status]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
 </div>
 <br>
    <tr>
<td>
    <a href='update_semrop_diadmin.php?nim=$key[nim]' class='btn btn-outline-primary' role='button' aria-pressed='true'>UPDATE</a>
<a href='delete_semprop_diadmin.php?nim=$key[nim]' class='btn btn-outline-primary' role='button' aria-pressed='true'>DELETE</a></td>
</tr>
    

 
  
        </td>
        </tr>
        </table>
        ";
        


      }
    }
      ?>
<?php include 'templates/footer_Penjadwalan.php' ?>


