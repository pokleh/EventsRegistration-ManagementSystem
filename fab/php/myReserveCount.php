<?php


include('connection.php');

$select1 = "SELECT count(cusID) as totalCount FROM reservedcustomer WHERE cusID = '$userID' and status = 'verified'";
$result1 = $connection->query($select1);
$row1 = $result1->fetch_assoc();
$totalCount1 = $row1['totalCount'];

?>