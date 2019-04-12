<!DOCTYPE html>
<html>
<head>

	<title>coba</title>
</head>

<body>

	<table>
		<!-- <tr>
			<td>Jumlah</td>
		</tr> -->
		<?php
		include "database.php";
	$akses = new Database();
	$akses->connect(); 
		foreach($akses->getruang2() as $k){
			
				echo" $k[jumlah]"; 
			
		 }	 ?>
	</table>

</body>
</html>