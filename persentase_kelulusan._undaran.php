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
		<h2>STATUS MAHASISWA PENDADARAN<br>-Analitik-<br/></h2>
	</center>
	<div class="container">
        <canvas id="gradu" ></canvas>
    </div>


	<script>
		var ctx = document.getElementById("gradu").getContext('2d');
		var data =
		{
    		labels: ["Laki - Laki", "Perempuan"],
    	    datasets: [
    	    	{
					label: '',
					data: [
						<?php 
							foreach($akses->undar_lulus_p() as $key){echo "$key[jumlah1]";}
						?>,
						<?php 
							foreach($akses->undar_tidaklulus() as $key){echo "$key[jumlah2]";}
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

	<table border="1">
		<?php
		foreach($akses->tampil_undar() as $key){
			echo "
				<tr>
					<td>$key[nim]</td>
					<td>$key[nama]</td>
					<td>$key[status]</td>

				</tr>
			";
		}
		?>
	</table>
</body>
</html>