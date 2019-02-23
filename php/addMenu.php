<?php

include('connection.php');

$menuID = $_POST['menuID'];
$menu = $_POST['menu'];
$eventID = $_POST['eventID'];
$userID = $_POST['userID'];
$total = $_POST['total'];


$insert = "INSERT INTO  foodChoice (userID,eventID,menuID,menu) VALUES ('$userID','$eventID','$menuID','$menu')";
if($connection->query($insert))
{

}
$selectCount = $connection->query("SELECT count(id) AS count FROM foodchoice WHERE eventID = '$eventID' AND userID ='$userID' AND status = '' ")->fetch_assoc();

$totalCount = $selectCount['count'];
echo "<script>

$('#kaCount').val($totalCount);

</script>";


if($totalCount == $total){

	echo "<script>

 $('.menu:not(:checked)').attr('disabled', 'disabled');

</script>";

}

else
{
echo "<script>

$('.menu').removeAttr('disabled');

</script>";
}

?>