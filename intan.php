<?php

include 'database.php';

$new = new Database();
$new->connect();
$new->delete_data($id); 

?>