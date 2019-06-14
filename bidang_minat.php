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
		<h2>GRAFIK BIDANG MINAT <br> -Analitik- </br></h2>
	</center>



	<div style="width: 500px;margin: 100px auto;">
		<canvas id="myChart"></canvas>
	</div>

	<br/>
	<br/>

	<!--  -->


	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'pie',
			// data: {
			// 	labels: ["sistemcerdas"],
			// 	datasets: [{
			// 		label: '',
			// 		data: [
			// 		<?php 
			// 		foreach($akses->getsistemcerdas() as $k){
			// 		echo" $k[jumlah_bidang_minat1]"; 
			// 		}?>,
			// 		],
							data: {
					labels: [<?php foreach($akses->getbidangminat() as $k){echo '"'.$k['bidang_minat'].'",';}?>],
					datasets: [{
					label: '',
					data: [
					<?php 
						foreach($akses->getbidangminat() as $k){echo '"'.$k['jumlah_bidang_minat1'].'",';}
					?>,
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(20, 26, 255, 0.2)',
					'rgba(255, 206, 255, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(18, 99, 10, 1)',
					'rgba(25, 255, 186, 1)',
					'rgba(100, 60, 86, 1)'					],
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
		<br><br>
		<h2 align="center">Data sistem cerdas</h2>
		<br><br>
	   <table border="1" width="1000px">
            <tr align="center">
              <th width="300px">Nama Mahasiswa</th>
              <center><th>Bidang Minat</th></center>
            </tr>
            
            <?php
              foreach($akses->getbidangminatall() as $k) {
                echo "
                <tr>
                 <td>$k[nama]</td>
                 <td>$k[bidang_minat]</td>
                
                </tr>
                ";
              }
             ?>
</body>
</html>