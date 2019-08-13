<?php


include('connection.php');

$menu = $_POST['menu'];
$category = $_POST['category']; 
$ing = $_POST['ing'];



if($connection->query("INSERT INTO  menu (menu,category,status,ing)VALUES('$menu','$category','available','$ing')")){

echo "<script>

$('#upload').click();
</script>";
}


?>