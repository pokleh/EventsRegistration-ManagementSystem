<?php

include('connection.php');

$id = mysqli_escape_string($connection,$_POST['id']);

$update = "UPDATE reservedcustomer SET status='canceled' WHERE id = '$id'";
if($connection->query($update))
{
	
}


?>