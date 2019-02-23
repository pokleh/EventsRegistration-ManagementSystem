<?php


include('connection.php');

$select1 = "SELECT count(id) as totalCount FROM  clientMessages WHERE userID = '$userID'";
$result1 = $connection->query($select1);
$row1 = $result1->fetch_assoc();
$totalCount1 = $row1['totalCount'];

?>