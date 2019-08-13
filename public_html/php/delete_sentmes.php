<?php  
include('connection.php');
 if(isset($_POST['id']))  
 {  
      foreach($_POST['id'] as $id)  
      {  
           $sql = "UPDATE clientmessage SET deleteStatus = 'deleted' WHERE id= '$id'";  
           if($connection->query($sql)){
         

           }


            $sql2 = "UPDATE reply SET statusDelete = 'deleted' WHERE messageID= '$id'";  
           if($connection->query($sql2)){
            	

           }

          

      }  
 }  
 ?>  