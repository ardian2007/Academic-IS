<!DOCTYPE>  
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
      .kotak{
        width: 80%;
        height: 100%;
        background: rgba(0,0,0,.5);
        border-radius: 30px;
        padding-top: 20px;
        padding-bottom: 20px;
        box-shadow: 0px 0px 10px 4px #d1d1d1;
      }

      .clr{
        background: rgba(0,0,0,.5);
        box-shadow: 0px 0px 10px 1px #d1d1d1;
      }
      .navbar1{
        background-image: url(desain/navbar.jpg);
        background-position: center;
      }
      .bodyBG{
        background-position: 50%;
        background-image: url(desain/bguad.jpg);
      }
  </style>

    <title>MANAJEMEN SKRISPSI</title>
  </head>
<body >
<table width="100%" class="bgimage" height="10%">
  <tr align="left" class="border rounded">
    <td>
      <img src="desain/header.jpg">
    </td>
  </tr>
</table>
 
<table width="100%" height="10%">
  <tr align="">
    <td>
          <nav class="navbar navbar-expand-lg navbar-light bg-light navbar1 border rounded">
            <a class="navbar-brand" href="#"><img src="desain/Logo.png" class="mr-1 mt-1 rounded-circle" style="width:45px;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
  <div class="btn-group">
    <a class="mr-4 pt-2">HOME</a>
    <a class="btn btn-light ml-4 pt-2" href="index.php">ISI BIMBINGAN</a>
    <a class="btn btn-primary text-light" href="index_2.php">LOG BIMBINGAN</a>
  </div>
              </ul>
              <form class="form-inline my-2 my-lg-0" method="POST" action="index_2.php">
                <input name="nim" class="form-control mr-sm-2" type="search" placeholder="NIM" aria-label="Search">
                <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search NIM</button>
              </form>
            </div>
          </nav>
    </td>
   
  </tr>
</table>

<table width="100%" height="100%" class="bodyBG">

  <tr align="center">

    <td width="50%" rowspan="" class="pt-4">
      <main  class="kotak" >
        <?php 
            if(isset($_POST['nim'])){
            include 'daftar.php';
            }
        ?>
      </main>
    </td>

  </tr>

  <tr height="10%">
    <td >
        <center>
          <div class=" rounded pt-2 pb-2 bg-dark clr ml-4 mr-4 text-light">
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
