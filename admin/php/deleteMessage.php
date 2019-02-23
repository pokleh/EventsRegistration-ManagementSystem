<?php
session_start();
include('connection.php');


$id = $_POST['id'];




if($connection->query("DELETE FROM messages WHERE id = '$id' "))

{
	$_SESSION['sent'] = 'Message successfully deleted';
	echo "<script>
	window.location= 'messages';

	</script>";
}

?>