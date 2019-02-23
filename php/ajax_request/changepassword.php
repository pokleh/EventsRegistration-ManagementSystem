<?php
session_start();
include('../connection.php'); 

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

	$_SESSION['change'] = "Password successfully updated";
	echo "<script>

location.reload();
	</script>";
}



}

else
{





echo "<script>
	
	$('.alert-name').html('Old password didn`t match');
                        $('.alert-name').show();
	
	</script>";






}

?>