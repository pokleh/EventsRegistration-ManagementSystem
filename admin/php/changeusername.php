<?php
session_start();
include('connection.php');

$userID = $_POST['userID'];
$username = $_POST['username'];

 
$select = "SELECT * FROM user_account WHERE username = '$username'";
$result = $connection->query($select);
if($result->num_rows > 0)
{
	echo "<script>
	
	$('.alert-danger').html('Username already exist');
                        $('.alert-danger').show();
	
	</script>";



}

else
{


$update = "UPDATE  user_account SET username = '$username' WHERE userID = '$userID'";
if($connection->query($update))
{	

	$_SESSION['change'] = "username successfully change to " . ucwords($username);
	echo "<script>

		window.location = 'editaccount?id=' + $userID;
	</script>";
}

}

?>