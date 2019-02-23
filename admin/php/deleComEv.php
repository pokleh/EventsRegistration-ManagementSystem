<?php
session_start();
include('connection.php');


$id = $_POST['id']; 




if($connection->query("DELETE FROM completedevents WHERE id = '$id' "))

{
	
	if($connection->query("DELETE FROM completedeventsimg WHERE eventID = '$id'"))

{
	$_SESSION['info'] = 'Event successfully deleted';
	echo "<script>
	window.location= 'completedevents';

	</script>";
}
}

?>