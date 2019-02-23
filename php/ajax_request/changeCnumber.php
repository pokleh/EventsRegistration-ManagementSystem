<?php
session_start();
include('../connection.php'); 

$userID = $_POST['userID'];

$contactNumber = $_POST['contactNumber'];

$userID = $_POST['userID'];

$resid = $_POST['resid'];
$newAddress = $_POST['newAddress'];


$update = "UPDATE  user_account SET contactNumber = '$contactNumber' WHERE userID = '$userID'";

if($connection->query($update))
{


if($resid == 0)
{

	$_SESSION['change'] = "Contact number successfully updated";
	echo "<script>

	location.reload();

	</script>";
}

else
{
	if($newAddress === "")
	{

		$_SESSION['change'] = "Contact number successfully updated";
	echo "<script>

	location.reload();


	</script>";
	}


	else
	{
	echo "<script>

	window.location = 'reserveevent?id=' + $resid;

	</script>";
}
}

}


?>