<?php
session_start();

include('connection.php');
$username = $_SESSION['userName'];
  
 

$select = "select * from user_account where username='$username'";
$result = $connection->query($select);
$row = $result->fetch_assoc();
$userID = $row['userID'];
$fullName = $row['fullName'];
$address = $row['address']; 
$birthDay = $row['birthDay'];
$contactNumber = $row['contactNumber'];
$emailAddress = $row['emailAddress'];
$userName = $row['username'];
$class = $row['class'];



if(!isset($username))
{
	header("location:index");
}



?>