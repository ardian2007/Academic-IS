<?php

include 'database.php';

$new = new Database();
$new->connect();

$id = $_GET['nim'];

$new->delete_data($id); 

?>