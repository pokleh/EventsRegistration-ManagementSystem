<?php
session_start();


include('connection.php');
$id = mysqli_escape_string($connection,$_POST['id']);
$date = date('Y-m-d');
if($connection->query("UPDATE reservedcustomer SET status='archive', dateArchive = '$date' WHERE id = '$id'"))
{

}
 



$row = $connection->query("SELECT * FROM reservedcustomer WHERE id = '$id'")->fetch_assoc();

$eventID = $row['eventID'];
$cusID = $row['cusID'];




 
$row2 = $connection->query("SELECT * FROM events WHERE id = '$eventID' ")->fetch_assoc();

$price = $row2['eventPrice'] + 30000;

$date=date('Y-m-d'); 
$eventCategory = $row2['eventCategory'];
$pax = $row2['pax'];

if($connection->query("INSERT INTO sales (dateReserved,price,eventCategory,pax) VALUES ('$date','$price','$eventCategory','$pax')"))
{


}

if($connection->query("DELETE FROM paymentbreakdown WHERE userID = '$cusID' AND eventID = '$eventID'"))
{

}





?>