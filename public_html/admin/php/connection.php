<?php


$server="localhost";
$username="root";
$pasword="";
$dbname="fab";



$connection=new mysqli($server,$username,$pasword,$dbname);

if($connection->connect_error){
	die("No connection". $connection->connect_error);


}

?>