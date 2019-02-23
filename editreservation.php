<!DOCTYPE html>
<?php 

include('php/session_user.php');
include('php/events.php');

$eventID = mysqli_escape_string($connection,$_GET['id']);
 if($connection->query("DELETE FROM foodChoice WHERE status = 'semiapproved' "))
{

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
        <link rel="stylesheet" href="css/bootstrap-datepicker3.css">
                <link href="css/custombox.min.css" rel="stylesheet">

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
b{
    color: black;
}

#ul > li{
float:left;
text-decoration: none;
list-style-type:none;
margin-left: 5px;
}
#menuList > li{
display: inline-block;
text-decoration: none;
list-style-type:none;
margin-left: 15px;
border-right:  1px solid #cccccc;
padding-right: 20px;
}
 
body
{
  overflow-x:hidden;
}
#pack > li{
  
 
  margin-top: 10px;
}

</style>
    </head>
    <body>
        
        <!--================Header Menu Area =================-->
       

<?php include('php/header-dashboard.php') ?>

  <br><br> <br><br><br><br><br>
        
        <!--================Offer Area =================-->
        <section class="offer_area">
        	<div class="container-fluid">
        		
        		<?php if(isset($_SESSION['success'])) { ?>
		<div class="alert alert-success alert-can" style=""><?php echo $_SESSION['success']; ?></div>
		<?php }
		unset($_SESSION['success']);
		 ?>

        		<h4>Edit reservation</h4>
        		<div class="row offer_inner">

						<div class="col-lg-12">

                      
							 
							<?php
$select = "SELECT events.eventTitle, events.id , events.eventTitle,events.eventInfo,events.eventPrice,events.foodIncluded,events.img,reservedcustomer.id,reservedcustomer.eventID,reservedcustomer.theme,reservedcustomer.request,reservedcustomer.startTime,reservedcustomer.startFor, reservedcustomer.endTime,reservedcustomer.endTimeFor, reservedcustomer.dateReserved,reservedcustomer.packs,reservedcustomer.paymentMethod,reservedcustomer.paymentStatus,reservedcustomer.status FROM reservedcustomer
INNER JOIN events ON reservedcustomer.eventID = events.id
 WHERE reservedcustomer.id = '$eventID' ;
";
								$result = $connection->query($select);
								if($result->num_rows > 0)
								{
								$rowedit = $result->fetch_assoc();

                $resEveID = $rowedit['eventID'];

 

							
							}
							 ?>
							 		

<div class="container-fluid">

									<div class="row">
										<div class="col-md-4">

											<label for="">Event</label>
											<input type="text" id="event" value="<?php echo $rowedit['eventTitle'] ?>" class="form-control" style="" disabled>
												
												<br>
											
											<label for="">Date Reserved</label>
											<input type="text" id="event" value="<?php echo $rowedit['dateReserved'] ?>" class="form-control" style="" disabled>

											<br>
											
											<label for="">Event Price</label>
											<input type="text" id="event" value="<?php echo "₱" . number_format($rowedit['eventPrice'] + 30000); ?>" class="form-control" style="" disabled>


										</div>




										<div class="col-md-4">
											<label for="">Reserved Time</label>
										 <ul id="ul" style="">
                           <li > <select name="" id="startTime" class="form-control">
                           	<option value="<?php echo $rowedit['startTime'] ?>"><?php echo $rowedit['startTime'] ?></option>
                              <option value="12">12</option>
                                <option value="1">1</option>
                                  <option value="2">2</option>
                                    <option value="3">3</option>
                                      <option value="4">4</option>
                                        <option value="5">5</option>
                                          <option value="6">6</option>
                                            <option value="7">7</option>
                                              <option value="8">8</option>
                                                <option value="9">9</option>
                                                  <option value="10">10</option>
                                                    <option value="11">11</option>
                            </select> </li> 

                             <li>  <select name="" id="startFor" class="form-control" style="">
                             	<option value="<?php echo $rowedit['startFor']; ?>"><?php echo $rowedit['startFor']; ?></option>
                              <option value="am">AM</option>
                               <option value="am">PM</option>
                            </select>  </li> 

                                      <li><span>to</span></li>

                    
                    <li > <select name="" id="endTime" class="form-control">
                            	<option value="<?php echo $rowedit['endTime']; ?>"><?php echo $rowedit['endTime']; ?></option>
                               <option value="12">12</option>
                                <option value="1">1</option>
                                  <option value="2">2</option>
                                    <option value="3">3</option>
                                      <option value="4">4</option>
                                        <option value="5">5</option>
                                          <option value="6">6</option>
                                            <option value="7">7</option>
                                              <option value="8">8</option>
                                                <option value="9">9</option>
                                                  <option value="10">10</option>
                                                    <option value="11">11</option>
                            </select> </li> 

                             <li>  <select name="" id="endFor" class="form-control" style="">
                             	<option value="<?php echo $rowedit['endTimeFor']; ?>"><?php echo $rowedit['endTimeFor']; ?></option>
                             
                              <option value="am">AM</option>
                               <option value="am">PM</option>
                            </select>  </li> 


                            </ul>
                          <br><br>
									<a style="cursor:pointer;color:#4285f4;" onclick="modalTheme.open();"><i class="fa fa-hand-pointer-o"></i> Click to here select theme</a>
                           <input type="text" class="form-control" id="choosenTheme" value="<?php echo ucwords($rowedit['theme']) ?>" style="width:340px;"disabled>


<br>

										<a style="cursor:pointer;color:#4285f4;"></i> Request</a><br>
										<textarea name="" id="request" cols="45" rows="4"><?php echo ucfirst($rowedit['request']); ?></textarea>






										</div> <!----end of Col ------>

				<div class="col-md-4">
					<h4>Your Food:</h4>

								 <a style="cursor:pointer;color:#4285f4;" onclick="modalMenu.open();"><i class="fa fa-hand-pointer-o"></i>  Click Here for menu</a>
                              <br><br>
					<div id="foodChoose"></div>
				</div>


									</div> <!----end of Row ------>






<hr>
<h4>Event Package</h4>

<div class="row">
    <div class="col-md-5">

        <h6>VENUE INCLUDED</h6>
        <ul id="pack">
          <?php

                 $select2 = "SELECT * FROM packagechoices WHERE eventID = '$resEveID' AND userID = '$userID'";
                  $result2 = $connection->query($select2);
                    while($row2 = $result2->fetch_assoc())
                    {

                  
                    
               
           ?>


           <li><input type="checkbox" class="packIncluded" id ="<?php echo $row2['packageID'] ?>" value="<?php echo $row2['packageID'] ?>" <?php if($row2['confirmStatus'] == 'ok') { echo "checked"; } ?>> <?php echo $row2['package'] ?></li>

 
           <?php } ?>
        </ul>
       

          <br>
         
    </div>
</div>








									<div class="row">
										<div class="col-md-12">
											<button id="reserved" class="btn btn-info" style="float:right;">Update</button>
										</div>
									</div>
									<br>












<div id="modalMenu" class="demo-modal" style="display:none;background-color:white;overflow-x:auto;">
   <div class="container">

     <br>
     <div>
      <button type="button" class="btn btn-outline btn-info demo-close-btn" onclick="Custombox.modal.close();">Close</button>
      
<br><br>
 <h5 stlye="font-family: 'Open Sans', sans-serif;float:left;">Please choose your food according to your food included below: </h5>
<b> <?php echo " - " . $rowedit['foodIncluded']; ?></b>
 
</div>

 <center>
             <ul id="menuList">
             
                 <li><a style="cursor:pointer;color:#4f7bff;" class="category" id="beef">Beef</a></li>
                   <li><a style="cursor:pointer;color:#4f7bff;" class="category" id="chicken">Chicken</a></li>
                      <li><a style="cursor:pointer;color:#4f7bff;" class="category" id="pork">Pork</a></li>
                          <li><a style="cursor:pointer;color:#4f7bff;" class="category" id="fish">Fish</a></li>
                              <li><a style="cursor:pointer;color:#4f7bff;" class="category" id="vegetables">Vegetables</a></li>
                                  <li><a style="cursor:pointer;color:#4f7bff;" class="category" id="pasta">Pasta</a></li>
                                      <li><a style="cursor:pointer;color:#4f7bff;" class="category" id="drinks">Drinks</a></li>
                                          <li><a style="cursor:pointer;color:#4f7bff;" class="category" id="dessert">Dessert</a></li>

             </ul>
   </center>
 
   <hr>




   <div id="categoryContainer">
  
   </div>



   </div> 


       </div> <!----END OF CUSTOME MODAL---->














<div id="modalTheme" class="demo-modal" style="display:none;background-color:white;overflow-x:auto;">
   <div class="container">

     <br>
     <div>
      <button type="button" class="btn btn-outline btn-info demo-close-btn" onclick="Custombox.modal.close();">Close</button>
      
<br><br>
       

<?php

$Eventid = $_GET['id'];

$cusQuery = "SELECT * FROM reservedcustomer WHERE id = '$Eventid'";
$cusEventid = $connection->query($cusQuery)->fetch_assoc();

$catEventID = $cusEventid['eventID'];

$query = "SELECT * FROM events WHERE id = '$catEventID'";
$result = $connection->query($query);
$row = $result->fetch_assoc();
$eventCategory = $row['eventCategory'];




if($eventCategory == "birthday")
{
?>
             <h4 id="themFor" style="">Theme for girls</h4>
              <button id="boys" class="btn btn-info btn-sm boys" style="float:right;cursor:pointer;">For boys</button>
              <button id="girls" class="btn btn-info  btn-sm girls" style="float:right;margin-right:10px;cursor:pointer;">For girls</button>
   <br><br>

<?php
  $selectTheme = "SELECT * FROM theme WHERE category = '$eventCategory' AND sex = 'girls'";
            $resultTheme = $connection->query($selectTheme);
}

else
{
      $selectTheme = "SELECT * FROM theme WHERE category = '$eventCategory'";
            $resultTheme = $connection->query($selectTheme);

    	echo $eventCategory;
}

 ?>
            
        
     <div class="themContainer">
        <?php
           while($rowTheme = $resultTheme->fetch_assoc())
                    {


        ?>


                        <img src="img/<?php $rowTheme['theme']; ?>" alt="" style="width:100%;">
                        <br><br>
                        <h5><?php echo ucwords($rowTheme['theme']) ?> <button class="btn btn-success btn-sm selectTheme" id="<?php echo $rowTheme['theme'] ?>" onclick="Custombox.modal.close();">Select theme</button>
                        </h5>
                        <hr>





        <?php } ?> 
   </div> 


       </div> <!----END OF CUSTOME MODAL THEME---->



        	</div>
        </section>
  <br><br>














<div id="ajax_catcher"></div>

 <input type="text" id="totalCount" hidden>
   
        <!--================End Offer Area =================-->
        
      
    
        
        <!--================ start footer Area  =================-->	
       


        <?php include('php/footerDashboard.php'); ?>



		<!--================ End footer Area  =================-->
        
        

        <?php



         ?>
        
        
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
            <script src="js/custombox.min.js"></script>
          <script src="js/custombox.legacy.min.js"></script>



         
 <script>

$(document).ready(function(){
    $('.packIncluded').on('change', function(){
     
      var packID = $(this).val();
      var eventID = <?php echo $resEveID ?>;
      var userID = <?php echo $userID ?>;

 
   if(this.checked)
    {
     
     $.ajax({
      type:'post',
      url:'php/packCheck.php',
      data:{packID:packID,eventID:eventID,userID:userID},
      success:function(x){
        $("#ajax_catcher2").html(x);
      }

     });
 
    }
    else
    {
      

       $.ajax({
      type:'post',
      url:'php/packUnCheck.php',
      data:{packID:packID,eventID:eventID,userID:userID},
      success:function(x){
        $("#ajax_catcher2").html(x);
      }

     });



    }
})
  });



function countFood()
{

  var userID = <?php echo $userID; ?>;
  var eventID = <?php echo $resEveID; ?>;


  $.ajax({

        type:'post',
        url:'php/countFoodEdit.php',
        data:{userID:userID,eventID:eventID},
        success:function(data)
        {
           $("#ajax_catcher").html(data);
        }
      });



}

setInterval(countFood,1000);







var modalMenu = new Custombox.modal({
  content: {
    effect: 'rotate',
    target: '#modalMenu',
    fullscreen:true
  }
});



$(document).ready(function(){
    $(".category").click(function(){

        var category = $(this).attr('id');
        var id = <?php echo $_GET['id']; ?>;
        var userID = <?php echo $userID ?>;
		var eventID =<?php echo $catEventID ?>;

      
      $.ajax({

        type:'post',
        url:'php/menuCategoryEdit.php',
        data:{category:category,id:id,userID:userID,eventID:eventID},
        success:function(x)
          {
            $("#categoryContainer").html(x);
          }

      });

     
        
    });

 });


function viewFoodChoice()
{


  var userID = <?php echo $userID; ?>;
  var eventID = <?php echo $resEveID; ?>;



  $.ajax({

        type:'post',
        url:'php/viewFoodChose.php',
        data:{userID:userID,eventID:eventID},
        success:function(data)
        {
          $("#foodChoose").html(data);
        }
      });



}

setInterval(viewFoodChoice,1000);
















var modalTheme = new Custombox.modal({
  content: {
    effect: 'rotate',
    target: '#modalTheme',
    fullscreen:true
  }
});








$(document).ready(function(){
    $(".boys").click(function(){

        var sex = $(this).attr('id');


        $.ajax({


            type:'post',
            url:'php/modaltheme.php',
            data:{sex:sex},
            success:function(x)
                {
                    $(".themContainer").html(x);
                    $("#themFor").html('Theme for ' + sex);
                }


        });
        
    });

 });



$(document).ready(function(){
    $(".selectTheme").click(function(){

        var theme = $(this).attr('id');

        $("#choosenTheme").val(theme);
   

     
        
    });

 });














$(document).ready(function(){
    $(".girls").click(function(){

        var sex = $(this).attr('id');


        $.ajax({


            type:'post',
            url:'php/modaltheme.php',
            data:{sex:sex},
            success:function(x)
                {
                    $(".themContainer").html(x);
                    $("#themFor").html('Theme for ' + sex);
                }


        });
        
    });

 });











$(document).ready(function(){
  $("#reserved").click(function(){

    var userID = <?php echo $userID; ?>;
  	var eventID = <?php echo $catEventID; ?>;
    
    var startTime = $("#startTime").val();
    var startFor = $("#startFor").val();
    var endTime = $("#endTime").val();
    var endFor = $("#endFor").val();
	 var request = $("#request").val();
    var choosenTheme = $("#choosenTheme").val();
      var eid = <?php echo $eventID ?>;

    	if(totalCount == 0)
        {
           alert('Select your food');
        }
       
      else
      {
 

    $.ajax({

      type:'POST',
      url:'php/ajax_request/reservedEdit.php',
      data:{eventID:eventID,userID:userID,choosenTheme:choosenTheme,request:request,startTime:startTime,startFor:startFor,endTime:endTime,endFor:endFor,eid:eid

      },
      success:function(data)
      {
        $("#ajax_catcher").html(data);
      }

    });

      } // end of else 


   });

 });












          </script>
    </body>
</html>