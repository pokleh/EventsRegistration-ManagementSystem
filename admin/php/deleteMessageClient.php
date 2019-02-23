<?php
session_start();
include('connection.php');


$id = $_POST['id'];




if($connection->query("UPDATE clientmessage SET deleteStatusAdmin = 'deleted' WHERE id = '$id'"))

{
	$_SESSION['sent'] = 'Message successfully deleted';
	echo "<script>
	window.location= 'customermessage';

	</script>";
}

?>