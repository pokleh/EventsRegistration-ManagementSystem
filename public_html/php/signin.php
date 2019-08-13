<?php

session_start();
include('connection.php');

$username=$_POST['username'];
$password=$_POST['password'];

  



$stmt="SELECT * FROM user_account WHERE username='$username' AND emailStatus = 'verified'";
$result=$connection->query($stmt);
$row=$result->fetch_assoc();

if($result->num_rows > 0)
{

if(password_verify($password,$row['password']))
{

	$_SESSION['userName']=$username;

	if($row['class'] == "user")
	{
		$_SESSION['user'] = 'user';
		echo "<script language='javascript'>
				window.location='fabeventsdashboard';
			 </script>";
			 
	}
	else
	{


		$_SESSION['userName']=$username;
		$_SESSION['admin'] = 'admin';
		$_SESSION['adminID'] = $row['userID'];
		$_SESSION['fullName'] = $row['fullName'];
		echo "<script language='javascript'>
				window.location='admin';
			</script>";

	}


}
else
{

echo "<script language='javascript'>

$('.alert').html('Invalid Password!');
$('.alert').show();

</script>";
}



}

else{


echo "<script language='javascript'>

$('.alert').html('Username dont exist!');
$('.alert').show();

</script>";
}



















?>