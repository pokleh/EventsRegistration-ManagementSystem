<!doctype html>

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
    </head>
    <body>
        
        <!--================Header Menu Area =================-->
       <?php include('php/header.php'); ?>
            <?php include('php/connection.php'); ?>
        <!--================Header Menu Area =================-->
        
        <!--================Home Banner Area =================-->
      
        <!--================End Home Banner Area =================-->
        
        <!--================About Area =================-->
        <section class="about_area p_120">
            <div class="container">
                <div class="row about_inner">
                    <div class="col-lg-12">
                      <center><h3>

<?php

$token =$_GET['token'];
if($connection->query("UPDATE user_account SET emailStatus ='verified' WHERE code = '$token'"))
{

?>
       Email Successfully Verified! Thank you for signing-up in our web site. <br> <br>
   
       <a href="index#sign-in" class="btn btn-success">Sign in now</a>

<?php } ?>
                       <h3></center>  
                    </div>
                    
            </div>
        </section>
        <!--================End About Area =================-->
        
       
        <!--================ start footer Area  =================-->    
                    <?php include('php/footer.php'); ?>
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
    </body>
</html>