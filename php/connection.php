<?php


$host = "localhost";
$username = "id7989606_fabeventsbeta";
$password = "1234567890";
$dbname = "id7989606_fabeventsbeta";


$connection = new mysqli($host,$username,$password,$dbname);
if($connection->connect_errno)
{
	echo "Cannot establish connection";
}

?>