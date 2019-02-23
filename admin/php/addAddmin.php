<?php
session_start();

include('connection.php');

$fullName = $_POST['fullName'];
$address = $_POST['address'];
$birthday = $_POST['birthday'];
$contactNumber = $_POST['contactNumber'];
$emailAddress = $_POST['emailAddress'];
$username = $_POST['username'];
$password ="fabevents123";
$hashpassword=password_hash($password , PASSWORD_BCRYPT,array('cost'=>10));
$stmt1 = "SELECT * FROM user_account WHERE username ='$username'";
if($connection->query($stmt1)->num_rows > 0)
{
	echo "<script>
		$('.alert').html('username already exist');
		$('.alert').show();
		</script>
	";
}

else
{

	if($connection->query("INSERT INTO user_account(fullName,address,birthDay,contactNumber,emailAddress,username,password,class,emailStatus)VALUES('$fullName','$address', '$birthday' , '$contactNumber' , '$emailAddress','$username','$hashpassword','admin','verified')"))
	{
			$_SESSION['ok'] = 'New administrator successfully added ';

				echo "<script> window.location='administrators'; </script>";

	}
}








?>