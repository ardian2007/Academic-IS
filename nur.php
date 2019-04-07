<?php

include 'database.php';

$new = new Database();
$new->connect();

$theId = $_GET[''];

$wow = $new->getLogBimbingan($theId);

if(isset($_POST['saveTis']))
{
	$materi_bimbingan=$_POST[''];
	$tanggal_bimbingan=$_POST[''];
	$jam=$_POST[''];
	$id_logbook=$theId;

	$new->update_data ($materi_bimbingan,$tanggal_bimbingan,$jam,$id_logbook); 
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="nur.php" method="POST">
<?php
	foreach ($wow as $key) {
		echo "
			<input type='text' name='nama'><br>
			<input type='text' name='nim'><br>
			<input type='text' name='dosbing'><br>
			<input type='text' name='judul'><br>


			<input type='text' name='jam'><br>
			<input type='text' name='materi'><br>

			<input type='submit' value='simpan perubahan' name='saveThis'>
			";
	}
?>
</form>
</body>
</html>