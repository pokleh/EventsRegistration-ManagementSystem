<?php

include('connection.php');

$packID = $_POST['packID'];
$eventID = $_POST['eventID'];
$userID = $_POST['userID'];

$update = "UPDATE packagechoices SET status = 'not ok ' WHERE userID = '$userID' AND eventID = '$eventID' AND packageID = '$packID'";
if($connection->query($update))
{
	
}

?>