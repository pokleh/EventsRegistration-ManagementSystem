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
        <title>FAB EVENTS</title>
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
                        <p>Change Password:</p>
                            <label for="password">Old password</label>
                            <input type="password" class="form-control" id="old">
                               
                                 <label for="newpass">New password</label>
                            <input type="password" class="form-control" id="new">
                                
                                <label for="newpass">Confirm password</label>
                            <input type="password" class="form-control" id="confirm">
                                <br>
                            <button class="btn btn-danger" style="float:right;" id="change">Change</button>
                        
        			</div>

                    </div>
        		
        	</div> 
            <input type="text" value="<?php echo $userName; ?>" id="oldUsername" style="display:none;">
        

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

        var old  = $("#old").val();
        var new_p  = $("#new").val();
        var confirm_p  = $("#confirm").val();
        var userID = <?php echo $userID; ?>;

     
      
        if(old == "")
                {
                        $(".alert-danger").html('Please enter your old password');
                        $(".alert-danger").show();
                }

         else if(new_p == "")
                {
                        $(".alert-danger").html('Please enter your new password');
                        $(".alert-danger").show();
                }
                 else if (new_p.length < 8)
        {
            $(".alert-danger").html('Password must be minimum of 8 characters');
            $(".alert-danger").show();
        }
                 else if(confirm_p == "")
                {
                        $(".alert-danger").html('Please confirm your new password');
                        $(".alert-danger").show();
                }

                  else if(confirm_p !=new_p)
                {
                        $(".alert-danger").html('Password didn`t match');
                        $(".alert-danger").show();
                }


       
       
       
        else
        {
            $(".alert-danger").html('');
            $(".alert-danger").hide();


            $.ajax({

                    type:'post',
                    url:'ajax_request/changepassword.php',
                    data:{userID:userID,old:old,new_p:new_p},
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