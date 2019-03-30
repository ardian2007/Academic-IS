<?php

include 'database.php';
$var = new Database();
$var->connect();




?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="rifal.php" method="POST">
	<input type="text" name="nma">
	<input type="submit" name="in" value="cari">
</form>

<?php

if(isset($_POST['in']))
{
	$nma = $_POST['nma'];
	$io = $var->mencari_mhs_dgn_dos_yg_sama($nma);

	foreach ($io as $key) {
		echo "
			$key[namaa] | $key[Nm] | $key[judul] | $key[materi] | $key[tanggal] | <br>
		";
	}
}



?>

</body>
</html>