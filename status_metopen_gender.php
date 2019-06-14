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
    		labels: ["Lulus", "Tidak Lulus"],
    	    datasets: [
    	    	{
					label: '',
					data: [
						<?php 
							foreach($akses->Status_mtp_lulus_p() as $key){echo "$key[jumlah_l]";}
							foreach($akses->Status_mtp_tidak_lulus_p() as $key){echo "$key[jumlah_tl]";}
						?>,
						<?php 
							foreach($akses->Status_mtp_lulus_l() as $key){echo "$key[jumlah_l]";}
							foreach($akses->Status_mtp_tidak_lulus_l() as $key){echo "$key[jumlah_tl]";}
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
	<br><br>
	<center>
	<table border="1" align="center">
		<h3 style="font-size = 30px"> Data Satus Mahasiswa Berdasarkan Jenis Kelamin </h3>
		<br><br>
		<tr>
			<td>Nama Mahasiswa</td>
			<td>Jenis Kelamin</td>
			<td>Status Metopen</td>
		</tr>
		<?php
		foreach($akses->tampil_mtp_gender() as $key){
			echo "
				<tr>
					<td>$key[nama]</td>
					<td>$key[gen]</td>
					<td>$key[status]</td>

				</tr>
			";
		}
		?>
	</table>
	</center>
</body>
</html>