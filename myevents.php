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
                        		<th>Reserved event</th>
                        		<th>Date</th>
                                <th>Time</th>
                        		<th>Pax</th>
                        		<th>Price</th>
                        		<th>Payment method</th>
                        		<th>Payment status</th>
                        		<th>Status</th>
                                <th>Action</th>
                        		
                        	</tr>
                        	
							 
							<?php
$select = "SELECT events.eventTitle,events.eventInfo,events.eventPrice,events.img,reservedcustomer.id,reservedcustomer.theme,reservedcustomer.startTime,reservedcustomer.startFor, reservedcustomer.endTime,reservedcustomer.endTimeFor, reservedcustomer.dateReserved,reservedcustomer.packs,reservedcustomer.paymentMethod,reservedcustomer.paymentStatus,reservedcustomer.status FROM reservedcustomer
INNER JOIN events ON reservedcustomer.eventID = events.id
 WHERE reservedcustomer.cusID = '$userID' and reservedcustomer.status = 'verified'
";
								$result = $connection->query($select);
								if($result->num_rows > 0)
								{
								while($row = $result->fetch_assoc())
								{

							 ?>
								<tr id="table_<?php echo $row['id'] ?>">
									<td><a href=""><?php echo ucwords($row['eventTitle']) ?></a></td>
									<td><?php echo $row['dateReserved'] ?></td>
                                     <td><?php echo ucwords($row['startTime'] . ":00 " . $row['startFor'] ." to " . $row['endTime'] . ":00 " . $row['endTimeFor'] ); ?></td>
                                    
									<td><?php echo $row['packs'] ?></td>
									<td><?php echo "₱" . number_format($row['eventPrice'] + 30000) ?></td>
									<td><?php echo ucwords($row['paymentMethod']) ?></td>
									 <td> 

                                        <?php

                                    $balance = $connection->query("SELECT * FROM paymenthistory WHERE userID = '$userID' ORDER BY dateUpdated DESC LIMIT 1")->fetch_assoc();
 
                                        if($row['paymentMethod'] == "paypal")
                                        {
                                           echo "<p>Complete. Paid via Credit Card </p>"; 
                                        }

                                        else{

                                           if($balance['totalBalance'] != 0 || $balance['totalBalance'] == "") { 
                                            echo "<a href='paymenthistory?eventid=". $row['id'] . "'style='text-decoration:none;'> Incomplete <br>
                                         <small style='color:#4285f4;''>View payment History</small>  </a>";
                                            } else{
                                             echo "<a href='paymenthistory?eventid=". $row['id'] . "'style='text-decoration:none;'> Complete <br>
                                         <small style='color:#4285f4;''>View payment History</small>  </a>";
                                         } 
                                        }

                                         ?>
                                        </td>
									<td><?php echo ucwords($row['status']); ?></td>
                                    <td> <a style="text-decoration:none;color:white;" id="<?php echo $row['id'] ?>" class="btn btn-info btn-sm view-contract">View Contract</a></td>
									
								</tr>
							 <?php }
							 	}
							 	else {
							 		echo "<br><h4> No events reserved </h4>";
							 	}
							  ?>



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
       
<br><br><br>

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