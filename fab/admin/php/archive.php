<?php



include('connection.php');
$id = mysqli_escape_string($connection,$_POST['id']);
$date = date('Y-m-d');
if($connection->query("UPDATE reservedcustomer SET status='archive', dateArchive = '$date' WHERE id = '$id'"))
{

}



$row = $connection->query("SELECT * FROM reservedcustomer WHERE id = '$id'")->fetch_assoc();

$eventID = $row['eventID'];


$row2 = $connection->query("SELECT * FROM events WHERE id = '$eventID' ")->fetch_assoc();

$price = $row2['eventPrice'] + 10000;

$month = date('M');
$year = date('Y');
$monthNum = date('m');

if($connection->query("INSERT INTO sales (month,year,price,monthNum) VALUES ('$month','$year','$price','$monthNum')"))
{


}

?>