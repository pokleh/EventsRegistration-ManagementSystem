<!DOCTYPE html>
<?php 
error_reporting(0);
include('php/session_user.php');
include('php/events.php');

if($connection->query("DELETE FROM foodChoice WHERE status = '' "))
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
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="css/custombox.min.css" rel="stylesheet">

<style>
body{
  overflow-x: hidden;
}
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

#pack > li{
  
 
  margin-top: 10px;
}

</style>
    </head>
    <body>
        
        <!--================Header Menu Area =================-->
       

<?php include('php/header-dashboard.php') ?>

  <section>
      <div class="container-fluid">
        <br>
       
<?php 

if(($address == "") ||  ($contactNumber == ""))
{
   echo '<div class="alert alert-danger" style="">Complete your <a href="myaccount?resid=' . $_GET['id'] .'">Profile</a> information to make reservation. </div>
  '; 

}

?>

    </div>
  </section>
        
        <!--================Offer Area =================-->
        <section class="offer_area">

          <div class="container-fluid">
              <div class="alert alert-danger" style="display:none;"></div>  
        <br>
            <div class="row offer_inner">


              <div class="col-lg-4">
                <div class="offer_item">
                                <h2><?php echo strtoupper($eventTitle); ?></h2>
                  <img class="img-fluid" src="img/gallery/<?php echo $img ?>" alt="">
                    <br><br> <h4><span><?php echo $pax; ?></span> pax</h4>
                            <h4>Price: <span>₱<?php echo number_format($eventPrice); ?></span></h4>
                            <h4>Planning fee: ₱30,000 </h4>
                            <h4>Reservation Fee: ₱10,000 <small><br>Reservation fee shall be subtracted from the event planning fee</small></h4>
                              

                </div>

              </div>


              <div class="col-lg-4">
                <div class="offer_item">
                 
                             
                </div><br>
                                <p style="color:#4285f4;"> <span class="fa fa-calendar"></span> &nbsp; Select available dates</p>
                                
                            <input class="form-control" id="date" name="date" placeholder="mm/dd/yyyy" type="text" autocomplete="off" />
                         
                              
                                <p style="color:#4285f4;margin-top:10px;"> <span class="fa fa-calendar"></span> &nbsp; Select Time</p>
                                
                                <ul id="ul" style="">
                           <li > <select name="" id="startTime" class="form-control">
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
                              <option value="am">AM</option>
                               <option value="am">PM</option>
                            </select>  </li> 

                                      <li><span>to</span></li>

                    
                    <li > <select name="" id="endTime" class="form-control">
                            
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
                              <option value="am">AM</option>
                               <option value="am">PM</option>
                            </select>  </li> 


                            </ul>
                          
<br><br><br>
                            <a style="cursor:pointer;color:#4285f4;" onclick="modalTheme.open();"><i class="fa fa-hand-pointer-o"></i> Click to here select theme</a>
                           <input type="text" class="form-control" id="choosenTheme" disabled>
                           <p></p>
                           <a style="cursor:pointer;color:#4285f4;" onclick="modalMenu.open();"><i class="fa fa-hand-pointer-o"></i>  Click Here to choose your food</a>
                              <br>
                           <small>Choose your food according to your package included below. </small>
                            <div id="foodChoose"></div>
                            
                      
                            
                             <input type="text" id="packs" value="<?php echo $pax; ?>" class="form-control" style="display:none;">
                           
                           <br>
            
                            </div>

                        <div class="col-lg-4">
                        <div class="offer_item">
                             <br>
                              <a style="cursor:pointer;color:#4285f4;">  Other Request</a>
                         
                          <textarea name="" id="request" cols="30" rows="4" class="form-control" style="margin-top:15px;"></textarea>
                            
                          <br>
                          <a style="cursor:pointer;color:blue;" id="read" data-toggle="modal" data-target="#myModal"> Agree in terms and agreement</a>
                            <br><br>
                              <h2>Total Price: <span style="color:red;">₱<?php echo number_format($eventPrice + 30000) ?></span> </h2>
                           
                             
                                       
                          <br><br>
                            <a id="reserved" style="float:right;" disabled><button class="btn btn-info" <?php if(($address == "") ||  ($contactNumber  == "")){ echo "disabled";} ?>>Add to reservation</button></a>
                            <br><br><br>
                              <img class="img-fluid" src="img/newpayment2.jpg" alt="">
                          
                        </div>

                    </div>

              </div>





<div class="row">
    <div class="col-md-5">
        <hr>
        <h5>VENUE INCLUDED</h5>
        <ul id="pack">
          <?php

          $select = "SELECT * FROM packageincluded WHERE eventID = '$Eventid'";
          $result = $connection->query($select);
          while($row = $result->fetch_assoc())
              {
                $package = $row['package'];
                $packageID = $row['id'];

                 $select2 = "SELECT * FROM packageChoices WHERE eventID = '$Eventid' AND userID = '$userID' AND packageID = '$packageID'";
                  $result2 = $connection->query($select2);
                    if($result2->num_rows > 0)
                    {

                    }

                    else

                    {

                     if($connection->query("INSERT INTO packageChoices (userID,eventID,packageID,package,status,confirmStatus) VALUES ('$userID','$Eventid','$packageID','$package','ok','') "))
                    {

                    }


                    }
               
           ?>


           <li><input type="checkbox" class="packIncluded" id ="<?php echo $row['id'] ?>" value="<?php echo $row['id'] ?>" checked><?php echo $row['package'] ?></li>

 
           <?php } ?>
        </ul>
       

          <br>
         
    </div>
</div>



<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
  
        </div>
        <div class="modal-body">
                    <h4 class="modal-title"> Terms and Agreement</h4><br>
          <p>
1.  The total event planning fee agreed upon is 30,000. A non – refundable reservation fee of 10,000 is required to secure Fab Events for the event. This amount shall be subtracted from the event planning fee. The remaining balance of the event planning fee must be paid in full BEFORE the start of your event ( unless other arrangements are accepted by Fab Events). Any payments received less than 2 weeks before the event must be by cash. Personal checks are accepted up to 2 weeks before the event. All checks shall be made payable to Rose Ann Mendoza.
<br> <br>
2.  Fab Events represents and warrants to Client that it has the experience and ability to perform the services required by this Agreement; that it will perform said services in a professional, competent and timely manner; that it has the power to enter into and perform this Agreement; and that is performance of this Agreement shall not infringe upon or violate the rights of any third party or violate any federal, state and municipal laws. However, Client will not determine or exercise control as to general procedures or formats necessary to have these services meet Client’s satisfaction. 

<br> <br>

3.  In case of unpredictable weather conditions (such us: Typhoon, Heavy Rains, Floods, etc.) Fab Events will not entertain sudden changes in our contract since we have already purchased all the ingredients needed based on the packaged you chosen. Otherwise you will be charged accordingly.

<br> <br>

4. In the event of non- payment, Fab Events retain the right to attempt collection through all legal and permissible means. Client will be responsible for all court fees, legal fees, and collection costs incurred by Fab Events.
<br> <br>

5. Overtime Fee of Php75.00 per hour for all catering personnel on duty (i.e Waiters, Driver, Manager on duty, etc.) in excess of contracted time and Php75,00 per waiter per level if the function area / Building has no service elevator.
<br> <br>

6. This agreement cannot be cancelled except by mutual written consent of both the Client and Fab Events. If cancellation is initiated by the Client in writing and agreed to by Fab Events writing, Client will be required t0 pay any unrecoverable costs already incurred by Fab Events (but not more than the total fee agreed upon.)
<br> <br>

7. Client shall pay any charges imposed by the venue. These charges may include, but are not limited to, parking, use of electric power, etc.
<br> <br>

8. Client may not transfer this contract to another party without the prior written consent of Fab Events.
<br> <br>

9. This agreement is not binding until received and signed by Fab Events. Any changes must be written and signed by both the Client and Fab Events. Oral agreements are 
non – binding. The latest contract supersedes all previous contracts between Client and Fab Events for the event listed above.
<br> <br>

10. For out of town event, transportation fee will be charged accordingly.
<br> <br>

11. Ant losses, breakages, gate entrance fee, parking fee, and caterer’s bond at the venue will be charged to our client.
<br> <br>

12. Surcharge of Php5,ooo for rebooking /  change of event date seven (7) days prior to the original event date.
<br> <br>

13. Customer has the option of keeping any extra food remaining after the initial cater service is over. The client is responsible for providing own food storage containers. Fab Events is no longer responsible for leftovers after the initial 3 hour service nor any consequences due to its later consumption.
<br> <br>

14. Clients will be charged for loss / damage of the caterers equipment not due to handling by the food service personnel.
<br> <br>

15. Only the Clients and its authorized and its authorized representative will be allowed to discuss the details of the event.
<br> <br>

16. In the occasion that the number of guest exceeds what is expected, Fab Events usually makes a 20% allowance from he agreed number of guest to be served which will be charged accordingly to the client. (450 per plate)
<br> <br>
   <input type="checkbox" id="agree"> <a style="cursor:pointer;color:blue;"> Agree in terms and agreement</a>
<br> <br>



          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  










<div id="modalTheme" class="demo-modal" style="display:none;background-color:white;overflow-x:auto;">
   <div class="container">

     <br>
     <div>
      <button type="button" class="btn btn-outline btn-info demo-close-btn" onclick="Custombox.modal.close();">Close</button>
      
<br><br>
        
<?php
if(($eventCategory == "birthday") || ($eventCategory == "debut"))
{
?>
             <h4 id="themFor" style="">Theme for girls</h4>
              <button id="debut" class="btn btn-success  btn-sm debut" style="float:right;margin-right:10px;cursor:pointer;">For Debut</button>
              <button id="boys" class="btn btn-danger btn-sm boys" style="float:right;cursor:pointer;margin-right:10px;	">For boys</button>
              <button id="girls" class="btn btn-warning  btn-sm girls" style="float:right;margin-right:10px;cursor:pointer;color:white;">For girls</button>
             
   <br><br>

<?php
  $selectTheme = "SELECT * FROM theme WHERE category = '$eventCategory' AND sex = 'girls'";
            $resultTheme = $connection->query($selectTheme);
}

else
{
      $selectTheme = "SELECT * FROM theme WHERE category = '$eventCategory'";
            $resultTheme = $connection->query($selectTheme);
}

 ?>
            
        
     <div class="themContainer">
        <?php
           while($rowTheme = $resultTheme->fetch_assoc())
                    {


        ?>


                        <img src="img/<?php echo $rowTheme['img']; ?>" alt="" style="width:100%;">
                        <br><br>
                        <h5><?php echo ucwords($rowTheme['theme']) ?> <button class="btn btn-success btn-sm selectTheme" id="<?php echo $rowTheme['theme'] ?>" onclick="Custombox.modal.close();">Select theme</button>
                        </h5>
                        <hr>





        <?php } ?> 
   </div> 


       </div> <!----END OF CUSTOME MODAL THEME---->













<div id="modalMenu" class="demo-modal" style="display:none;background-color:white;overflow-x:auto;">
   <div class="container">

     <br>
     <div>
      <button type="button" class="btn btn-outline btn-info demo-close-btn" onclick="Custombox.modal.close();">Close</button>
      
<br><br>
 <h5 stlye="font-family: 'Open Sans', sans-serif;float:left;">Please choose your food according to your food included below: </h5>
<br><b> Food Include: <br> <span style="color:black;">

<?php 

echo  $foodIncluded; 
preg_match_all('!\d+!', $foodIncluded, $matches);
$total;
for($x = 0; $x <= count($matches[0]);$x++)
{
  $total = $total + $matches[0][$x];
}

echo "You can only check " . $total . " menu category";
?></b></span>
 
</div>

<input type="text" value="<?php echo $total; ?>" id="total" hidden>
<input type="text" id="kaCount" hidden>


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


  














              
            </div>
          </div>
        </section>
         <div id="ajax_catcher2"></div>
<div class="container" style="">

    <br><br>
    <h5>Ratings</h5>
    <div class="rw-ui-container" style="height:100px;"></div>
<section id="leavecomment">
  <h5>Leave Comment:</h5>
  <textarea name="" id="comment" rows="5" class="form-control"></textarea>

  <br><br>
  <button class="btn btn-info btn-sm" style="float:right;" id="submit">Submit</button>
  <br><br><br><br>
</section>



<section id="comment">
  <h5>Comments:</h5>
<br><br>

<?php

$stmtComment = "SELECT user_account.fullName,comment.comment,comment.dateAdded FROM comment
INNER JOIN user_account ON comment.userID = user_account.userID WHERE comment.eventID = '$Eventid' ORDER BY dateAdded DESC;
";
$resultComment = $connection->query($stmtComment);

if($resultComment->num_rows > 0 )
{
while($rowComment = $resultComment->fetch_assoc())
{
    echo "<img src='img/Icon-user.png' style='width:2%;'><h5> " . ucwords($rowComment['fullName']) . ":</h5>";
    echo "<i>" . $rowComment['comment'] . "</i><br><hr>";
}
}
else
{
       echo "<p><i>No comments yet</i></p>";
}
 ?>





</section>





  













<br><br><br><br>

</div>
<div id="ajax_catcher"></div>
<div id="ajax_catcher2"></div>
     
                              <input type="text" id="totalCount" hidden>

   
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
          <script src="js/bootstrap-datepicker.min.js"></script>
          <script src="js/custombox.min.js"></script>
          <script src="js/custombox.legacy.min.js"></script>

<?php

$array = array();
$select = "SELECT dateReserved FROM reservedcustomer WHERE eventID = '$Eventid' AND status ='verified'";
$result = $connection->query($select);
while($row = $result->fetch_assoc())
{
  array_push($array, $row['dateReserved']);
}

//$array = array('10-03-2018','10-01-2018');
$json = json_encode($array);

?>
         
 <script>








$(document).ready(function(){
    $('.packIncluded').on('change', function(){
     
      var packID = $(this).val();
      var eventID = <?php echo $Eventid ?>;
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

















var modalMenu = new Custombox.modal({
  content: {
    effect: 'rotate',
    target: '#modalMenu',
    fullscreen:true
  }
});


var modalTheme = new Custombox.modal({
  content: {
    effect: 'rotate',
    target: '#modalTheme',
    fullscreen:true
  }
});



 


$(document).ready(function(){
    $(".category").click(function(){

        var category = $(this).attr('id');
        var id = <?php echo $_GET['id']; ?>;
        var total = $("#total").val();
        var count = $("#count").val();
        var eventID = <?php echo $Eventid; ?>;


 

      
      $.ajax({

        type:'post',
        url:'php/menuCategory.php',
        data:{category:category,id:id,total:total,count:count,eventID:eventID},
        success:function(x)
          {
            $("#categoryContainer").html(x);
          }

      });

     
        
    });

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
    $(".debut").click(function(){

        var category = $(this).attr('id');


        $.ajax({


            type:'post',
            url:'php/modalthemeDebut.php',
            data:{category:category},
            success:function(x)
                {
                    $(".themContainer").html(x);
                    $("#themFor").html('Theme for ' + category);
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
   var arr = <?php echo $json ?>;
 
    $("#date").datepicker({
            format: 'mm-dd-yyyy',
            autoclose:true,
            startDate : new Date(),
            datesDisabled:arr
         

            
     });

 });




$(document).ready(function(){
  $("#reserved").click(function(){
    var eventID = <?php echo $Eventid ?>;
    var cusID = <?php echo $userID ?>;
    var date = $("#date").val();
    var startTime = $("#startTime").val();
    var startFor = $("#startFor").val();
    var endTime = $("#endTime").val();
    var endFor = $("#endFor").val();
    var totalCount = $("#totalCount").val();
    var request = $("#request").val();

    var packs = $("#packs").val();
        var choosenTheme = $("#choosenTheme").val();
       

    if(date == "")
    {
      $(".alert").html('Select date of your reservation');
      $("#date").css('border-color','red');
      $(".alert").show();
    }
    
    else if(packs == "")
    {
      $(".alert").html('Select number of packs for your reservation');
      $("#packs").css('border-color','red');
      $(".alert").show();
    }
            else if(choosenTheme == "")
        {
            $(".alert").html('Select theme of you event');
            $("#choosenTheme").css('border-color','red');
            $(".alert").show();
        }
          else if(totalCount == 0)
        {
            $(".alert").html('Choose your food according to your package');
            $("#foods").css('border-color','red');
            $(".alert").show();
        }
        else if($("#agree").prop('checked') == false){
                

                $(".alert").html('Agree in terms and agreement');
                $(".alert").show();

            }
      else
      {
 

    $.ajax({

      type:'POST',
      url:'php/ajax_request/reserved.php',
      data:{eventID:eventID,cusID:cusID,date:date,packs:packs,choosenTheme:choosenTheme,request:request,startTime:startTime,startFor:startFor,endTime:endTime,endFor:endFor

      },
      success:function(data)
      {
        $("#ajax_catcher").html(data);
      }

    });

      } // end of else 


   });

 });
(function(d, t, e, m){
    
    // Async Rating-Widget initialization.
    window.RW_Async_Init = function(){
                
        RW.init({
            huid: "381149",
            uid: "e3d509760647db1724f862e71a5ce9d1",
            options: { "style": "oxygen","size": "large","style": "flat_yellow" } 
        });
        RW.render();
    };
        // Append Rating-Widget JavaScript library.
    var rw, s = d.getElementsByTagName(e)[0], id = "rw-js",
        l = d.location, ck = "Y" + t.getFullYear() + 
        "M" + t.getMonth() + "D" + t.getDate(), p = l.protocol,
        f = ((l.search.indexOf("DBG=") > -1) ? "" : ".min"),
        a = ("https:" == p ? "secure." + m + "js/" : "js." + m);
    if (d.getElementById(id)) return;              
    rw = d.createElement(e);
    rw.id = id; rw.async = true; rw.type = "text/javascript";
    rw.src = p + "//" + a + "external" + f + ".js?ck=" + ck;
    s.parentNode.insertBefore(rw, s);
    }

    (document, new Date(), "script", "rating-widget.com/"));






$(document).ready(function(){

    $("#submit").click(function(){

        var eventID = <?php echo $Eventid ?>;
        var userID = <?php echo $userID ?>;
        var comment = $("#comment").val();


        if(comment == "")
        {
            $("#comment").css('border-color','red');
        }
        else
        {
            $.ajax({
                type:'post',
                url:'php/ajax_request/comment.php',
                data:{eventID:eventID,userID:userID,comment:comment},
                success:function(a)
                {
                    $("#ajax_catcher").html(a);

                }
            });
        }


    });

});



 

function viewFoodChoice()
{

  var userID = <?php echo $userID; ?>;
  var eventID = <?php echo $Eventid; ?>;


  $.ajax({

        type:'post',
        url:'php/viewFoodChoice.php',
        data:{userID:userID,eventID:eventID},
        success:function(data)
        {
          $("#foodChoose").html(data);
        }
      });



} 

setInterval(viewFoodChoice,1000);





function countFood()
{

  var userID = <?php echo $userID; ?>;
  var eventID = <?php echo $Eventid; ?>;


  $.ajax({

        type:'post',
        url:'php/countFood.php',
        data:{userID:userID,eventID:eventID},
        success:function(data)
        {
           $("#ajax_catcher").html(data);
        }
      });



}

setInterval(countFood,1000);









          </script>
    </body>
</html>