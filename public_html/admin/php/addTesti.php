<?php


include('connection.php');

$name = $_POST['name'];
$occupation = $_POST['occupation'];
$info  = $_POST['info'];


 


if($connection->query("INSERT INTO  testimonials (name,testimonials,occupation)VALUES('$name','$occupation','$info')")){

echo "<script>

$('#upload').click();
</script>";
}


?>