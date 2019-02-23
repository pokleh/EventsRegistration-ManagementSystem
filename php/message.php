<?php
session_start();
include('connection.php');


$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];



if($connection->query("INSERT INTO messages(name,email,subject,message,status) VALUES ('$name','$email','$subject','$message','unread')"))

{
	$_SESSION['sent'] = 'sent';
	echo "<script>
	window.location= 'contact-us';

	</script>";
}

?>