<?php
session_start();
include('connection.php');




$userID = $_POST['userID'];
$reservedID = $_POST['reservedID'];
$price = $_POST['price'];
$amountSent = $_POST['amountSent'];
$totalBalance = $_POST['totalBalance'];
$upID = $_POST['upID'];



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



if($connection->query("INSERT INTO paymenthistory (userID,eventID,price,totalBalance,amount)
 VALUES ('$userID','$reservedID','$price','$totalBalance','$amountSent')"))
{

if($connection->query("DELETE FROM uploadedpayment WHERE id = '$upID'"))
	{


		if($connection->query("UPDATE reservedcustomer SET status = 'verified' WHERE id ='$reservedID'"))
		{


			if($connection->query("INSERT INTO paymentBreakdown (paymentID,userID,eventID,amount,thousand,five,two,onehun,fifty,twenty,ten,fivepes,one) VALUES ('$paymentID','$userID','$reservedID','$amountSent','$thousand','$five','$two','$onehun','$fifty','$twenty','$ten','$fivepes','$one') ")){





$_SESSION['success'] = 'Payment successfully approved';
		echo "<script> 

window.location = 'paymentreceipt';




		</script>";
	}
	}
}

}

?>