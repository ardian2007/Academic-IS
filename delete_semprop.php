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
    
    <form name="pencarian" method="POST" action = "cari_mahasiswa_dipengunguman.php" class="form-inline my-2 my-lg-0">  
          
      
          
              
                <tr>
                    <input type="text" placeholder="masukan nim" name="nim" title ="masukan nim" class="form-control mr-sm-2">  
                    
                    <button class="btn btn-outline-success my-2 my-sm-0" id="submit1" name="submit1" >Search</button>
                </tr>

          </form>
  </div>
</nav>

<?php

$nim=$_GET['nim'];

$akses->DeleteDataSemprop($nim);
      
    echo"
 <table align='center'>
    <tr >
    <td width='50%' class='alert alert-success' role='alert'>
    <h4 class='alert-heading' align='center'> <br></h4>
    <h4 class='alert-heading' align='center'> <br></h4>
    <h4 class='alert-heading' align='center'> </h4>
  <h4 class='alert-heading' align='center'>Well done!</h4>
  <p align='center'>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
  <hr>
  <p class='mb-0' align='center'>Whenever you need to, be sure to use margin utilities to keep things nice and tidy.<br><br></p>

</td>
</tr>
</table>
";

       
      ?>


  </body>
</html>


