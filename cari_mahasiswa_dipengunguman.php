<?php

	//membutuhkan file fungsi_semprop
	require('fungsi_semprop.php');

	//instansiasi objek class Seminar_Proposal
	$akses = new Seminar_Proposal();
	$akses->koneksi();

?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>HASIL PENCARIAN</title>
  </head>
  <body>

     </div>
  <img class="card-img-bottom" src="img/SEMINAR1.jpg" alt="Card image cap">
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
   <!-- <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button> -->

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="pencarian_semprop.php">HOME<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="hasil_akhir.php">LIHAT NILAI</a>
      </li>
    </ul>
    
    <!-- <form name="pencarian" method="POST" action = "hasil_akhir.php" class="form-inline my-2 my-lg-0">  
          
      
          
              
                <tr>
                    <input type="text" placeholder="masukan nim" name="nim" title ="masukan nim" class="form-control mr-sm-2">  
                    
                    <button class="btn btn-outline-success my-2 my-sm-0" id="submit1" name="submit1" >Search</button>
                </tr>

          </form> -->
  </div>
</nav>

<?php


        if(isset($_POST['submit1'])){


      $nim = $_POST['nim'];

      foreach ($akses->CariMahasiswaBerdasarkanNimPadaPengumumanHasilSemprop($nim) as $key) {
        echo "
               <table align='center'>
        <tr>
        <td width='700px'>
        <div class='form-group'>
    <label for='formGroupExampleInput'>NIM </label>
    <input name='nim' value='$key[nim]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
    <label for='formGroupExampleInput'>NAMA </label>
    <input name='nama' value='$key[nama_mhs]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
  
    

 
       <label for='formGroupExampleInput'>NILAI </label>
    <input name='nim' value='$key[nilai]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
    <label for='formGroupExampleInput'>STATUS </label>
    <input name='nama' value='$key[status]' type='text' readonly class='form-control' id='formGroupExampleInput' placeholder='Example input'>
<br>
<tr>
<td>
    <a href='update_semrop.php?nim=$key[nim]' class='btn btn-primary btn-lg active' role='button' aria-pressed='true'>UPDATE</a>
<a href='delete_semprop.php?nim=$key[nim]' class='btn btn-primary btn-lg active' role='button' aria-pressed='true'>DELETE</a></td>
</tr>
   
     </div>
        </table>
        ";

    }
  }
      ?>


  </body>
</html>


