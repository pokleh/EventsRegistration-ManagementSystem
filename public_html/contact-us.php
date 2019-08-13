<?php session_start(); ?>
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
        <!--================Header Menu Area =================-->
        
        <!--================Home Banner Area =================-->
       <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
                <div class="container">
                    <div class="banner_content text-center">
                        <div class="page_link">
                            <a href="index">Home</a>
                            <a href="contact-us">Contact</a>
                        </div>
                        <h2>Contact Us</h2>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Contact Area =================-->
      <br><br>  <br><br>
            <div class="container">
              
              <?php if(isset($_SESSION['sent']))
              { ?>
              <div class="alert alert-success">Message Successfully sent</div>
              <?php } 

                unset($_SESSION['sent'] );
              ?>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="contact_info">
                            <div class="info_item">
                                 <i class="lnr lnr-home"></i>
                                <h6>326 Buli Taal, Batangas</h6>
                                <p>Batanggas</p>
                            </div>
                            <div class="info_item">
                                <i class="lnr lnr-phone-handset"></i>
                                <h6><a href="#">0935633743</a></h6>
                                <p>Mon to Sun 9am to 12 am</p>
                            </div>
                            <div class="info_item">
                                <i class="lnr lnr-envelope"></i>
                                <h6><a href="#">rosebar_0716@yahoo.com</a></h6>
                                <p>Send us your query anytime!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                       
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" name="message" id="message" rows="1" placeholder="Enter Message"></textarea>
                                </div>
                                <br>
                                <div class="alert alert-danger" style="display:none;" ></div>
                            </div>
                            <div class="col-md-12 text-right">
                                <button type="submit" id="submit" class="btn submit_btn">Send Message</button>
                            </div>
                       
                    </div>
                </div>
            </div>
        </section>

        <div id="ajax_catcher"></div>
        <!--================End About Area =================-->
          <br><br>  <br><br>
       
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



 


<script>
    
$(document).ready(function(){
    $("#submit").click(function(){

var name = $("#name").val();
var email = $("#email").val();
var subject =$("#subject").val();
var message =$("#message").val();
var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;


if(name == "")
{
    $('.alert-danger').html('Enter your name');
    $('.alert-danger').show();
}

else if(email == "")
{
    $('.alert-danger').html('Enter your email address');
    $('.alert-danger').show();
}


 else if(regex.test(email) == false)
            {
                    $(".alert-danger").html("Invalid email address");
                    $(".alert-danger").show();
            }


else if(subject == "")
{
    $('.alert-danger').html('Enter your subject');
    $('.alert-danger').show();
}


else if(message == "")
{
    $('.alert-danger').html('Enter your message');
    $('.alert-danger').show();
}



else
{
    $.ajax({

        type:'post',
        url:'php/message.php',
        data:{ 
            name:name,
            email:email,
            subject:subject,
            message:message,
        },
        success:function(x)
            {
                $("#ajax_catcher").html(x);
            }

    });
}




    });

});

</script>






    </body>
</html>