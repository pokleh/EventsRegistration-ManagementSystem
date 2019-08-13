<?php
session_start();
include('connection.php');


$id = $_POST['id'];




if($connection->query("DELETE FROM theme WHERE id = '$id' "))

{
	$_SESSION['deleted'] = 'Theme successfully deleted';
	echo "<script>
	window.location= 'themes';

	</script>";
}

?>