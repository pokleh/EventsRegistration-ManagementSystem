<?php


$host = "162.253.224.15";
$username = "revex10h";
$password = "sv6eFx23";
$dbname = "revex10h_fab";


$connection = new mysqli($host,$username,$password,$dbname);
if($connection->connect_errno)
{
	echo "Cannot establish connection";
}

?>