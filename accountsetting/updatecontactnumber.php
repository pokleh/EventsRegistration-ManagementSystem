<!DOCTYPE html>
<?php 

include('../php/session_user_account.php');


?>

 
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/favicon.png" type="image/png">
       <title>FAB EVENTS - System Admin</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../vendors/linericon/style.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        <link rel="stylesheet" href="../vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="../vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="../vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="../vendors/animate-css/animate.css">
        <!-- main css -->
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/responsive.css">
        <link rel="stylesheet" href="../css/bootstrap-datepicker3.css">

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
       

<?php include('../php/header-dashboard_account.php') ?>

  <br><br> 
  <br><br><br><br><br>
        
        
        <!--================Offer Area =================-->
        <section class="offer_area">
        	<div class="container">
        		
        	
        		<div class="row offer_inner">
                  <div class="col-md-5">
                        <div class="alert alert-danger" style="display:none;"></div>
                        <p>Update contact number <?php echo $contactNumber; ?> to:</p>
                            <input type="text" class="form-control" id="contactNumber" placeholder="eg:09XXXXXXXXX">
                                <br>
                            <button class="btn btn-danger" style="float:right;" id="change">Change</button>
                        
        			</div>
                    </div>
        		
        	</div>
        </section>
  <br><br>

<div id="ajax_catcher"></div>


   
        <!--================End Offer Area =================-->
        
      
    
        
        <!--================ start footer Area  =================-->	
       


        <?php include('../php/footerDashboardAccount.php'); ?>



		<!--================ End footer Area  =================-->
        
        
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="../js/jquery-3.2.1.min.js"></script>
        <script src="../js/popper.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/stellar.js"></script>
        <script src="../vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="../vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="../vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="../vendors/isotope/isotope-min.js"></script>
        <script src="../vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="../js/jquery.ajaxchimp.min.js"></script>
        <script src="../vendors/counter-up/jquery.waypoints.min.js"></script>
        <script src="../vendors/counter-up/jquery.counterup.js"></script>
        <script src="../js/mail-script.js"></script>
        <script src="../js/theme.js"></script>
          <script src="../js/bootstrap-datepicker.min.js"></script>


<script>
    

$(document).ready(function(){
    $("#change").click(function(){

        var contactNumber  = $("#contactNumber").val();
        var userID = <?php echo $userID; ?>;
        var sub = contactNumber.substring(0,2);
      
        if(contactNumber == "")
                {
                        $(".alert").html('Please enter your contact number');
                        $(".alert").show();
                }

        else if (contactNumber.length < 11)
        {
            $(".alert").html('Invalid contact number');
            $(".alert").show();
        }
        else if (isNaN(contactNumber))
        {
            $(".alert").html('Invalid contact number');
            $(".alert").show();
        }
        else if (sub != 09)
        {
            $(".alert").html('Invalid contact number');
            $(".alert").show();
        }
        else
        {
            $(".alert").html('');
            $(".alert").hide();


            $.ajax({

                    type:'post',
                    url:'ajax_request/changecontactNumber.php',
                    data:{userID:userID,contactNumber:contactNumber},
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