<?php
session_start();
include('connection.php');

$userID = $_POST['userID'];
$contactNumber = $_POST['contactNumber'];

 

$update = "UPDATE  user_account SET contactNumber = '$contactNumber' WHERE userID = '$userID'";
if($connection->query($update))
{	

	$_SESSION['change'] = "Contact number successfully change to " . ucwords($contactNumber);
	echo "<script>

	window.location = 'editaccount?id=' + $userID;

	</script>";
}



?>