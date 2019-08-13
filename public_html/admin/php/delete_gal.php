<?php  
include('connection.php');
 if(isset($_POST['id']))  
 {  
      foreach($_POST['id'] as $id)  
      {  
           $sql = "DELETE FROM completedeventsimg WHERE id= '$id'";  
           if($connection->query($sql)){

           }

      }  
 }  
 ?>  