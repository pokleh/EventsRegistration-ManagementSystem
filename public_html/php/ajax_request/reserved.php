<?php

include('../connection.php');

$eventID = mysqli_escape_string($connection,$_POST['eventID']);
$cusID = mysqli_escape_string($connection,$_POST['cusID']);
$date = mysqli_escape_string($connection,$_POST['date']);

$packs = mysqli_escape_string($connection,$_POST['packs']);
$status = "pending";
$choosenTheme = $_POST['choosenTheme'];
$request = $_POST['request'];

$startTime = $_POST['startTime'];
$startFor = $_POST['startFor'];
$endTime = $_POST['endTime'];
$endFor = $_POST['endFor'];




if($connection->query("UPDATE packagechoices SET confirmStatus = 'ok' WHERE userID = '$cusID' AND eventID = '$eventID' AND status = 'ok' "))

{

}


$stmt = $connection->prepare("INSERT INTO reservedcustomer(cusID,eventID,request,theme,dateReserved,packs,status,startTime,startFor,endTime,endTimeFor) VALUES (?,?,?,?,?,?,?,?,?,?,?) ");
$stmt->bind_param("iisssisssss",$cusID,$eventID,$request,$choosenTheme,$date,$packs,$status,$startTime,$startFor,$endTime,$endFor);
if($stmt->execute())
{


	$update = "UPDATE foodchoice SET status ='approved' WHERE userID = '$cusID' and eventID = '$eventID'";
		if($connection->query($update))
{

	echo "<script>
	window.location = 'myreservation';
	</script>";
}

}


?>