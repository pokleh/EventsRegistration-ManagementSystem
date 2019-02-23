<?php


include('connection.php');


$subject = $_POST['subject'];
$message = $_POST['message'];
$userid = $_POST['userid'];


if($connection->query("INSERT INTO clientmessage (userID,subject,message,status) VALUES ('$userid','$subject','$message','unseen')"))
{

	echo "<script>

		alert('Message successfully sent');
		location.reload();

	</script>";

}

?>