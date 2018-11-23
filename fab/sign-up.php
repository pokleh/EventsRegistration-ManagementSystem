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
       

<?php include('php/header.php') ?>

        <!--================Header Menu Area =================-->
        
        <!--================Home Contact Area =================-->
        <section class="home_contact_area">
			<div class="left_img">
				<img src="img/left-img.jpg" alt="">
			</div>
			<div class="h_right_form">
				<div class="h_form_inner">
					<h4>Sign up now <br>  and make Reservation</h4>
					<form class="row home_contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
						<div class="form-group col-md-12">
							<input type="text" class="form-control" id="fullName" placeholder="Full name">
						</div>

                    
						
                         <div class="form-group col-md-12">
                            <input type="email" class="form-control" id="emailAddress" placeholder="Email Address">
                        </div>
                        
						 
                         <div class="form-group col-md-12">
                            <input type="text" class="form-control" id="userName" placeholder="Username">
                        </div>
                        
                        <div class="form-group col-md-12">
                            <input type="password" class="form-control" id="password" placeholder="Password">
                        </div>

                        
					</form>
                    <div class="form-group col-md-12">
                        <div class="alert alert-danger" style="display:none;"></div>
                            <a style="float:right;cursor:pointer;" id="submit" class="btn submit_btn form-control green_btn">Submit</a>
                          
                          
                        </div>
                          
				</div>
			</div> 

<div id="ajax_cather"></div>

        </section>
        <!--================End Home Contact Area =================-->
        
        <!--================Latest Blog Area =================-->
      
        
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

            var fullName = $("#fullName").val();
            var emailAddress = $("#emailAddress").val();
            var userName = $("#userName").val();
            var password = $("#password").val();


            if(fullName == "")
                {

                    $('.alert').html('Please enter full name');
                    $(".alert").show();
                }
                 if(fullName.length < 6)
                {

                    $('.alert').html('Invalid fullname');
                    $(".alert").show();
                }

                 else if(emailAddress == "")
                {

                    $('.alert').html('Please enter email address');
                    $(".alert").show();
                }

                 else if(userName == "")
                {

                    $('.alert').html('Please enter username');
                    $(".alert").show();
                }

                  else if(userName.length < 6 )
                {

                    $('.alert').html('Username must be 6 characters above');
                    $(".alert").show();
                }


                 else if(password == "")
                {

                    $('.alert').html('Please enter password');
                    $(".alert").show();
                }

                  else if(password.length < 8 )
                {

                    $('.alert').html('Password must be 8 characters above');
                    $(".alert").show();
                }

                

                else
                {


                        $.ajax({

                            type:'POST',
                            url:'php/signup.php',
                            data:{fullName:fullName,emailAddress:emailAddress,userName:userName,password:password},
                            success: function(data)
                                {
                                    $("#ajax_cather").html(data);
                                }

                        });


                }


         });
    });

   $(document).ready(function(){
        $("#fullName").keyup(function(){
            $(".alert").hide();
            $(".alert").html('');
      });
    });
     $(document).ready(function(){
        $("#emailAddress").keyup(function(){
            $(".alert").hide();
            $(".alert").html('');
      });
    });
       $(document).ready(function(){
        $("#userName").keyup(function(){
            $(".alert").hide();
            $(".alert").html('');
      });
    });
         $(document).ready(function(){
        $("#password").keyup(function(){
            $(".alert").hide();
            $(".alert").html('');
      });
    });


</script>
    </body>
</html>