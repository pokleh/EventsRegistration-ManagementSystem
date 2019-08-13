<?php


include('connection.php');


$packageIncluded = $_POST['packageIncluded'];


$lastID = $_POST['lastID'];




if($connection->query("INSERT INTO packageincluded (eventID,package,status) VALUES ('$lastID','$packageIncluded','') "))
{

}



?>