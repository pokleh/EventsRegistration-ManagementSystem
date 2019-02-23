<!DOCTYPE html>
<?php 

include('php/session_user.php');

 
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
        <link rel="stylesheet" href="css/bootstrap-datepicker3.css">

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
       

<?php include('php/header-dashboard.php') ?>

  <br><br> 
  <br><br><br><br><br>
        
        
        <!--================Offer Area =================-->
        <section class="offer_area">
        	<div class="container">
        		<?php if(isset($_SESSION['change'])){ ?>
        	<div class="alert alert-success"><?php echo $_SESSION['change']; unset($_SESSION['change']); ?></div>
            <?php } ?>
        		<div class="row offer_inner">
                  <div class="col-md-12">
                             
                <p>Full name: <br> <span style="font-weight:bold;"><?php echo ucwords($fullName); ?></span> <a id="changeFname" style="float:right;color:gray;font-family:arial;cursor:pointer;"><i class="fa fa-pencil"></i> Update full name</a></p>
               


                <div id="ChangeFullName" style="display:none;">
                    <div class="alert alert-danger alert-name" style="display:none;"></div>
                    <label for="">First name</label>
                    <input type="text" id="fName" class="form-control" style="" onkeypress='return event.charCode >= 95 && event.charCode <= 122' autofocus>

                    
                    <label for="">Middle name</label>
                    <input type="text" id="mName" class="form-control" style="" onkeypress='return event.charCode >= 95 && event.charCode <= 122'>

                    <label for="">Last name</label>
                    <input type="text" id="lName" class="form-control" style="" onkeypress='return event.charCode >= 95 && event.charCode <= 122'>

                    <br><button class="btn btn-success btn-sm" id="updateNameButton">Save</button>
                </div>




                <hr>
                <p>Address: <br> <span style="font-weight:bold;"><?php if($address == "") {  echo "<span style='color:red;'>(incomplete)</span>";} else { echo $address; } ?></span> <a id="palit-address" style="cursor:pointer;float:right;color:gray;font-family:arial;"><i class="fa fa-pencil"></i> Update address</a></p>
             



                     <div id="ChangeAddress" style="display:none;">
                    <div class="alert alert-danger alert-name" style="display:none;"></div>
                    <label for="">New Address</label>
                    <input type="text" id="newAddress" class="form-control" style="" autofocus>

                
                    <br><button class="btn btn-success btn-sm" id="updateAddressButton">Save</button>
                </div>


                

 


                <hr>
          
                <p>Contact number: <br> <span style="font-weight:bold;"><?php if($contactNumber == "") {  echo "<span style='color:red;'>(incomplete)</span>";}  else { echo $contactNumber; }  ?></span> <a id="palit-cnumber" style="cursor:pointer;float:right;color:gray;font-family:arial;"><i class="fa fa-pencil"></i> Update contact number</a></p>
              



 




            <div id="ChangeCnumber" style="display:none;">
                    <div class="alert alert-danger alert-name" style="display:none;"></div>
                    <label for="">Contact number  (eg: 0916xxxxxxxx)</label>
                    <input type="text" id="contactNumber" class="form-control" style="" onkeypress='return event.charCode >= 48 && event.charCode 

<= 57' autofocus>

                
                    <br><button class="btn btn-success btn-sm" id="updatebCnumberButton">Save</button>
                </div>


                   
 

                    <hr>
                <p>Email address: <br> <span style="font-weight:bold;"><?php echo $emailAddress; ?></span><a id="palit-email" style="cursor:pointer;float:right;color:gray;font-family:arial;"><i class="fa fa-pencil"></i> Change email address</a></p>   
               



            <div id="ChangeEmail" style="display:none;">
                    <div class="alert alert-danger alert-name" style="display:none;"></div>
                    <label for="">Email address</label>
                    <input type="text" id="emailAddressT" class="form-control" style="" autofocus>

                
                    <br><button class="btn btn-success btn-sm" id="updatebEmailButton">Save</button>
                </div>








                <hr>


                <p>Username: <br> <span style="font-weight:bold;"><?php echo $userName; ?></span><a id="palit-username" style="cursor:pointer;float:right;color:gray;font-family:arial;"><i class="fa fa-pencil"></i> Change username</a></p>   
               

                    <div id="ChangeUsername" style="display:none;">
                    <div class="alert alert-danger alert-name" style="display:none;"></div>
                    <label for="">Username</label>
                    <input type="text" id="username" class="form-control" style="" autofocus>

                
                    <br><button class="btn btn-success btn-sm" id="updatebUsernameButton">Save</button>
                </div>

                    





                <hr>
                <p>Password: <br> <span style="font-weight:bold;">**************</span><a id="palit-password" style="cursor:pointer;float:right;color:gray;font-family:arial;"><i class="fa fa-pencil"></i> Change password</a></p>
                    

                            


                    <div id="ChangePassword" style="display:none;">
                    <div class="alert alert-danger alert-name" style="display:none;"></div>
                 
                    <label for="password">Old password</label>
                            <input type="password" class="form-control" id="old" autofocus>
                               
                                 <label for="newpass">New password</label>
                            <input type="password" class="form-control" id="new">
                                
                                <label for="newpass">Confirm password</label>
                            <input type="password" class="form-control" id="confirm">
                                <br>
                
                    <br><button class="btn btn-success btn-sm" id="updatePasswordnameButton">Save</button>
                </div>




                    </div>
        			
                </div>
<br><br>
<a href="reserveevent?id=<?php echo $_GET['resid'] ?>" class="btn btn-info">Back</a>
        			
        		
        	</div>
             <input type="text" value="<?php echo $userName; ?>" id="oldUsername" style="display:none;">
        </section>
  <br><br>

<div id="ajax_catcher"></div>



<?php

if(isset($_GET['resid']))
{
    echo "<input type='text' value='". $_GET['resid'] ."' id='resid' hidden>";

}
else
{
     echo "<input type='text' value='0' id='resid' hidden>";
}
?>





   
        <!--================End Offer Area =================-->
        
      
    
        
        <!--================ start footer Area  =================-->	
       


        <?php include('php/footerDashboard.php'); ?>

<input type="text" id="addressTest" value="<?php echo $address; ?>" hidden>
<input type="text" id="ContactTest" value="<?php echo $contactNumber; ?>" hidden>
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
          <script src="js/bootstrap-datepicker.min.js"></script>

         
 <script>


$(document).ready(function(){
    $("#palit-password").click(function(){
        $("#ChangePassword").toggle();

$("#ChangeFullName").hide();
$("#ChangeAddress").hide();
$("#ChangebDay").hide();
$("#ChangeCnumber").hide();
$("#ChangeEmail").hide();
$("#ChangeUsername").hide();




    });

});







$(document).ready(function(){
    $("#palit-username").click(function(){
        $("#ChangeUsername").toggle();

$("#ChangeFullName").hide();
$("#ChangeAddress").hide();
$("#ChangebDay").hide();
$("#ChangeCnumber").hide();
$("#ChangeEmail").hide();

$("#ChangePassword").hide();


    });

});

$(document).ready(function(){
    $("#changeFname").click(function(){
        $("#ChangeFullName").toggle();


$("#ChangeAddress").hide();
$("#ChangebDay").hide();
$("#ChangeCnumber").hide();
$("#ChangeEmail").hide();
$("#ChangeUsername").hide();
$("#ChangePassword").hide();

    });

});

$(document).ready(function(){
    $("#palit-address").click(function(){
        $("#ChangeAddress").toggle();


$("#ChangeFullName").hide();

$("#ChangebDay").hide();
$("#ChangeCnumber").hide();
$("#ChangeEmail").hide();
$("#ChangeUsername").hide();
$("#ChangePassword").hide();

    });


});





$(document).ready(function(){
    $("#palit-cnumber").click(function(){
        $("#ChangeCnumber").toggle();

        $("#ChangeFullName").hide();
$("#ChangeAddress").hide();
$("#ChangebDay").hide();

$("#ChangeEmail").hide();
$("#ChangeUsername").hide();
$("#ChangePassword").hide();
    });

});


$(document).ready(function(){
    $("#palit-email").click(function(){
        $("#ChangeEmail").toggle();

        $("#ChangeFullName").hide();
$("#ChangeAddress").hide();
$("#ChangebDay").hide();
$("#ChangeCnumber").hide();

$("#ChangeUsername").hide();
$("#ChangePassword").hide();
    });

});





$(document).ready(function(){
    $("#updateNameButton").click(function(){
        var fName = $("#fName").val();
        var mName = $("#mName").val();
        var lName = $("#lName").val();
        var userID = <?php echo $userID ?>;


                if(fName == "")
                    {
                        $(".alert-name").html('Please enter your first name');
                        $(".alert-name").show();
                    }

                    else if(mName == "")
                    {
                        $(".alert-name").html('Please enter your middle name');
                          $(".alert-name").show();
                    }

                    else if(lName == "")
                    {
                        $(".alert-name").html('Please enter your last name');
                          $(".alert-name").show();
                    }

                        else
                        {
                            $.ajax({

                                type:'post',
                                url:'php/ajax_request/changeFullName.php',
                                data:{fName:fName,mName:mName,lName:lName,userID:userID},
                                success:function(x)
                                {
                                    $("#ajax_catcher").html(x);
                                }
                            });
                        }

 


    });

});





$(document).ready(function(){
    $("#updateAddressButton").click(function(){
         var newAddress = $("#newAddress").val();
         var contactNumber = $("#ContactTest").val();
         var userID = <?php echo $userID ?>;
         var resid = $("#resid").val();


                if(newAddress == "")
                    {
                        $(".alert-name").html('Please enter your new address');
                        $(".alert-name").show();
                    }
                    else if(newAddress.length < 8)
                    {
                        $(".alert-name").html('Invalid address');
                        $(".alert-name").show();
                    }
                    
                  
                        else
                        {

                            $.ajax({

                                type:'post',
                                url:'php/ajax_request/changeAddress.php',
                                data:{newAddress:newAddress,userID:userID,resid:resid,contactNumber:contactNumber},
                                success:function(x)
                                {
                                    $("#ajax_catcher").html(x);
                                }
                            });
                        }




    });

});






 








$(document).ready(function(){
    $("#updatebCnumberButton").click(function(){
        var newAddress = $("#addressTest").val();
        var contactNumber = $("#contactNumber").val();
         var userID = <?php echo $userID ?>;
         var resid = $("#resid").val();


                if(contactNumber == "")
                    {
                        $(".alert-name").html('Please enter your contact number');
                        $(".alert-name").show();
                   }
                   else if(isNaN(contactNumber))
  {
    $(".alert-name").html('Invalid contact number');
   $(".alert-name").show();
   
  }

  else if(contactNumber.length != 11)
  {
    $(".alert-name").html('Invalid contact number');
   $(".alert-name").show();
   
  }

  else if(contactNumber.substring(0,2) != "09")
  {
    $(".alert-name").html('Invalid contact number');
   $(".alert-name").show();
   
  }
                  
                        else
                        {
                            $.ajax({

                                type:'post',
                                url:'php/ajax_request/changeCnumber.php',
                                data:{contactNumber:contactNumber,userID:userID,resid:resid,newAddress:newAddress},
                                success:function(x)
                                {
                                    $("#ajax_catcher").html(x);
                                }
                            });
                        }




    });

});







$(document).ready(function(){
    $("#updatebEmailButton").click(function(){
        var emailAddressT = $("#emailAddressT").val();
   var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var userID = <?php echo $userID ?>;

if(emailAddressT == "")
            {
                    $(".alert-name").html("Please enter email address");
                    $(".alert-name").show();
            }
                  
                else if(regex.test(emailAddressT) == false)
            {
                    $(".alert-name").html("Invalid email address");
                    $(".alert-name").show();
            }

            
                        else
                        {
                            $.ajax({

                                type:'post',
                                url:'php/ajax_request/changeEmail.php',
                                data:{emailAddressT:emailAddressT,userID:userID},
                                success:function(x)
                                {
                                    $("#ajax_catcher").html(x);
                                }
                            });
                        }




    });

});






$(document).ready(function(){
    $("#updatebUsernameButton").click(function(){
        var username  = $("#username").val();
        var userID = <?php echo $userID; ?>;
        var oldUsername = $("#oldUsername").val();
      
        if(username == "")
                {
                        $(".alert-name").html('Please enter your username');
                        $(".alert-name").show();
                }
 

        else if (username == oldUsername)
        {
            $(".alert-name").html('You currently using this username');
            $(".alert-name").show();
        }
        else if (username.length < 5)
        {
            $(".alert-name").html('Username too short');
            $(".alert-name").show();
        }
       
        else
        {
            $(".alert-name").html('');
            $(".alert-name").hide();


            $.ajax({

                    type:'post',
                    url:'php/ajax_request/changeusername.php',
                    data:{userID:userID,username:username},
                    success:function(x)
                    {
                        $("#ajax_catcher").html(x);
                        
                    }

            });
        }





    });

});





$(document).ready(function(){
    $("#updatePasswordnameButton").click(function(){
       
        var old  = $("#old").val();
        var new_p  = $("#new").val();
        var confirm_p  = $("#confirm").val();
        var userID = <?php echo $userID; ?>;

     
      
        if(old == "")
                {
                        $(".alert-name").html('Please enter your old password');
                        $(".alert-name").show();
                }

         else if(new_p == "")
                {
                        $(".alert-name").html('Please enter your new password');
                        $(".alert-name").show();
                }
                 else if (new_p.length < 8)
        {
            $(".alert-name").html('Password must be minimum of 8 characters');
            $(".alert-name").show();
        }
                 else if(confirm_p == "")
                {
                        $(".alert-name").html('Please confirm your new password');
                        $(".alert-name").show();
                }

                  else if(confirm_p !=new_p)
                {
                        $(".alert-name").html('Password didn`t match');
                        $(".alert-name").show();
                }


       
       
       
        else
        {

            $.ajax({

                    type:'post',
                    url:'php/ajax_request/changepassword.php',
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