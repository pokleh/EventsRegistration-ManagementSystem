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
           <style>


.mySlides 
{
    display:none;
transition: 0.4s;
 -webkit-animation: fadein 2s; /* Safari, Chrome and Opera > 12.1 */
       -moz-animation: fadein 2s; /* Firefox < 16 */
        -ms-animation: fadein 2s; /* Internet Explorer */
         -o-animation: fadein 2s; /* Opera < 12.1 */
            animation: fadein 2s;
}

.mySlides2
{
    display:none;
transition: 0.4s;
-webkit-animation: fadein 2s; /* Safari, Chrome and Opera > 12.1 */
       -moz-animation: fadein 2s; /* Firefox < 16 */
        -ms-animation: fadein 2s; /* Internet Explorer */
         -o-animation: fadein 2s; /* Opera < 12.1 */
            animation: fadein 2s;
}

.mySlides3
{
    display:none;
transition: 0.4s;
-webkit-animation: fadein 2s; /* Safari, Chrome and Opera > 12.1 */
       -moz-animation: fadein 2s; /* Firefox < 16 */
        -ms-animation: fadein 2s; /* Internet Explorer */
         -o-animation: fadein 2s; /* Opera < 12.1 */
            animation: fadein 2s;
}
.mySlides4
{
    display:none;
transition: 0.4s;
-webkit-animation: fadein 2s; /* Safari, Chrome and Opera > 12.1 */
       -moz-animation: fadein 2s; /* Firefox < 16 */
        -ms-animation: fadein 2s; /* Internet Explorer */
         -o-animation: fadein 2s; /* Opera < 12.1 */
            animation: fadein 2s;
}


@keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Firefox < 16 */
@-moz-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Safari, Chrome and Opera > 12.1 */
@-webkit-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Internet Explorer */
@-ms-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Opera < 12.1 */
@-o-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

</style>
    </head>
    <body>
        
        <!--================Header Menu Area =================-->
        

<?php include('php/header-dashboard.php'); ?>

  
        
        <!--================Offer Area =================-->
       <section class="offer_area p_120" id="explore">
            <div class="container">
                <div class="offer_title">
                    <h5>What we offer for you</h5>
                    <p>Fab events will make sure that every event must start and end with a bang!.</p>
                </div>

                <div class="row offer_inner">


                    <?php

                        $select = "SELECT * FROM events GROUP BY eventCategory ORDER BY eventTitle ASC";
                        $result = $connection->query($select);
                        while($row = $result->fetch_assoc())
                        {

                     ?>


                    <div class="col-lg-3">
                        <div class="offer_item">
                             <?php if($row['eventCategory'] == "wedding") { ?>
                                <img class="img-fluid mySlides" src="img/gallery/<?php echo $row['img'] ?>" alt="">
                           
                             <img class="mySlides" src="img/wedding/1.jpg" style="width:100%">
                            <img class="mySlides" src="img/wedding/2.jpg" style="width:100%">
                            <img class="mySlides" src="img/wedding/3.jpg" style="width:100%">  
                         <img class="mySlides" src="img/wedding/4.jpg" style="width:100%">
                            <img class="mySlides" src="img/wedding/5.jpg" style="width:100%">
                            <img class="mySlides" src="img/wedding/6.jpg" style="width:100%">
                             <img class="mySlides" src="img/wedding/7.jpg" style="width:100%">

                            <?php } ?>


                            
                             <?php if($row['eventCategory'] == "birthday") { ?>
                                <img class="img-fluid mySlides2" src="img/gallery/<?php echo $row['img'] ?>" alt="">
                           
                             <img class="mySlides2" src="img/birthday/1.jpg" style="width:100%">
                            <img class="mySlides2" src="img/birthday/2.jpg" style="width:100%">
                            <img class="mySlides2" src="img/birthday/3.jpg" style="width:100%">  
                         <img class="mySlides2" src="img/birthday/4.jpg" style="width:100%">
                            <img class="mySlides2" src="img/birthday/5.jpg" style="width:100%">
                            <img class="mySlides2" src="img/birthday/6.jpg" style="width:100%">
                             <img class="mySlides2" src="img/birthday/7.jpg" style="width:100%">

                            <?php } ?>


                              <?php if($row['eventCategory'] == "christening") { ?>
                                <img class="img-fluid mySlides3" src="img/gallery/<?php echo $row['img'] ?>" alt="">
                           
                             <img class="mySlides3" src="img/christening/1.jpg" style="width:100%">
                            <img class="mySlides3" src="img/christening/2.jpg" style="width:100%">
                            <img class="mySlides3" src="img/christening/3.jpg" style="width:100%">  
                         <img class="mySlides3" src="img/christening/4.jpg" style="width:100%">
                            <img class="mySlides3" src="img/christening/5.jpg" style="width:100%">
                            <img class="mySlides3" src="img/christening/6.jpg" style="width:100%">
                             <img class="mySlides3" src="img/christening/7.jpg" style="width:100%">

                            <?php } ?>


                                <?php if($row['eventCategory'] == "others") { ?>
                                <img class="img-fluid mySlides4" src="img/gallery/<?php echo $row['img'] ?>" alt="">
                           
                             <img class="mySlides4" src="img/others/1.jpg" style="width:100%">
                            <img class="mySlides4" src="img/others/2.jpg" style="width:100%">
                            <img class="mySlides4" src="img/others/3.jpg" style="width:100%">  
                         <img class="mySlides4" src="img/others/4.jpg" style="width:100%">
                            <img class="mySlides4" src="img/others/5.jpg" style="width:100%">
                            <img class="mySlides4" src="img/others/6.jpg" style="width:100%">
                             <img class="mySlides4" src="img/others/7.jpg" style="width:100%">

                            <?php } ?>


                            <div class="offer_text">
                                <h4><?php echo $row['eventTitle'] ?></h4>
                                
                               <br><a href="reserveeventcategory?category=<?php echo $row['eventCategory'] ?>" class="genric-btn info-border">View more</a>
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

        <script>


var myIndex = 0;
carouselWedding();
carouselBirthday();
carouselChristening();
carouselOthers();
function carouselWedding() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carouselWedding, 3000); // Change image every 2 seconds
}

function carouselBirthday() {
    var i;
    var x = document.getElementsByClassName("mySlides2");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carouselBirthday, 3000); // Change image every 2 seconds
}

function carouselChristening() {
    var i;
    var x = document.getElementsByClassName("mySlides3");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carouselChristening, 3000); // Change image every 2 seconds
}

function carouselOthers() {
    var i;
    var x = document.getElementsByClassName("mySlides4");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carouselOthers, 3000); // Change image every 2 seconds
}



        </script>
    </body>
</html>