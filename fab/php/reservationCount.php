<?php


include('connection.php');

$select = "SELECT count(cusID) as totalCount FROM reservedcustomer WHERE cusID = '$userID' and status = 'pending'";
$result = $connection->query($select);
$row = $result->fetch_assoc();
$totalCount = $row['totalCount'];

?>