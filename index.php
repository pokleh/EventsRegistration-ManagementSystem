<!doctype html>
<?php
session_start();

include('php/connection.php');
if(isset($_SESSION['user']))
{
  header("location:fabeventsdashboard");
}
else if(isset($_SESSION['admin']))
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
        <script src='https://www.google.com/recaptcha/api.js'></script>

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
       

<?php include('php/header.php') ?>

        <!--================Header Menu Area =================-->
        
        <!--================Home Banner Area =================-->







  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active" style="background-image: url('img/fav-banner2.jpg');height:550px;">
            <div class="carousel-container">
              <div class="carousel-content">
                <br><br><br><br><br><br>
                <center>
                <h1 style="color:white;font-size:70px;font-family: 'Roboto', sans-serif;font-weight: bold;text-transform: uppercase;line-height: 45px;margin-bottom: 25px;">Fab Events</h1>
                  <p style="color:white;font-size:25px;font-family: 'Roboto', sans-serif;font-weight: bold;text-transform: uppercase;">Catering
Services and Event Management</p>
                       
                        <a class="org_btn" href="#explore">Explore Us</a>
                        <a class="green_btn" href="#sign-in">Make Reservation</a>
                </center>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url('img/fav-banner3.jpg');height:550px;">
           <div class="carousel-container">
              <div class="carousel-content">
                <br><br><br><br><br><br>
                <center>
                <h1 style="color:white;font-size:70px;font-family: 'Roboto', sans-serif;font-weight: bold;text-transform: uppercase;line-height: 45px;margin-bottom: 25px;">Fab Events</h1>
                  <p style="color:white;font-size:25px;font-family: 'Roboto', sans-serif;font-weight: bold;text-transform: uppercase;">Catering
Services and Event Management</p>
                       
                        <a class="org_btn" href="#explore">Explore Us</a>
                        <a class="green_btn" href="#sign-in">Make Reservation</a>
                </center>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url('img/fav-banner4.jpg');height:550px;">
             <div class="carousel-container">
              <div class="carousel-content">
                <br><br><br><br><br><br>
                <center>
                <h1 style="color:white;font-size:70px;font-family: 'Roboto', sans-serif;font-weight: bold;text-transform: uppercase;line-height: 45px;margin-bottom: 25px;">Fab Events</h1>
                  <p style="color:white;font-size:25px;font-family: 'Roboto', sans-serif;font-weight: bold;text-transform: uppercase;">Catering
Services and Event Management</p>
                       
                        <a class="org_btn" href="#explore">Explore Us</a>
                        <a class="green_btn" href="#sign-in">Make Reservation</a>
                </center>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url('img/fav-banner5.jpg');height:550px;">
            <div class="carousel-container">
              <div class="carousel-content">
                <br><br><br><br><br><br>
                <center>
                <h1 style="color:white;font-size:70px;font-family: 'Roboto', sans-serif;font-weight: bold;text-transform: uppercase;line-height: 45px;margin-bottom: 25px;">Fab Events</h1>
                  <p style="color:white;font-size:25px;font-family: 'Roboto', sans-serif;font-weight: bold;text-transform: uppercase;">Catering
Services and Event Management</p>
                       
                        <a class="org_btn" href="#explore">Explore Us</a>
                        <a class="green_btn" href="#sign-in">Make Reservation</a>
                </center>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url('img/fav-banner6.jpg');height:550px;">
            <div class="carousel-container">
              <div class="carousel-content">
               <br><br><br><br><br><br>
                <center>
                <h1 style="color:white;font-size:70px;font-family: 'Roboto', sans-serif;font-weight: bold;text-transform: uppercase;line-height: 45px;margin-bottom: 25px;">Fab Events</h1>
                  <p style="color:white;font-size:25px;font-family: 'Roboto', sans-serif;font-weight: bold;text-transform: uppercase;">Catering
Services and Event Management</p>
                       
                        <a class="org_btn" href="#explore">Explore Us</a>
                        <a class="green_btn" href="#sign-in">Make Reservation</a>
                </center>
              </div>
            </div>
          </div>


          <div class="carousel-item" style="background-image: url('img/fav-banner7.jpg');height:550px;">
            <div class="carousel-container">
              <div class="carousel-content">
                <br><br><br><br><br><br>
                <center>
                <h1 style="color:white;font-size:70px;font-family: 'Roboto', sans-serif;font-weight: bold;text-transform: uppercase;line-height: 45px;margin-bottom: 25px;">Fab Events</h1>
                  <p style="color:white;font-size:25px;font-family: 'Roboto', sans-serif;font-weight: bold;text-transform: uppercase;">Catering
Services and Event Management</p>
                       
                        <a class="org_btn" href="#explore">Explore Us</a>
                        <a class="green_btn" href="#sign-in">Make Reservation</a>
                </center>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- #intro -->
        <!--================End Home Banner Area =================-->
        
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
                    
                     <br><a href="event?category=<?php echo $row['eventCategory'] ?>" class="genric-btn info-border">View more</a>
                            </div>
                </div>
              </div>


                        <?php } ?>




              
            </div>
          </div>
        </section>
        <!--================End Offer Area =================-->
        
      
        
        <!--================Home Gallery Area =================-->
        <section class="home_gallery_area" id="completedevent">
          <div class="container-fluid">
            <div class="main_title">
              <h2>Our Recent Completed Events</h2>
              <p>Our memorable experience through creative events and planning</p>
            </div>
          </div>
          <div class="container">
            <div class="gallery_f_inner row imageGallery1">
                    <div class="col-lg-4 col-md-4 col-sm-6 brand manipul design print">
                        <div class="h_gallery_item">
                            <a href="completedevents?eventid=birthday">
                            
                                <img class="img-fluid" src="img/bday2.jpg" alt="">
                        
                        </div>
                        </a>
                    </div>


                    <div class="col-lg-4 col-md-4 col-sm-6 brand manipul design print">
                        <div class="h_gallery_item">
                              <a href="completedevents?eventid=wedding">
                            
                                <img class="img-fluid" src="img/wed6.png" alt="">
                        
                        </div>
                        </a>
                    </div>


                     <div class="col-lg-4 col-md-4 col-sm-6 brand manipul design print">
                         <div class="h_gallery_item">
                                   <a href="completedevents?eventid=christening">
                            
                                <img class="img-fluid" src="img/cris2.jpg" alt="">
                        
                        </div>
                        </a>
                    </div>
            
          </div>
        </section>
<br><br><br>


  <section class="text_members_area p_120">
            <div class="container">
                <div class="main_title">
                    <h2>Testimonials</h2>
                    <p></p>
                </div>
                <div class="member_slider owl-carousel">
                <?php 
                    $testimonials = $connection->query("SELECT * FROM testimonials");
                    while($rowTesti = $testimonials->fetch_assoc()){
                ?>
                    
                    <div class="item">
                        <div class="member_item">
                         <center><img src="img/<?php echo $rowTesti['img'] ?>" alt="" style="width:100px;height:100px;border-radius:100%;"></center>   
                            <br><p><?php echo ucfirst($rowTesti['testimonials']); ?></p>
                            <h4><?php echo ucwords($rowTesti['name']); ?></h4>
                            <h5><?php echo ucwords($rowTesti['occupation']); ?></h5>
                        </div>
                    </div>

                    <?php } ?>
                  
                   
                </div>
            </div>
        </section>











        <!--================End Home Gallery Area =================-->
        
        <!--================Home Contact Area =================-->
        <br><br>  <br><br>  <br><br>
        <section class="home_contact_area" id="sign-in">
      <div class="left_img">
        <img src="img/left-img.jpg" alt="">
      </div>
      <div class="h_right_form">
        <div class="h_form_inner">
          <h4>Sign in now <br>  and make Reservation</h4>
          <form class="row home_contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
            <div class="form-group col-md-12">
              <input type="text" class="form-control" id="username" name="username" placeholder="Username">
            </div>

                        <div class="form-group col-md-12">
                            <input type="password" class="form-control" id="password" name="Password" placeholder="Password">
                        </div>
            
            
            <img src="img/loading2.gif" alt="" style="width:40px;height:40px;text-align:center;display:none;" id="loading">
            
          </form>
        
                    <div class="form-group col-md-12">

                                 <div class="alert alert-danger" style="display:none;"></div>
        <div class="g-recaptcha" data-sitekey="6Ldn738UAAAAAN1pRaxhbDi4YbWMHmPzySkT8LoV"></div>
</div>
<br>
                            <a href="sign-up" style="float:right;"><button type="submit" value="submit" class="btn submit_btn form-control green_btn">Sign up</button></a>
                            <button type="submit" style="float:right;" id="submit" class="btn submit_btn form-control org_btn">Sign in</button>
                          
                        </div>
        </div>
      </div>
        </section>
        <!--================End Home Contact Area =================-->
        
        <!--================Latest Blog Area =================-->
      
        
        <!--================ start footer Area  =================-->  
       

 
        <?php include('php/footer.php'); ?>


 <div id="ajax_cather"></div>
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




grecaptcha.ready(function() {
grecaptcha.execute('6LeZLX8UAAAAAPTRMs4fxY5qtNFw2d2PiaKmDGcN', {action: 'action_name'})
.then(function(token) {
// Verify the token on the server.
});
});
      
    










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









$(document).ready(function(){

$("#password").keydown(function (e){




    if(e.keyCode == 13)
    {


            var username = $("#username").val();
                var password = $("#password").val();

                if(username == "")
                {

                    $('.alert').html('Please enter username');
                    $(".alert").show();
                }

                 else if(password == "")
                {

                    $('.alert').html('Please enter password');
                    $(".alert").show();
                }
                else if(grecaptcha.getResponse().length == 0)
              {
                     $('.alert').html('Please fill up recaptcha!');
                    $(".alert").show();
                }

                else
                {
                    $("#loading").show();

                        $.ajax({

                            type:'POST',
                            url:'php/signin.php',
                            data:{username:username,password:password},
                            success: function(data)
                                {
                                    $("#ajax_cather").html(data);
                                    $("#loading").hide();
                                }

                        });


                }




    }


    });

});




        $(document).ready(function(){
          $("#submit").click(function(){

            var username = $("#username").val();
            var password = $("#password").val();

        if(username == "")
                {

                    $('.alert').html('Please enter username');
                    $(".alert").show();
                }

                 else if(password == "")
                {

                    $('.alert').html('Please enter password');
                    $(".alert").show();
                }
                
               /*  else if(grecaptcha.getResponse().length == 0)
              {
                     $('.alert').html('Please fill up recaptcha!');
                    $(".alert").show();
                }
                */
                else
                {

                    $("#loading").show();
                        $.ajax({

                            type:'POST',
                            url:'php/signin.php',
                            data:{username:username,password:password},
                            success: function(data)
                                {
                                    $("#ajax_cather").html(data);
                                    $("#loading").hide();
                                }

                        });


                }


          });

        });


  $(document).ready(function(){
        $("#username").keyup(function(){
            $(".alert").hide();
            $(".alert").html('');
      });
    });
        
        </script>
    </body>
</html>