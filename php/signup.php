<?php
session_start();
include('connection.php');



$fullName = $_POST['fullName'];
$emailAddress = $_POST['emailAddress'];
$userName = $_POST['userName'];
$password = $_POST['password'];
$hashpassword=password_hash($password , PASSWORD_BCRYPT,array('cost'=>10));
$code=substr(md5(mt_rand()),0,15);
 
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

			$insert  = "INSERT INTO  user_account (fullName,emailAddress,username,password,class,code) VALUES ('$fullName','$emailAddress','$userName','$hashpassword','user','$code')";
				if($connection->query($insert))
				{

			

	$message = "Your Activation Code is ".$code."";
    $to= $emailAddress;
    $subject="Verify your email now! - Fab Events";
    $from = 'fabevents30@gmail.com';
    $body='Your Activation Code is '.$code.' Please Click On This link https://fabeventsbeta.000webhostapp.com/verify?token='. $code .' to activate your account.';
    $headers = "From:".$from;
    if(mail($to,$subject,$body,$headers))
    {
        
				echo "<script>
				

            	window.location = 'confirmemail?email=$emailAddress';

					</script>";
    }








					

				}



}


?>