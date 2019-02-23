<?php


include('connection.php');

$title = $_POST['title'];
$category = $_POST['category'];
$pax = $_POST['pax'];
$price  = $_POST['price'];
$food   = $_POST['food'];

$lastID = $_POST['lastID'];

if($connection->query("UPDATE packageincluded SET status= 'ok' "))
{

}

if($connection->query("INSERT INTO events (eventID,eventCategory,eventTitle,pax,eventPrice,foodIncluded) VALUES ('$lastID','$category','$title','$pax','$price','$food') ")){

echo "<script>

$('#upload').click();
</script>";
}

else
{
	echo "<script>

alert('faild')
</script>";
}


?>

