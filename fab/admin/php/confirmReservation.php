<?php
session_start();
include('connection.php');

$id = mysqli_escape_string($connection,$_POST['id']);

$update = "UPDATE reservedcustomer SET paymentStatus = 'complete' , paymentMethod='direct payment' , status = 'verified' WHERE id = '$id'";
if($connection->query($update))
{


	$_SESSION['complete'] = 'Reservation successfully confirmed';
	echo "<script>

	window.location ='pendingreservation';

	 </script>";
}


?>