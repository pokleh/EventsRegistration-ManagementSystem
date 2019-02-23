<?php

include('connection.php');

$menuID = $_POST['menuID'];
$menu = $_POST['menu'];
$eventID = $_POST['eventID'];
$userID = $_POST['userID'];


$insert = "INSERT INTO  foodChoice (userID,eventID,menuID,menu,status) VALUES ('$userID','$eventID','$menuID','$menu','semiapproved')";
if($connection->query($insert))
{

}


?>