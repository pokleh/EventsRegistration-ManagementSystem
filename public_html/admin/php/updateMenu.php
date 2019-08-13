<?php


include('connection.php');

$menu = $_POST['menu'];
$category = $_POST['category'];
$id  = $_POST['id'];
$ing = $_POST['ing'];
 
 

if($connection->query("UPDATE menu SET category = '$category' , menu = '$menu', ing = '$ing' WHERE menuID ='$id' " )){

echo "<script>


$('#upload').click();
</script>";

}

else
{

}


?>