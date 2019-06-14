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
	<center>
		<h2>PERSENTASE KELULUSAN DITIAP PRODI<br>-Analitik-<br/></h2>
	</center>
	<div class="container">
        <canvas id="gradu" ></canvas>
    </div>


	<script>
		var ctx = document.getElementById("gradu").getContext('2d');
		var data =
		{
    		labels: [<?php 
							foreach($akses->nama_prodi() as $key){echo '"'.$key['nama'].'",';}
						?>],
    	    datasets: [
    	    	{
					label: '',
					data: [
						<?php 
							foreach($akses->jml_mhs_lulus_semprop_prodi() as $key){echo '"'.$key['jumlah'].'",';}
						?>
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