<?php

include('../connection.php');

$eventID = mysqli_escape_string($connection,$_POST['eventID']);
$userID = mysqli_escape_string($connection,$_POST['userID']);
$comment = mysqli_escape_string($connection,$_POST['comment']);

$stmt = "INSERT INTO comment (eventID,userID,comment,status) VALUES ('$eventID','$userID','$comment','pending')";
if($connection->query($stmt))
{
	echo "<script>
	alert('Your comment successfully submitted');
	$('#comment').val('');
	</script>";
}
else
{
	echo "error";
}

?>