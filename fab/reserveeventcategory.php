<!DOCTYPE html>

<?php 

include('php/session.php');
if(isset($_SESSION['admin']))
{
    header("location:admin/");
}

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
    </head>
    <body>
        
        <!--================Header Menu Area =================-->
       

<?php include('php/header-dashboard.php') ?>

  
        
        <!--================Offer Area =================-->
        <section class="offer_area p_120">
            <div class="container">
                <div class="offer_title">
                    <h5>What we offer for you</h5>
                    <p>Fav events will make sure that every event must start and end with a bang!.</p>
                </div>
                <div class="row offer_inner">
             <div class="row offer_inner">


                    <?php
                        $category = mysqli_escape_string($connection,$_GET['category']);
                        $select = "SELECT * FROM events WHERE eventCategory = '$category' ORDER BY eventTitle ASC";
                        $result = $connection->query($select);
                        while($row = $result->fetch_assoc())
                        {

                     ?>


                    <div class="col-lg-4">
                        <div class="offer_item">
                            <img class="img-fluid" src="img/gallery/<?php echo $row['img'] ?>" alt="">
                            <div class="offer_text">
                                <h4><?php echo ucwords($row['eventTitle']) . "(" . $row['pax'] . "pax)" ?></h4>
                                <p><?php echo substr($row['eventInfo'],1,40); ?></p>
                               <br>

              
                               <a href="reserveevent?id=<?php echo $row['id'] ?>" class="genric-btn info-border">View more</a>
                            </div>
                        </div>
                    </div>


                        <?php } ?>




                    
                </div>
            </div>
        </section>
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
    </body>
</html>