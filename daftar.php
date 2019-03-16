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

        <div class="container">

          <h2>Log Bimbingan Skripsi</h2>
          <p>berikut merupakan dafar riwayat bimbingan mahasiswa : </p>            
          <table class="table table-light table-stripe" align="center">
            <thead>
              <tr align="center" class="bg-secondary" >
                <th rowspan="2" class="align-middle ">NAMA</th>
                <th rowspan="2" class="align-middle ">NIM</th>
                <th rowspan="2" class="align-middle">DOSEN PEMBIMBING</th>
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
              include 'class_bs.php';

              $car = new Bimbingan_skripsi();
              $car->connect();
              $malaria = $_POST['nim'];
              $ulala=$car->show_data($malaria); // sebagai pendeteksi saja
              if($malaria==NULL || !$ulala)
              {
                echo "<center><div class='alert alert-secondary' role='alert'>SILAHKAN MASUKKAN NIM
                      </div></center>";
              }
              else
              {
                  $id = $_POST['nim'];
                  $g = $car->select_one_mahasiswa($id); // untuk menampilkan daftar atau log bimbingan satu mahasiswa

                  foreach($g as $key)
                  {
                    echo"
                      <tr class='bg-primary'>
                        <td>$key[namaa]</td>
                        <td>$key[Nm]</td>
                        <td>$key[namdis]</td>
                        <td>$key[materi_bimbingan]</td>
                        <td>$key[tanggal_bimbingan]</td>
                        <td>$key[jam]</td>
                      </tr>
                    ";
                  }
              }
              ?>
            </tbody>
          </table>
        </div>
    </td>
  </tr>
    
</table>

</body>
</html>
