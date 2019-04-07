<?php
include 'database.php';

$var = new Database();

$var->connect();

$ancas = $var->niy();

foreach ($ancas as $key ) {
	if("$key[niy]"%2==0)
	{
		echo "genap <br>";
	}
	else
	{
		echo "ganjil <br>";
	}
}
?>