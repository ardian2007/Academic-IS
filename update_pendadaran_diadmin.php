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
  
$nim=$_GET['nim'];
     
      foreach ($akses->UpdateNilaiDanStatusPendadaran2($nim) as $key) {
        
        


        echo"
        <br>
        <h2 align='center'>Data mahasiswa</h2>
        <br>
        <table align='center'>
        <tr>
        <td width='700px'>
<form method='POST' action='proses_updatependadaran_diadmin.php'>
  <div class='form-group'>
    <label for='formGroupExampleInput'>NIM </label>
    <input name='nim' value='$key[nim]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
    <label for='formGroupExampleInput'>NAMA </label>
    <input name='nama' value='$key[nama_mhs]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>

  </div>
 
        
        
        ";


                    
        echo "
        <label for='formGroupExampleInput'>NILAI PENGUJI 1 </label><input type='text' name='nilai_penguji_1' class='form-control' aria-label='Text input with checkbox'>
         <label for='formGroupExampleInput'>NILAI PENGUJI 2 </label><input type='text' name='nilai_penguji_2' class='form-control' aria-label='Text input with checkbox'>
          <label for='formGroupExampleInput'>NILAI PEMBIMBING </label><input type='text' name='nilai_pembimbing' class='form-control' aria-label='Text input with checkbox'>
       <label for='formGroupExampleInput'>STATUS </label><select name='status' class='form-control' aria-label='Text input with checkbox' >
                                         <option>- PILIH -</option> 
                                        <option value='lulus'> lulus </option> 
                                        <option value='tidak_lulus'> tidak lulus </option>
                                   </select> 
        
        <br>   <input type='submit' name='kirim1' value='kirim' class='btn btn-outline-primary''>    
        

        </form>
        </td>
        </tr>
        </table>      ";


      
    }
      ?>
<?php include 'templates/footer_Penjadwalan.php' ?>


