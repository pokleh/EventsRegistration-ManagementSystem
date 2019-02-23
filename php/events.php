<?php

$Eventid = mysqli_escape_string($connection,$_GET['id']);
$query = "SELECT * FROM events WHERE id = '$Eventid'";
$result = $connection->query($query);
$row = $result->fetch_assoc();
 
$eventTitle = $row['eventTitle'];
$eventInfo = $row['eventInfo'];
$eventPrice = $row['eventPrice'];
$eventCategory = $row['eventCategory'];
$pax = $row['pax'];
$img = $row['img'];
$foodIncluded = $row['foodIncluded'];
 
?>