<?php
session_start();
include('php/connection.php');


$id = $_GET['id'];




if($connection->query("DELETE FROM theme WHERE id = '$id' "))

{
	$_SESSION['deleted'] = 'Theme successfully deleted';
	echo "<script>
	window.location= 'themes';

	</script>";
}

?>