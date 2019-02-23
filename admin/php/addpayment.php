<?php
 
session_start();

include('connection.php');

$userID = $_POST['userID'];
$eventID = $_POST['eventID'];
$price = $_POST['price'];
$TotalBalance = $_POST['TotalBalance'];
$amountInput = $_POST['amountInput'];




$thousand = $_POST['thousand'];
$five = $_POST['five'];
$two = $_POST['two'];
$onehun = $_POST['onehun'];
$fifty = $_POST['fifty'];
$twenty = $_POST['twenty'];
$ten = $_POST['ten'];
$fivepes = $_POST['fivepes'];
$one = $_POST['one'];




$lastIDOfPaymentHistory = $connection->query("SHOW TABLE STATUS LIKE 'paymenthistory' ")->fetch_assoc();

$paymentID = $lastIDOfPaymentHistory['Auto_increment'];



$update = "UPDATE reservedcustomer SET paymentStatus = 'complete' , paymentMethod='direct payment' , status = 'verified' WHERE id = '$id'";
if($connection->query($update))
{
}

if($connection->query("INSERT INTO  paymenthistory (userID,eventID,price,totalBalance,amount)
VALUES ('$userID','$eventID','$price','$TotalBalance','$amountInput')"))
{


if($connection->query("INSERT INTO paymentBreakdown (paymentID,userID,eventID,amount,thousand,five,two,onehun,fifty,twenty,ten,fivepes,one) VALUES ('$paymentID','$userID','$eventID','$amountInput','$thousand','$five','$two','$onehun','$fifty','$twenty','$ten','$fivepes','$one') ")){


	$_SESSION['success'] = 'Payment successfully added';

	echo "<script>
				
			
				window.location = 'verifiedreservation';
	
			</script>";
		}

}

else
{
	echo "<script>


	
			</script>";
}




?>