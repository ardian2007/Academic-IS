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
		<h2>GRAFIK PENGGUNAAN RUANGAN<br>Pendadaran & Seminar Proposal<br/>-Analitik-</h2>
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
				labels: ["Ruangan 1", "Ruangan 2", "Ruangan 3"],
				datasets: [{
					label: '',
					data: [
					<?php 
					foreach($akses->getruang1() as $k){
					echo" $k[jumlah1]"; 
					}?>,
					<?php 
					foreach($akses->getruang2() as $k){
					echo" $k[jumlah2]"; 
					}?>,
					<?php 
					foreach($akses->getruang3() as $k){
					echo" $k[jumlah3]"; 
					}?>,
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)'
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