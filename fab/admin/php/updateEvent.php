<?php


include('connection.php');

$title = $_POST['title'];
$category = $_POST['category'];
$pax = $_POST['pax'];
$price  = $_POST['price'];
$info  = $_POST['info'];
$id  = $_POST['id'];




if($connection->query("UPDATE events SET eventCategory = '$category' , eventTitle = '$title' , eventInfo = '$info' , pax = '$pax' , eventPrice = '$price' WHERE id =
$id " )){

echo "<script>

$('#upload').click();
</script>";
}


?>