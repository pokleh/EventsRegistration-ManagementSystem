<?php


include('connection.php');


 $id= $_POST['id'];

$delete = "DELETE FROM  packageincluded WHERE id = '$id' ";
if($connection->query($delete))
{
	
}
?>