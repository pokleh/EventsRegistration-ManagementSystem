<?php
session_start();
include('connection.php');


$id = $_POST['id']; 




if($connection->query("DELETE FROM user_account WHERE userID = '$id' "))

{
	

$_SESSION['deleted'] = "User successfully deleted";

echo "<script>

window.location = 'usersaccount';

</script>";


}

?>