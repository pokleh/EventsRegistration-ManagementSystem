<?php

include('connection.php');

$userID = $_POST['userID'];
$fullName = $_POST['fullName'];



$update = "UPDATE  user_account SET fullName = '$fullName' WHERE userID = '$userID'";
if($connection->query($update))
{
	echo "string";
}
else
{
	echo "error";
}
echo "error";

?>