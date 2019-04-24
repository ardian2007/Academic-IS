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
	<style type="text/css">
	body{
		font-family: roboto;
	}

	table{
		margin: 0px auto;
	}
	</style>
	<?php
	include "navbar.php"
	?>


	<center>
		<h2>GRAFIK WAKTU SEMINAR PROPOSAL<br>Seminar Proposal<br/>-Analitik-</h2>
	</center>



	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>

	<br/>
	<br/>

	<!--  -->


	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: [<?php foreach($akses->jumlah_seminar() as $key){echo '"'.$key['tanggal'].'",';}?>
		 ],
				datasets: [{
					label: '',
					data: [
					<?php 
						foreach($akses->jumlah_seminar() as $key){echo '"'.$key['jumlah'].'",';}
					?>,
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)'
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
</body>
</html>