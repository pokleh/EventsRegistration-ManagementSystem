<?php
session_start();
include('connection.php');


$id = $_POST['id'];




if($connection->query("DELETE FROM events WHERE id = '$id' "))

{




	
	$_SESSION['update'] = 'Event successfully deleted';
	echo "<script>
	window.location= 'events';

	</script>";
}


?>