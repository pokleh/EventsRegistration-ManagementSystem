<!DOCTYPE html>
<?php 

include('php/session_user.php');


?>
  
 

<html lang="en">
    <head> 
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/favicon.png" type="image/png">
        <title>FAB EVENTS</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="vendors/linericon/style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="vendors/animate-css/animate.css">
        <!-- main css -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link rel="stylesheet" href="css/bootstrap-datepicker3.css">

<style>
    .day , .dow ,.datepicker-switch
    {
      
        font-size: 14px;  
        font-family: "Roboto", sans-serif;
    }
    .next,.prev
    {
        color: #16d9e8;
    }
   .table-condensed, .datepicker {
width: 600px; /*what ever width you want*/
}
.day 
{ 
    font-weight: bold;
}
.datepicker table tr td.disabled, .datepicker table tr td.disabled:hover{
    color: red;
     text-decoration: underline overline line-through red;
}
b{
    color:black;
}
</style>
    </head>
    <body>
        
        <!--================Header Menu Area =================-->
       

<?php include('php/header-dashboard.php') ?>

  <br><br> 
  <br><br><br><br><br>
        
        
        <!--================Offer Area =================-->
        <section class="offer_area">
        	<div class="container-fluid">
        		
        	
        		<div class="row offer_inner">

						<div class="col-lg-12">
   <table class="table">
                                <tr>
                                    <th>One Thousand Pesos</th>
                                    <th>Five Hundred Pesos</th>
                                    <th>Two Hundred Pesos</th>
                                    <th>One Hundred Pesos</th>
                                    <th>Fifty Pesos</th>
                                    <th>Twenty Pesos</th>
                                    <th>Ten Pesos</th>
                                    <th>Five Pesos</th>
                                    <th>One Pesos</th>
                                </tr>
                           
            
                            
        <?php 
         $userID = mysqli_escape_string($connection,$_GET['userid']);
         $eventid = mysqli_escape_string($connection,$_GET['eventid']);
         $paymentID =  mysqli_escape_string($connection,$_GET['paymentid']);
         $paymentDate =  mysqli_escape_string($connection,$_GET['date']);
         $amount =  mysqli_escape_string($connection,$_GET['amount']);
      


             $name = $connection->query("SELECT * FROM user_account WHERE userID = '$userID'")->fetch_assoc();
             
             $paymentBreakdown = $connection->query("SELECT * FROM paymentbreakdown WHERE paymentID = '$paymentID' AND userID = '$userID' AND eventID = '$eventid' AND dateUpdated = '$paymentDate'")->fetch_assoc();
           //to be follow  $event = $connection->query("SELECT * FROM user_account WHERE userID = '$userID'")->fetch_assoc();
                   echo "<b>Customer Name: ". ucwords($name['fullName']) ."</b><br>";
                    echo "<b>Payment Date: ". date('Y-m-d',strtotime($paymentDate))."</b><br>";
                      echo "<b style='color:red;'>Amount: ". $amount ."</b><br><br><br>";
                         ?>
                

    <tr>
        <td><?php echo $paymentBreakdown['thousand']; ?></td>
         <td><?php echo $paymentBreakdown['five']; ?></td>
          <td><?php echo $paymentBreakdown['two']; ?></td>
           <td><?php echo $paymentBreakdown['onehun']; ?></td>
            <td><?php echo $paymentBreakdown['fifty']; ?></td>
             <td><?php echo $paymentBreakdown['twenty']; ?></td>
              <td><?php echo $paymentBreakdown['ten']; ?></td>
               <td><?php echo $paymentBreakdown['fivepes']; ?></td>
                <td><?php echo $paymentBreakdown['one']; ?></td>
    </tr>


</table>

                    </div>
        			

                        

        			</div>


        			
        		</div>
        	</div>
        </section>
  <br><br>

<div id="ajax_catcher"></div>


   
        <!--================End Offer Area =================-->
        
      
    
        
        <!--================ start footer Area  =================-->	
       


        <?php include('php/footerDashboard.php'); ?>



		<!--================ End footer Area  =================-->
        
        
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/stellar.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope-min.js"></script>
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendors/counter-up/jquery.counterup.js"></script>
        <script src="js/mail-script.js"></script>
        <script src="js/theme.js"></script>
          <script src="js/bootstrap-datepicker.min.js"></script>

<?php

$array = array();
$select = "SELECT dateReserved FROM reservedcustomer";
$result = $connection->query($select);
while($row = $result->fetch_assoc())
{
	array_push($array, $row['dateReserved']);
}

//$array = array('10-03-2018','10-01-2018');
$json = json_encode($array);

?>
         
 <script>


$(document).ready(function(){
	$(".cancel").click(function(){
		
	
		var id = $(this).attr('id');

	
	
		
	$.ajax({

			type:'POST',
			url:'php/ajax_request/cancelReservation.php',
			data:{id:id},
			success:function(data)
			{
				$("#ajax_catcher").html(data);
				$("#table_" + id).fadeOut();
				$(".alert-can").show();
			}

		});

	


   });

 });

$(document).ready(function(){
    $(".view-contract").click(function(){
        
    
        var id = $(this).attr('id');

    
    
        
    $.ajax({

            type:'POST',
            url:'viewContract.php',
            data:{id:id},
            success:function(data)
            {
                $("#ajax_catcher").html(data);
                
            }

        });

    


   });

 });






          </script>
    </body>
</html>