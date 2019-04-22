<!DOCTYPE html>
<html>

<?php 
	include "database.php";
	$akses = new Database();
	$akses->connect();
 ?>


<head>
	<title>Grafik</title>
	<script type="text/javascript" src="chartjs/Chart.js"></script>
	<style type="text/css">
	body{
		font-family: roboto;
	}
	.container{
        width: 25%;
        margin: 10px auto;
    }
	</style>
</head>
<body>
	<?php 
		include 'navbar.php';
	?>
	<div class="container">
        <canvas id="gradu" width="100" height="100"></canvas>
    </div>

	<center>
		<h2>PERSENTASE KELULUSAN<br>-Analitik-<br/></h2>
	</center>

	<script>
		var ctx = document.getElementById("gradu").getContext('2d');
		var data =
		{
    		labels: ["Lulus", "Tidak Lulus"],
    	    datasets: [
    	    	{
					label: '',
					data: [
						<?php 
							foreach($akses->lulus() as $key){echo "$key[jml_lulus]";}
						?>,
						<?php 
							foreach($akses->tidaklulus() as $key){echo "$key[jml_tdk_lulus]";}
						?>,
					],
					backgroundColor: [
						'rgba(0, 0, 255, 0.5)',
						'rgba(255, 0, 0, 0.5)'
					]
    	        }
    	    ]
        };
		var myChart = new Chart(ctx, {type: 'pie', data: data, options: {responsive : true}});
	</script>
</body>
</html>