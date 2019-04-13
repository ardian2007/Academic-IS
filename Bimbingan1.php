<?php  
  include 'database.php';
  $car = new Database();
  $car->connect();

  include 'auto_send.php';

?>
<!DOCTYPE>  
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- include navbar -->
<link rel="stylesheet" type="text/css" href="css/style_penjadwalan.css">
<link rel="stylesheet" type="text/css" href="css/switches_penjadwalan.css">
<link rel="stylesheet" type="text/css" href="css/tombol_Penjadwalan.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
  <style>
      body {
          position: relative; 
      }
      img {
        max-width: 100%; 
        height: auto; 
      }
      .bgimage{
        background-image: url(desain/nav.jpg);
      }
      .navbar1{
        background-image: url(desain/navbar.jpg);
        background-position: center;
      }
      .kotak{
        width: 80%;
        height: 100%;
        background: rgba(0,0,0,.5);
        border-radius: 30px;
        padding-top: 20px;
        padding-bottom: 20px;
        box-shadow: 0px 0px 10px 4px #d1d1d1;
      }

      .clr
      {
        box-shadow: 0px 0px 10px 4px #d1d1d1;
        background: rgba(0,0,0,.25);
      }
      .bodyBG{
        background-position: 50%;
        background-image: url(desain/bguad.jpg);
      }
  </style>

    <title>MANAJEMEN SKRISPSI</title>
  </head>
<body>

<!-- <table width="100%" class="bgimage" height="10%">
  <tr align="left" class="border rounded">
    <td>
      <img src="desain/header.jpg">
    </td>
  </tr>
</table> -->
 
<!-- <table width="100%" height="10%">
  <tr align="">
    <td>
          <nav class="navbar navbar-expand-lg navbar-light bg-light navbar1  border rounded">
            <a class="navbar-brand" href="#"><img src="desain/Logo.png" class="mr-1 mt-1 rounded-circle" style="width:45px;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button ml-4>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
  <div class="">
    <a class="pt-0 mr-5 ml-3 btn btn-success" href="Bimbingan1.php">HOME</a>
  </div>
              </ul>
              <form class="form-inline my-2 my-lg-0" method="POST" action="Bimbingan1.php">
                <input name="cari" class="form-control mr-sm-2" type="search" placeholder="NIM" aria-label="Search" required="">
                <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">&telrec;</button>
              </form>
            </div>
          </nav>
    </td>
   
  </tr>
</table> -->

<?php
include 'templates/navbar_mhs.html';
?>

<table width="100%" height="100%" class="bg-light bodyBG">

  <tr align="center">

    <td width="50%" rowspan="" class="pt-4 pb-4">
      <main  class="kotak" >

        <?php 
           
            
            if(isset($_POST['nim'])){
            include 'Bimbingan1.1.php';
            }
            else if(isset($_POST['cari']))
            {

              echo '
<div class="container">

          <h2>Log Bimbingan Skripsi</h2>
          <p>berikut merupakan dafar riwayat bimbingan mahasiswa : </p>            
          <table class="table table-light table-stripe" align="center">
            <thead>
              <tr align="center" class="bg-secondary" >
                <th  class="align-middle ">NAMA</th>
                <th class="align-middle ">NIM</th>
                <th class="align-middle">DOSEN PEMBIMBING</th>
                <th class="align-middle">JUDUL SKRIPSI / METOPEN</th>
                <th class="align-middle">JUMLAH BIMBINGAN SKRIPSI DAN METOPEN</th>
                <th colspan="2" class="align-middle">ACTION</th>
              </tr>
            </thead>
            <tbody align="center">

              ';
              

                  $g = $car->jumlah_bimbingan_mahasiswa_hasil_search($_POST['cari']); // untuk menampilkan daftar atau log bimbingan satu mahasiswa

                  foreach($g as $key)
                  {
                    if("$key[model]"=="metopen")
                    {
                      echo"
                      <tr class='bg-success'>
                        <td>$key[name]</td>
                        <td>$key[nim]</td>
                        <td>$key[namdos]</td>
                        <td>$key[judul]</td>
                       
                        <td>
        <form method='POST' action='Bimbingan2.php'>
        <input name='nim' type='text' value=$key[nim] hidden></input>
            <input type='submit' class='btn btn-primary' value=$key[jumlah_bimbingan] > </input>
        </form>
      </td>
 <td>
 <form method='POST' action='Bimbingan1.php'>
        <input name='nim' type='text' value=$key[nim] hidden></input>
            <input type='submit' class='btn btn-primary' value='tambah bimbingan' > </input>
        </form>
      </td>

                      </tr>
                    ";
                    }
                    else
                    {
                      echo"
                      <tr class='bg-primary'>
                        <td>$key[name]</td>
                        <td>$key[nim]</td>
                        <td>$key[namdos]</td>
                        <td>$key[judul]</td>

                        <td>
        <form method='POST' action='Bimbingan2.php'>
        <input name='nim' type='text' value=$key[nim] hidden></input>
            <input type='submit' class='btn btn-success' value=$key[jumlah_bimbingan] > </input>
        </form>
      </td>
<td>
 <form method='POST' action='Bimbingan1.php'>
        <input name='nim' type='text' value=$key[nim] hidden></input>
            <input type='submit' class='btn btn-success' value='tambah bimbingan' > </input>
        </form>
      </td>

                      </tr>
                    ";
                    }
                    
                  }
              echo '
            </tbody>
          </table>
        </div> 
        <div align="left" class="ml-4">
        ket : <br>
        -hijau = metopen<br>
        -biru  = skripsi
        </div>
        ';              
            }
            else
            {
              echo '
<div class="container">

          <h2>Log Bimbingan Skripsi</h2>
          <p>berikut merupakan dafar riwayat bimbingan mahasiswa : </p>            
          <table class="table table-light table-stripe" align="center">
            <thead>
              <tr align="center" class="bg-secondary" >
                <th  class="align-middle ">NAMA</th>
                <th class="align-middle ">NIM</th>
                <th class="align-middle">DOSEN PEMBIMBING</th>
                <th class="align-middle">JUDUL SKRIPSI / METOPEN</th>
                <th class="align-middle">JUMLAH BIMBINGAN SKRIPSI DAN METOPEN</th>
                <th colspan="2" class="align-middle">ACTION</th>
              </tr>
            </thead>
            <tbody align="center">

              ';
              

                  $g = $car->jumlah_bimbingan_mahasiswa(); // untuk menampilkan daftar atau log bimbingan satu mahasiswa

                  foreach($g as $key)
                  {
                    if("$key[model]"=="metopen")
                    {
                      echo"
                      <tr class='bg-success'>
                        <td>$key[name]</td>
                        <td>$key[nim]</td>
                        <td>$key[namdos]</td>
                        <td>$key[judul]</td>
                       
                        <td>
        <form method='POST' action='Bimbingan2.php'>
        <input name='nim' type='text' value=$key[nim] hidden></input>
            <input type='submit' class='btn btn-primary' value=$key[jumlah_bimbingan] > </input>
        </form>
      </td>
 <td>
 <form method='POST' action='Bimbingan1.php'>
        <input name='nim' type='text' value=$key[nim] hidden></input>
            <input type='submit' class='btn btn-primary' value='tambah bimbingan' > </input>
        </form>
      </td>

                      </tr>
                    ";
                    }
                    else
                    {
                      echo"
                      <tr class='bg-primary'>
                        <td>$key[name]</td>
                        <td>$key[nim]</td>
                        <td>$key[namdos]</td>
                        <td>$key[judul]</td>

                        <td>
        <form method='POST' action='Bimbingan2.php'>
        <input name='nim' type='text' value=$key[nim] hidden></input>
            <input type='submit' class='btn btn-success' value=$key[jumlah_bimbingan] > </input>
        </form>
      </td>
<td>
 <form method='POST' action='Bimbingan1.php'>
        <input name='nim' type='text' value=$key[nim] hidden></input>
            <input type='submit' class='btn btn-success' value='tambah bimbingan' > </input>
        </form>
      </td>

                      </tr>
                    ";
                    }
                    
                  }
              echo '
            </tbody>
          </table>
        </div> 
        <div align="left" class="ml-4">
        ket : <br>
        -hijau = metopen<br>
        -biru  = skripsi
        </div>
        ';
            }
        ?>

      </main>
    </td>

  </tr>

  <tr height="10%">
    <td colspan="3">
        <center>
          <div class=" rounded pt-2 pb-2 bg-secondary ml-4 mr-4 clr text-light">
            <font size="2" face="arial">
              Copyright &copy; Programmer-fitur-Bimbingan-Skripsi UAD 2019
            </font> 
          </div>
        </center>
    </td>
  </tr>


</table>
</body>
</HTML>
