<?php

include('../connection.php');

$id = mysqli_escape_string($connection,$_POST['id']);

$update = "UPDATE reservedcustomer SET status='canceled' WHERE id = '$id'";
if($connection->query($update))
{
	
}

$delete = "DELETE FROM foodchoice WHERE eventID = '$id' ";

if($connection->query($delete))
{

}


$delete2 = "DELETE FROM packagechoices WHERE eventID = '$id' ";

if($connection->query($delete2))
{
	
}

?>