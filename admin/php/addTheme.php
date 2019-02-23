<?php


include('connection.php');



$theme = $_POST['theme'];
$category = $_POST['category'];
$sex = $_POST['sex'];

 


if($connection->query("INSERT INTO  theme (category,theme,sex)VALUES('$category','$theme','$sex')")){

echo "<script>

$('#upload').click();

</script>";
}

else
{
echo "<script>



</script>";
}

?>