<?php
session_start();
include('connection.php');

$userID = $_POST['userID'];
$address = $_POST['address'];

 
 
$update = "UPDATE  user_account SET address = '$address' WHERE userID = '$userID'";
if($connection->query($update))
{	

	$_SESSION['change'] = "Address successfully change to " . ucwords($address);
	echo "<script>

	window.location = 'editaccount?id=' + $userID;
	</script>";
}



?>