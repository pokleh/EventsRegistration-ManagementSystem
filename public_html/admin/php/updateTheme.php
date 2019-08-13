<?php


include('connection.php');

$theme = $_POST['theme'];
$category = $_POST['category'];
$sex =  $_POST['sex'];

$id  = $_POST['id'];

 
 

if($connection->query("UPDATE theme SET category = '$category' , theme = '$theme' ,sex = '$sex' WHERE id ='$id' " )){

echo "<script>

$('#upload').click();
</script>";
}


?>