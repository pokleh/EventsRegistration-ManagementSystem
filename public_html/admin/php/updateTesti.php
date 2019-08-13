<?php


include('connection.php');

$name = $_POST['name'];
$occupation = $_POST['occupation'];
$info  = $_POST['info'];
$id = $_POST['id'];

 


if($connection->query("UPDATE testimonials SET name = '$name' , occupation = '$occupation' , testimonials = '$info'  WHERE id =
$id " )){

echo "<script>

$('#upload').click();
</script>";
}


?>