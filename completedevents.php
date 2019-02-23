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
       <?php include('php/header.php');
        include('php/connection.php');

$event = mysqli_escape_string($connection,$_GET['eventid']);
        ?>
        <!--================Header Menu Area =================-->
        
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
				<div class="container">
					<div class="banner_content text-center">
						<div class="page_link">
							<a href="index">Home</a>
						<a href="index#completedevent">Completed Event</a>
						</div>
						<h2><?php echo ucwords($event); ?></h2>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================About Area =================-->
         <section class="home_gallery_area" style="margin-top:100px;">
            
            <div class="container">
                 <div class="gallery_f_inner row imageGallery1">
                    
                  

                           
                <?php


                    $query = $connection->query("SELECT * FROM completedevents WHERE eventCategory = '$event' ORDER BY eventCategory ASC");
                        while($row = $query->fetch_assoc())
                            {  ?>
                                <div class="col-lg-4 col-md-4 col-sm-6 brand manipul design print">
                        <div class="h_gallery_item" style="margin-top:50px;">
                            <a href="viewcompletedevent?eventid=<?php echo $row['id'] ?>">
                            
                                <img class="img-fluid" src="img/completedevent/<?php echo $row['coverPhoto'] ?>" style="width:100%;height:300px;" alt="">
                        </a>
                            
                            <div class="g_item_text">
                                <br>
                                <p style="text-align:center;"><p>
                                   <center>

                                    <a href="viewcompletedevent?eventid=<?php echo $row['id'] ?>"><?php echo ucwords($row['eventName']) ?></a>
                                   
                                </center>
                            </div>
                        </div>
                        
                    </div>
                            
                            <?php } ?>
                   
                  
                 
                </div>
            </div>
        </section>
        <br><br><br>
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