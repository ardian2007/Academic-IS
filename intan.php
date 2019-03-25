<?php

include 'Database.php';

$new = new Database();
$new->connect();
$new->delete_data($id); 

?>