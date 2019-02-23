<?php
session_start();
include('connection.php');

$userID = $_POST['userID'];
$fullName = $_POST['fullName'];

 

$update = "UPDATE  user_account SET fullName = '$fullName' WHERE userID = '$userID'";
if($connection->query($update))
{	

	$_SESSION['change'] = "Fullname successfully change to " . ucwords($fullName);
	echo "<script>

	window.location = 'editaccount?id=' + $userID;
	</script>";
}



?>