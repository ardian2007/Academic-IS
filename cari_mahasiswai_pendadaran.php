<?php include 'templates/header_Penjadwalan.php' ?>

    <?php include 'templates/navbar_admin.html' ?>
   
    <!-- Content -->
        <div class="container"> 
            <!-- Box -->
            <div class="row mt-5 ">
                <div class="col-2">
                </div>
                <div class="col-8 box2 bg-two">
                    <div class="row">
                        <div class="col-10 mt-3 mb-3">
                            <p class="judul">Ujian Pendadaran</p>
                        </div>
                    </div>
                    <form action="hasil_pencarian_PD_diadmin.php" method="POST">
                        <div class="row">
                            <div class="col-2 ml-3 pt-1">
                                <p class="pone">NIM :</p>
                            </div>
                            <div class="col-6">
                                <input type="text" name='nim' placeholder='Masukkan NIM' class="form-control in-box" name="nim">
                            </div>
                            <div class="col-2 mb-5">
                                <button type="submit" name="submit11" value="Submit" class="butn butn2 ml-2" >Search
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-2 ">
            </div>
        </div>
        

<?php include 'templates/footer_Penjadwalan.php' ?>
