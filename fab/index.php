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
    </head>
    <body>
        
        <!--================Header Menu Area =================-->
       

<?php include('php/header.php') ?>

        <!--================Header Menu Area =================-->
        
        <!--================Home Banner Area =================-->

        <section class="home_banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
                        <h3>Fab Events Catering <br> Services and Event Management </h3>
						
						<a class="org_btn" href="#explore">Explore Us</a>
						<a class="green_btn" href="#sign-in">Make Reservation</a>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Offer Area =================-->
        <section class="offer_area p_120" id="explore">
        	<div class="container">
        		<div class="offer_title">
        			<h5>What we offer for you</h5>
        			<p>Fav events will make sure that every event must start and end with a bang!.</p>
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
        					<img class="img-fluid" src="img/gallery/<?php echo $row['img'] ?>" alt="">
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
        <section class="home_gallery_area">
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
        					<a href="completedevents?event=zaren dion 7th birthday">
        					
        						<img class="img-fluid" src="img/Zarren Dione 7th/cover.jpg" alt="">
        				
        					
        					<div class="g_item_text">
        						<br>
        						<p>Zarren Dione 7th Birthday<p>
        					</div>
        				</div>
        				</a>
        			</div>

        			<div class="col-lg-4 col-md-4 col-sm-6 brand manipul creative">
        				<div class="h_gallery_item">
        					<a href="completedevents?event=bancoro family reunion">
        					
        						<img class="img-fluid" src="img/Bancoro Family Reunion/cover.jpg" alt="">
        				
        					
        					<div class="g_item_text">
        						<br>
        						<p>Bancoro Family Reunion<p>
        					</div>
        				</div>
        				</a>
        			</div>
        			<div class="col-lg-4 col-md-4 col-sm-6 manipul creative design print">
        				<div class="h_gallery_item">
        					<a href="completedevents?event=calvin drake's 1st birthday and christening">
        					
        						<img class="img-fluid" src="img/Calvin Drake's 1st birthday and christening/cover.jpg" alt="">
        				
        					
        					<div class="g_item_text">
        						<br>
        						<p>Calvin Drake's 1st Birthday And Christening<p>
        					</div>
        				</div>
        				</a>
        			</div>
        			<div class="col-lg-4 col-md-4 col-sm-6 brand creative print">
        				<div class="h_gallery_item">
        					<a href="completedevents?event=jerwin and apple wedding">
        					
        						<img class="img-fluid" src="img/Jerwin and Apple Wedding/cover.jpg" alt="">
        				
        					
        					<div class="g_item_text">
        						<br>
        						<p>Jerwin and Apple Wedding<p>
        					</div>
        				</div>
        				</a>
        			</div>
        			<div class="col-lg-4 col-md-4 col-sm-6 brand manipul design">
        				<div class="h_gallery_item">
        					<a href="completedevents?event=godpray 21st birthday">
        					
        						<img class="img-fluid" src="img/Godpray 21st/cover.jpg" alt="">
        				
        					
        					<div class="g_item_text">
        						<br>
        						<p>Godpray 21st Birthday<p>
        					</div>
        				</div>
        				</a>
        			</div>
        			<div class="col-lg-4 col-md-4 col-sm-6 brand creative">
        				<div class="h_gallery_item">
        					<a href="completedevents?event=edna 60th birthday">
        					
        						<img class="img-fluid" src="img/Edna 60th birthday/cover.jpg" alt="">
        				
        					
        					<div class="g_item_text">
        						<br>
        						<p>Edna 60th Birthday<p>
        					</div>
        				</div>
        				</a>
        			</div>
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