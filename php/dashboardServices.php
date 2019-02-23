    <?php 

$stmt1 = "SELECT * FROM events WHERE id = 1";
$result1 = $connection->query($stmt1);
$row1 = $result1->fetch_assoc();
 
$stmt2 = "SELECT * FROM events WHERE id = 2";
$result2 = $connection->query($stmt2);
$row2 = $result2->fetch_assoc();
  
     

$stmt3 = "SELECT * FROM events WHERE id = 3";
$result3 = $connection->query($stmt3);
$row3 = $result3->fetch_assoc();
     ?>
     