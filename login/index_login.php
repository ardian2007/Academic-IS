<?php 
    if(isset($_GET['code'])){
        echo '<script type="text/javascript">alert("Hubungi Pengelola secara Langsung")</script>';
          header('Refresh: 0 URL=index_login.php');
    }
         include 'templates/header_penjadwalan.php';
 ?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="css/style.css">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Log-in</title>
       <script type="text/javascript">
        function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
    </script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
      
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                </li>
                <li class="nav-item">
                    
                </li>
            </ul>

        </div>
    </div>
</nav>
  <form method='POST' action='index_login2.php'>
<main class="login-form">
  
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="http://uad.ac.id"><img src="logo_uad.png" height=50px></a> Manajemen Skripsi UAD</div>
                    <div class="card-body">
                        <?php 
                            if(isset($_GET['fail'])){
                                echo"<center><p class=text-danger>Kesalahan saat login, silahkan ulangi lagi</p></center>";
                            }
                        ?>
                 
                        <form action="" method="">
                            <div class="form-group row">
                                
                                <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>
                                <div class="col-md-6">
                                    <input type="text" id="username" class="form-control" name="username">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password">
                                    <input type="checkbox" onclick="myFunction()">Show Password
                                </div>
                            </div>

                           

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                               
                               <a href="input.php" class="btn btn-link">
                                    Register Metopen
                                </a>

                                <a href="index_login.php?code='mayday'" class="btn btn-link">
                                    Lupa password?
                                </a>
                                
                            </div>
                            
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>

</form>





</body>
</html>
<?php include 'templates/header_penjadwalan.php';?>