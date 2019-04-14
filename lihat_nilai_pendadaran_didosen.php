<?php include 'templates/header_Penjadwalan.php' ?>

<?php

	//membutuhkan file fungsi_semprop
	require('fungsi_pendadaran.php');

	//instansiasi objek class Seminar_Proposal
	$akses = new ujian_pendadaran();
	$akses->koneksi();

?>
<?php include 'templates/navbar_dosen.html' ?>

<?php

$nim=$_GET['nim'];
                

      foreach ($akses->lihatnilaipendadaran($nim) as $key) {
          # code...
        
        
        echo"
        <br>
        <h2 align='center'>Data Mahasiswa</h2>
        <br><br>
        <table align='center'>
        <tr>
        <td width='700px'>

  <div class='form-group'>
    <label for='formGroupExampleInput'>Nim </label>
    <input name='nim' value='$key[nim]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input' align='center'>
    <label for='formGroupExampleInput'>Nama </label>
    <input name='nama' value='$key[nama_mhs]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
    <label for='formGroupExampleInput'>Id penguji </label>
    <input name='nama' value='$key[id_penguji]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
    <label for='formGroupExampleInput'>Nilai penguji 1 </label>
    <input name='nama' value='$key[nilai_penguji_1]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
    <label for='formGroupExampleInput'>Nilai penguji 2 </label>
    <input name='nama' value='$key[nilai_penguji_2]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
    <label for='formGroupExampleInput'>Nilai pembimbing </label>
    <input name='nama' value='$key[nilai_pembimbing]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
    <label for='formGroupExampleInput'>Status </label>
    <input name='nama' value='$key[status]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
    

  </div>
  
        </td>
        </tr>
        </table>
        ";
        


      
    }
      ?>
<?php include 'templates/footer_Penjadwalan.php' ?>


