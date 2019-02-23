<?php


include('connection.php');


 $id= $_POST['id'];

$delete = "DELETE FROM  foodChoice WHERE id = '$id' ";
if($connection->query($delete))
{
	
}
?>