<?php
session_start();
include('../connection.php'); 

$userID = $_POST['userID'];

$newAddress = $_POST['newAddress'];

$userID = $_POST['userID'];

$resid = $_POST['resid'];
$contactNumber = $_POST['contactNumber'];

$update = "UPDATE  user_account SET address = '$newAddress' WHERE userID = '$userID'";
if($connection->query($update))
{


if($resid == 0)
{

	$_SESSION['change'] = "Address successfully updated";
	echo "<script>

	location.reload();

	</script>";
}

else
{
	if($contactNumber === "")
	{
		$_SESSION['change'] = "Address successfully updated";
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