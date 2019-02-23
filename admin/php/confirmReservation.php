<?php
 
session_start();

include('connection.php');

$userID = $_POST['userID'];
$eventID = $_POST['eventID'];
$price = $_POST['price'];
$TotalBalance = $_POST['TotalBalance'];
$amountInput = $_POST['amountInput'];

$update = "UPDATE reservedcustomer SET paymentStatus = 'complete' , paymentMethod='direct payment' , status = 'verified' WHERE id = '$eventID'";
if($connection->query($update))
{
}

if($connection->query("INSERT INTO  paymenthistory (userID,eventID,price,totalBalance,amount)
VALUES ('$userID','$eventID','$price','$TotalBalance','$amountInput')"))
{
	$_SESSION['success'] = 'Payment successfully added';

	echo "<script>
				
			
				window.location = 'verifiedreservation';
	
			</script>";

}

else
{
	echo "<script>


	
			</script>";
}




?>