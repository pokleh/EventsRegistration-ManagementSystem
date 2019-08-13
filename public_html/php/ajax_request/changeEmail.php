<?php
session_start();
include('../connection.php'); 

$userID = $_POST['userID'];

$emailAddressT = $_POST['emailAddressT'];

$userID = $_POST['userID'];


$update = "UPDATE  user_account SET emailAddress = '$emailAddressT' WHERE userID = '$userID'";
if($connection->query($update))
{
	$_SESSION['change'] = "Email address successfully updated";
	echo "<script>

	location.reload();

	</script>";
}
else
{

}


?>