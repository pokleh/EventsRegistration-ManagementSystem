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
</style>
    </head>
    <body>
        
        <!--================Header Menu Area =================-->
       

<?php include('php/header-dashboard.php') ?>

  <br><br> 
  <br><br><br><br><br>
        
        
        <!--================Offer Area =================-->
        <section class="offer_area">
        	<div class="container">
        		<?php if(isset($_SESSION['change'])){ ?>
        	<div class="alert alert-success"><?php echo $_SESSION['change']; unset($_SESSION['change']); ?></div>
            <?php } ?>
        		<div class="row offer_inner">
                  <div class="col-md-12">
                             
                <p>Full name: <br> <span style="font-weight:bold;"><?php echo ucwords($fullName); ?></span> <a href="accountsetting/changefullname" style="float:right;color:gray;font-family:arial;"><i class="fa fa-pencil"></i> Change fullname</a></p>
                <hr>
                <p>Address: <br> <span style="font-weight:bold;"><?php if($address == "") {  echo "<span style='color:red;'>(incomplete)</span>";} else { echo $address; } ?></span> <a href="accountsetting/updateaddress" style="float:right;color:gray;font-family:arial;"><i class="fa fa-pencil"></i> Update address</a></p>
                <hr>
                <p>Birthday: <br> <span style="font-weight:bold;"><?php if($birthDay == "") {  echo "<span style='color:red;'>(incomplete)</span>";}  else { echo $birthDay; }  ?></span> <a href="accountsetting/updatebirthday" style="float:right;color:gray;font-family:arial;"><i class="fa fa-pencil"></i> Update birthday</a></p>
                <hr>
                <p>Contact number: <br> <span style="font-weight:bold;"><?php if($contactNumber == "") {  echo "<span style='color:red;'>(incomplete)</span>";}  else { echo $contactNumber; }  ?></span> <a href="accountsetting/updatecontactnumber" style="float:right;color:gray;font-family:arial;"><i class="fa fa-pencil"></i> Update contact number</a></p>
                <hr>
                <p>Username: <br> <span style="font-weight:bold;"><?php echo $userName; ?></span><a href="accountsetting/changeusername" style="float:right;color:gray;font-family:arial;"><i class="fa fa-pencil"></i> Change username</a></p>   
                <hr>
                <p>Password: <br> <span style="font-weight:bold;">***********</span><a href="accountsetting/changepassword" style="float:right;color:gray;font-family:arial;"><i class="fa fa-pencil"></i> Change password</a></p>
                    
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

         
 <script>


          </script>
    </body>
</html>