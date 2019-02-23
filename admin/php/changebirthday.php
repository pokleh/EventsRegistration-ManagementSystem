<?php
session_start();
include('connection.php');

$userID = $_POST['userID'];
$birthday = $_POST['birthday'];

 

$update = "UPDATE  user_account SET birthDay = '$birthday' WHERE userID = '$userID'";
if($connection->query($update))
{	

	$_SESSION['change'] = "Birthday successfully change to " . ucwords($birthday);
	echo "<script>

	window.location = 'editaccount?id=' + $userID;
	</script>";
}



?>