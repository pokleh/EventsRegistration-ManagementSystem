<!DOCTYPE html>
<?php 

include('php/session_user.php');
$id =mysqli_escape_string($connection,$_GET['paymentid']);




 

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
#payment > li{

    display: inline-block;
    margin-left: 30px;
	
}
</style>
    </head>
    <body>
        
        <!--================Header Menu Area =================-->
       

<?php include('php/header-dashboard.php');



$select = "SELECT events.eventTitle,events.eventInfo,events.eventPrice,events.img,reservedcustomer.id, reservedcustomer.dateReserved,reservedcustomer.packs,reservedcustomer.paymentMethod,reservedcustomer.paymentStatus,reservedcustomer.status FROM reservedcustomer
INNER JOIN events ON reservedcustomer.eventID = events.id
 WHERE reservedcustomer.id = '$id'
";
$result = $connection->query($select);
$row = $result->fetch_assoc();
   $datr = $row['dateReserved'];                         



 ?>

  
        <br><br>  
        <!--================Offer Area =================-->
        <section style="margin-top:100px;">
        	<div class="container">
        		<div class="alert alert-danger" style="display:none;">Please select payment method to proceed</div>
        		


<?php 

                       
if($row['paymentMethod'] == "direct payment")
{
echo "<h4>You can pay through any of the following remitancest</h4>";
}
else
{
    echo "<h4>You can pay through any of the following remitances</h4>";
}
?>

               
    		<div class="row offer_inner">
		
						<div class="col-lg-7">

                      
	<br><br>
	<center>
<ul id="payment">



                       


	<li>

	<img src="img/payment-final.png" alt=""style="width:100%;" >

	<br>
	<input type="radio" name="radio" id="radio" class="radio1" value="1" checked hidden>
	</li>


	
	

</ul>
</center>




							
						


                   
                    </div>
        			

                        <div class="col-lg-5">
                        <div class="offer_item">
                          
                          <div class="card" style="">

  <div class="card-body">
    <h5 class="card-title" style="">Confirm your reservation</h5>
    <h4><?php echo ucwords($row['eventTitle']) ?></h4>
    <p class="card-text">Reserved Date: <span style="color:orange;"><?php echo ucwords($row['dateReserved']) ?></span><br>
    Packs: &lt; <span style="color:orange;"><?php echo ucwords($row['packs']) ?></span></p>
 <h2 class="card-title">Total Price: <span style="color:orange;">₱<?php echo number_format($row['eventPrice'] + 30000) ?>.00 </span></h2>
    <a id="confirm" class="btn btn-primary" style="float:right;cursor:pointer;color:white;">Proceed</a>
  </div>
</div>
                        
                        </div>

                    </div>

        			</div>


        			
        		</div>
        	</div>
        </section>
<input type="text" id="eventTitle" value="<?php echo $row['eventTitle'] ?>" hidden>
<input type="text" id="eventPrice" value="<?php echo $row['eventPrice'] + 30000 ?>" hidden>

<div id="ajax_catcher"></div>












   
        <!--================End Offer Area =================-->
        
      
    
        
        <!--================ start footer Area  =================-->	
       
  <br><br>  
<input type="text" id="radioStat" hidden>
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


         
 <script>
$(document).ready(function(){
	$(".radio1").change(function(){
			$("#radioStat").val(0);
	});
});
$(document).ready(function(){
	$(".radio2").change(function(){
			$("#radioStat").val(0);
	});
});



$(document).ready(function(){
	$("#confirm").click(function(){
		


	var id  = '<?php echo $id ?>';
	

	
window.location = 'payremitance?reservationid=' + id;



   });

 });


          </script>
    </body>
</html>