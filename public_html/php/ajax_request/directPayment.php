<?php
session_start();
include('../connection.php');

$id = mysqli_escape_string($connection,$_POST['id']);

$update = "UPDATE reservedcustomer SET paymentMethod = 'direct payment', paymentStatus = 'incomplete' , status = 'pending' WHERE id = '$id' ";
if($connection->query($update))
{
	
	$_SESSION['verified'] = 'verified';
	echo "<script>

window.location = 'myreservation';

	</script>";
}



?>