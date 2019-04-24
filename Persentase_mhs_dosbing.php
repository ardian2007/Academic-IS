<!DOCTYPE html>
<html>

<?php 
	include "Class_Analitik.php";
	$akses = new Analitik();
	$akses->connect();
 ?>

<head>
	<title>Grafik</title>
	<script type="text/javascript" src="chartjs/Chart.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/Style.css">
</head>
<body>
	<?php 
		include 'navbar.php';
	?>

	<style type="text/css">
	body{
		font-family: roboto;
	}

	table{
		margin: 0px auto;
	}
	</style>


	<center>
		<h2>Grafik Dosen Pembimbing  </br> -Analitik-</h2>
	</center>



	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>

	<br/>
	<br/>

	<script>
		var i;
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: [<?php foreach($akses->jumlah_ampu_bimbingan() as $key){echo '"'.$key['dos_bing'].'",';}?>],
				datasets: [{
					label: '',
					data: [
					<?php 
						foreach($akses->jumlah_ampu_bimbingan() as $key){echo '"'.$key['jumlah_ampu'].'",';}
					?>,
					],
					
					backgroundColor: [
					
							'rgba(255, 99, 132, 0.2)',
							'rgba(80, 99, 132, 0.2)',
							'rgba(255, 20, 132, 0.2)',
							'rgba(255, 255, 144, 0.2)',
							'rgba(190, 20, 56, 0.2)',
							'rgba(255, 150, 255, 0.2)'
							
					],
					borderColor: [

							'rgba(255, 99, 132, 0.2)',
							'rgba(80, 99, 132, 0.2)',
							'rgba(255, 20, 132, 0.2)',
							'rgba(255, 255, 144, 0.2)',
							'rgba(190, 20, 56, 0.2)',
							'rgba(255, 150, 255, 0.2)'

					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
		<br><br><br>
		<h2 align="center">Data Dosen Pembimbing</h2>
		<br><br>
	   <table border="1" width="1000px">
            <tr align="center">
              <th width="300px">Dosen</th>
              <th>Bidang</th>
              <center><th>Mhs bimbingan</th></center>
            </tr>
            <?php 
              foreach ($akses->profil_dosbing() as $key) {
                echo "
                <tr>
                  <td>$key[Dosen_pembimbing]</td>
                  <td>$key[Bidang]</td>
                  <td>$key[Jumlah_Mhs_Diampu]</td>
                </tr>
                ";
              }
             ?>
</table>

</body>
</html>