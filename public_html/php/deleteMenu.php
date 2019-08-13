<?php

include('connection.php');

$menuID = $_POST['menuID'];
$menu = $_POST['menu'];
$eventID = $_POST['eventID'];
$userID = $_POST['userID'];


$delete = "DELETE FROM foodChoice WHERE userID = '$userID' AND menuID = '$menuID' AND eventID='$eventID'";
if($connection->query($delete))
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