<?php


include('connection.php');

$userID = $_POST['userID'];
$eventID = $_POST['eventID'];


  $count = "SELECT count(id) AS countFood FROM foodChoice WHERE userID = '$userID' AND eventID ='$eventID'";
    $rowCount = $connection->query($count)->fetch_assoc();
    $totalCount = $rowCount['countFood'];
                
echo "<script>


$('#totalCount').val($totalCount);

</script>";

?>