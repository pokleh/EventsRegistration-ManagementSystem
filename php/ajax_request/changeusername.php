<?php
session_start();
include('../connection.php'); 

$userID = $_POST['userID'];
$username = $_POST['username'];

 
$select = "SELECT * FROM user_account WHERE username = '$username'";
$result = $connection->query($select);
if($result->num_rows > 0)
{
	echo "<script>
	
	$('.alert-name').html('Username already exist');
                        $('.alert-name').show();
	
	</script>";



}

else
{


$update = "UPDATE  user_account SET username = '$username' WHERE userID = '$userID'";
if($connection->query($update))
{	

$_SESSION['change'] = "username successfully updated";
	unset($_SESSION['userName']);

	$_SESSION['userName']=$username;
	
	echo "<script>

	location.reload();

	</script>";
}

}

?>