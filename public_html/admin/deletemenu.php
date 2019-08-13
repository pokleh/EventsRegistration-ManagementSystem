<?php
session_start();
include('php/connection.php');


$id = $_GET['id'];




if($connection->query("DELETE FROM menu WHERE menuID = '$id' "))

{
	$_SESSION['deleted'] = 'Menu successfully deleted';
	echo "<script>
	window.location= 'menu';

	</script>";
}

?>