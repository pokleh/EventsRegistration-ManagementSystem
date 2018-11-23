<?php
session_start();
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
require 'app/start.php';


$product = $_GET['event'];
$price = $_GET['price'];
$_SESSION['reservationID'] = $_GET['id'];
$shipping = 0;


$total = $price + $shipping;


$payer = new Payer();
$payer->setPaymentMethod('paypal');


$item =  new Item();
$item->setName($product)
	->setCurrency('PHP')
	->setQuantity(1)
	->setPrice($price);

 
 $itemList = new ItemList();
 $itemList->setItems([$item]);

 $details = new Details();
 $details->setShipping($shipping)
 	->setSubtotal($price);


$amount = new Amount();
$amount->setCurrency('PHP')
->setTotal($total)
->setDetails($details);

$transaction = new Transaction();
$transaction->setAmount($amount)
->setItemList($itemList)
->setDescription('Payment for samting')
->setInvoiceNumber(uniqid());


//succes of failure

$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl(SITE_URL . '/pay.php?success=true')
->setCancelUrl(SITE_URL . '/pay.php?success=false');


$payment = new Payment();
$payment->setIntent('sale')
->setPayer($payer)
->setRedirectUrls($redirectUrls)
->setTransactions([$transaction]);

try {
	$payment->create($paypal);
} catch (Exception $e) {

	echo $e;
	
}
echo $approValUrl = $payment->getApprovalLink();
header("location:{$approValUrl}");

?>