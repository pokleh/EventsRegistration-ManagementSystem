<?php
session_start();
include('../connection.php'); 

$userID = $_POST['userID'];

$newbDay = $_POST['newbDay'];




$update = "UPDATE  user_account SET birthDay = '$newbDay' WHERE userID = '$userID'";
if($connection->query($update))
{
	$_SESSION['change'] = "Birthday successfully updated";
	echo "<script>

	location.reload();

	</script>";
}
else
{

}


?>