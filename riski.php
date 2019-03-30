<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table border="1">
		<tr>
			<th>
				nim
			</th>

			<th>
				nama
			</th>

			<th>
				dosen
			</th>

			<th>
				judul
			</th>

			<th>
				jumlah
			</th>

			<th colspan="2">
				action
			</th>
		</tr>
	<?php

	include 'database.php';

	$new = new Database();

	$new->connect();

	$variable = $new->jumlah_bimbingan_mahasiswa();

	foreach ($variable as $key) {
		echo "
		<tr>
			<td height='200px'>
				$key[nim]
			</td>

			<td>
				$key[name]
			</td>
				
			<td>
				$key[namdos]
			</td>
				
			<td>
				$key[judul]
			</td>
				
			<td>
				<form method='POST' action='Bimbingan2.php'>
				<input name='nim' type='text' value=$key[nim] hidden></input>
						<input type='submit' value=$key[jumlah_bimbingan] > </input>
				</form>
			</td>

			<td><a href='intan.php?nim=$key[nim]'>&#9003;</a></td>
			<td><a href='nur.php?nim=$key[nim]'>&#9998;</a></td>
		</tr>
		";
	}
	?>	
	</table>

</body>
</html>