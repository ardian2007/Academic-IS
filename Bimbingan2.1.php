<?php
include 'database.php';
$car = new Database();
$car->connect();


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title></title>
  </head>
<body>

<table width="100%" height="100%" cellpadding="20">
  <tr>
    <td>

          <h2 align="center">Log Bimbingan Skripsi</h2>
          <?php
          $id = $_POST['nim'];
          $use = $car->getHeaderLogbimbingan($id);
          foreach ($use as $key) {
            # code...
          echo "
          <div class='ml-4 pb-4 pt-5'>
            <table>
            <tr>
              <strong>
                <th>Nama Mahasiswa</th>
                <th align='center'> :</th>
                <th>$key[nama]</th>
              </strong>
            </tr>
            <tr>
              <strong>
                <th>Nomer Induk Mahasiswa</th>
                <th align='center'> :</th>
                <th>$key[nim]</th>
              </strong>
            </tr>
            <tr>
              <strong>
                <th>Dosen Pembimbing Mahasiswa</th>
                <th align='center'> :</th>
                <th>$key[namdos]</th>
              </strong>
            </tr>
          </table>         
        </div>
          ";
          }
          ?>
        <div class="container">

          <table class="table table-light table-stripe tp-2" align="center">
            <thead>
              <tr align="center" class="bg-secondary" >
                <th rowspan="2" class="align-middle">MATERI BIMBINGAN</th>
                <th colspan="6" align="center">WAKTU BIMBINGAN</th>
              </tr>
              <tr align="center" class="bg-secondary">
                <th align="center" colspan="">tanggal</th>
                <th align="center">jam mulai</th>
              </tr>
              <tr>
              </tr>
            </thead>
            <tbody align="center">

              <?php
              
              $malaria = $_POST['nim'];
              $ulala=$car->show_data($malaria); // sebagai pendeteksi saja
              if($malaria==NULL || !$ulala)
              {
//              echo "<center><div class='alert alert-secondary' role='alert'>SILAHKAN MASUKKAN NIM</div></center>";
              }
              else
              {
                  $id = $_POST['nim'];
                  $g = $car->select_one_mahasiswa($id); // untuk menampilkan daftar atau log bimbingan satu mahasiswa

                  foreach($g as $key)
                  {
                    if("$key[model]"=="metopen")
                    {
                    echo"
                      <tr class='bg-success'>
                        <td>$key[materi_bimbingan]</td>
                        <td>$key[tanggal_bimbingan]</td>
                        <td>$key[jam]</td>
                      </tr>
                    ";
                    }
                    else
                    {
                    echo"
                      <tr class='bg-primary'>
                        <td>$key[materi_bimbingan]</td>
                        <td>$key[tanggal_bimbingan]</td>
                        <td>$key[jam]</td>
                      </tr>
                    ";
                  }
                  }
              }
              ?>
            </tbody>
          </table>
        </div>
        <div align="left" class="ml-4">
        ket : <br>
        -hijau = metopen<br>
        -biru  = skripsi
        </div>
    </td>
  </tr>
    
</table>

</body>
</html>
