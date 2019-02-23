<?php


include('connection.php');


$packageIncluded = $_POST['packageIncluded'];

$rowID = $connection->query("SHOW TABLE STATUS LIKE 'events'")->fetch_assoc();
$lastID = $rowID['Auto_increment'];




if($connection->query("INSERT INTO packageincluded (eventID,package,status) VALUES ('$lastID','$packageIncluded','') "))
{

}



?>