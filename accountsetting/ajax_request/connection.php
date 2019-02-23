<?php


$host = "localhost";
$username = "root";
$password = "";
$dbname = "fab";


$connection = new mysqli($host,$username,$password,$dbname);
if($connection->connect_errno)
{
	echo "Cannot establish connection";
}

?>