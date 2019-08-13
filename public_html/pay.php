<?php
session_start();
include('php/connection.php');
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
require 'app/start.php';

if(!isset($_GET['success'],$_GET['paymentId'],$_GET['PayerID']))
{
	die();
}

if((bool)$_GET['success'] === false)
{
header("location:myreservation");
}

$id = $_SESSION['reservationID'];
$update = "UPDATE reservedcustomer SET paymentMethod = 'paypal', paymentStatus = 'complete' , status = 'verified' WHERE id = '$id' ";
if($connection->query($update))
{
	unset($_SESSION['reservationID']);
	$_SESSION['verified'] = 'verified';
}

$paymentId = $_GET['paymentId'];
$payerId = $_GET['PayerID'];

$payment = Payment::get($paymentId,$paypal);


$execute = new PaymentExecution();
$execute->setPayerId($payerId);


try {


	$result = $payment->execute($execute,$paypal);
	
} catch (Exception $e) {
	die($e);
}

echo "<script>
window.location = 'myreservation';
</script>";
?>