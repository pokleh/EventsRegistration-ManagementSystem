<?php
session_start();
include('connection.php');


$id = $_POST['id']; 




if($connection->query("DELETE FROM user_account WHERE userID = '$id' "))

{
	

$_SESSION['deleted'] = "Administrator successfully deleted";

echo "<script>

window.location = 'administrators';

</script>";


}

?>