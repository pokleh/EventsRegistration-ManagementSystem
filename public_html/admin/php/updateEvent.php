<?php


include('connection.php');

$title = $_POST['title'];
$category = $_POST['category'];
$pax = $_POST['pax'];
$price  = $_POST['price'];

$id  = $_POST['id'];
$foodIncluded   = $_POST['foodIncluded'];
 
 

if($connection->query("UPDATE events SET eventCategory = '$category' , eventTitle = '$title' ,  pax = '$pax' , eventPrice = '$price' , foodIncluded = '$foodIncluded' WHERE id =
'$id' " )){



if($connection->query("UPDATE packageincluded SET status = 'ok' WHERE eventID = '$id'"))
{



echo "<script>

$('#upload').click();
</script>";
}

}

?>