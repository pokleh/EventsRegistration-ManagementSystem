<?php
session_start();
include('../connection.php');



$eventID = mysqli_escape_string($connection,$_POST['eventID']);
$cusID = mysqli_escape_string($connection,$_POST['userID']);
$choosenTheme = $_POST['choosenTheme'];
$request = $_POST['request'];
$startTime = $_POST['startTime'];
$startFor = $_POST['startFor'];
$endTime = $_POST['endTime'];
$endFor = $_POST['endFor'];
$eid = $_POST['eid'];



$update = "UPDATE reservedcustomer  SET request = '$request', theme = '$choosenTheme' , startTime = '$startTime' , startFor = '$startFor' , endTime ='$endTime' , endTimeFor = '$endFor' WHERE cusID = '$cusID' AND eventID = '$eventID' ";

if($connection->query("UPDATE packagechoices SET confirmStatus = 'ok' WHERE userID = '$cusID' AND eventID = '$eventID' AND status = 'ok' "))

{

}




if($connection->query($update))
{


	$update2 = "UPDATE foodchoice SET status ='approved' WHERE userID = '$cusID' AND eventID = '$eid'";
		if($connection->query($update2))
{

	$_SESSION['success'] = "Reservation successfully updated";

	
	echo "<script>
	window.location = 'editreservation?id=' + $eid;
	</script>";
}


}


?>