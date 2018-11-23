<?php
session_start();
include('connection.php');



$fullName = $_POST['fullName'];
$emailAddress = $_POST['emailAddress'];
$userName = $_POST['userName'];
$password = $_POST['password'];
$hashpassword=password_hash($password , PASSWORD_BCRYPT,array('cost'=>10));


$qry_email = "SELECT * FROM user_account WHERE emailAddress = '$emailAddress'";
$result_email = $connection->query($qry_email);
if($result_email->num_rows > 0)
{
	 echo "<script>

	 $('.alert').html('Email address already exist');
                    $('.alert').show();

                    </script>";
}

else
{


	$qry_username = "SELECT * FROM user_account WHERE username = '$userName'";
	$result_username = $connection->query($qry_username);
		if($result_username->num_rows > 0)
		{
	 echo "<script>

	 $('.alert').html('Username already exist');
                    $('.alert').show();

                    </script>";
		}

		else
			{

			}

			$insert  = "INSERT INTO  user_account (fullName,emailAddress,username,password,class) VALUES ('$fullName','$emailAddress','$userName','$hashpassword','user')";
				if($connection->query($insert))
				{

					$_SESSION['userName'] = $userName;

					echo "<script>

					window.location = 'fabeventsdashboard';

					</script>";
				}


}
?>