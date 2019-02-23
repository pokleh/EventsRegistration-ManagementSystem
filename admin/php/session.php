<?php
session_start();

include('connection.php');
  
$ses_username=$_SESSION['userName'];

$SELECT="SELECT * FROM user_account WHERE username='$ses_username'";
$result=$connection->query($SELECT);

$row=$result->fetch_assoc();

$username=$row['username'];
$uid=$row['userID'];
$fullName= $row['fullName'];


if(!isset($username))
{
	header("location:../../index");
	mysqli_close();


}
?>