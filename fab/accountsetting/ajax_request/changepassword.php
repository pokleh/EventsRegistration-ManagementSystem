<?php
session_start();
include('connection.php');

$userID = $_POST['userID'];
$old = $_POST['old'];
$new_p = $_POST['new_p'];
$hashpash = password_hash($new_p,PASSWORD_BCRYPT,array('cost' => 10));
 
$select = "SELECT * FROM user_account WHERE userID = '$userID'";
$result = $connection->query($select);
$row = $result->fetch_assoc();
if(password_verify($old,$row['password']))
{
	

$update = "UPDATE  user_account SET password = '$hashpash' WHERE userID = '$userID'";
if($connection->query($update))
{	

	$_SESSION['change'] = "Password successfully change";
	echo "<script>

	window.location = '../myaccount';
	</script>";
}



}

else
{





echo "<script>
	
	$('.alert-danger').html('Old password didn`t match');
                        $('.alert-danger').show();
	
	</script>";






}

?>