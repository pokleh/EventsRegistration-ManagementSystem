<?php
session_start();
include('../connection.php'); 

$userID = $_POST['userID'];

$fName = $_POST['fName'];
$mName = $_POST['mName'];
$lName = $_POST['lName'];
$userID = $_POST['userID'];

$fullName = ucwords($fName . " " . $mName . " " . $lName);

$update = "UPDATE  user_account SET fullName = '$fullName' WHERE userID = '$userID'";
if($connection->query($update))
{
	$_SESSION['change'] = "Name successfully updated";
	echo "<script>

	location.reload();

	</script>";
}
else
{

}


?>