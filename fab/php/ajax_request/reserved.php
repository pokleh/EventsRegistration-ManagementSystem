<?php

include('../connection.php');

$eventID = mysqli_escape_string($connection,$_POST['eventID']);
$cusID = mysqli_escape_string($connection,$_POST['cusID']);
$date = mysqli_escape_string($connection,$_POST['date']);

$packs = mysqli_escape_string($connection,$_POST['packs']);
$status = "pending";



$stmt = $connection->prepare("INSERT INTO reservedcustomer(cusID,eventID,dateReserved,packs,status) VALUES (?,?,?,?,?) ");
$stmt->bind_param("iisis",$cusID,$eventID,$date,$packs,$status);
if($stmt->execute())
{
	echo "<script>
	window.location = 'myreservation';
	</script>";
}


?>