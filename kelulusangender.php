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
		<h2>Mahasiswa Metopen berdasarkan Gender </br> -Analitik-</h2>
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
			type: 'pie',
			data: {
				labels: [<?php foreach($akses->jenis_kelamin() as $key){echo '"'.$key['jenis_kelamin'].'",';}?>],
				datasets: [{
					label: '',
					data: [
					<?php foreach($akses->jenis_kelamin() as $key){echo '"'.$key['total'].'",';} ?>,
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
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
	<div class="container">
		
	<br><br><br>
		<h2 align="center">Data Gender Mahasiswa</h2>
		<br><br>
	   <table class="table-striped" border="" width="200px" style="">
            <tr align="center">
              <th width="90px">Laki - Laki</th>
            </tr>
            <?php 
              foreach ($akses->total_lk() as $key) {
                echo "
                <tr>
                  	<td>$key[nama]</td>
                </tr>";
            	}
             ?>
            <br><br><br>
</table>
<table class="table-striped" border="1" width="200px" style="">
            <tr align="center">
              <th width="90px">Perempuan</th>
            </tr>
            <?php 
              foreach ($akses->total_pr() as $key) {
                echo "
                <tr>
                  	<td>$key[nama]</td>
                </tr>";
            	}
             ?>
            <br><br><br>
</table>
</div>
</body>
</html>