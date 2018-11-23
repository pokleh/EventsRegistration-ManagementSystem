<!DOCTYPE html>
<?php 
include('php/session_user.php');
include('php/events.php');

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

  <section>
      <div class="container">
        <br>
       
<?php 

if(($address == "") || ($birthDay  == "") || ($contactNumber == ""))
{
   echo '<div class="alert alert-danger" style="">Complete your <a href="myaccount">Profile</a> information to make reservation. </div>
  '; 

}

?>

    </div>
  </section>
        
        <!--================Offer Area =================-->
        <section class="offer_area">
        	<div class="container">
        <br>
        		<div class="row offer_inner">


        			<div class="col-lg-5">
        				<div class="offer_item">
                                <h2><?php echo strtoupper($eventTitle); ?></h2>
        					<img class="img-fluid" src="img/gallery/<?php echo $img ?>" alt="">
        					

        				</div>

        			</div>


        			<div class="col-lg-4">
        				<div class="offer_item">
        				 
                             
        				</div><br>
                                <p style="color:#4285f4;margin-top:10px;"> <span class="fa fa-calendar"></span> &nbsp; Select available dates</p>
                                
                            <input class="form-control" id="date" name="date" placeholder="mm/dd/yyyy" type="text" autocomplete="off" />
                            
                            <br> <h4><span><?php echo $pax; ?></span> pax</h4>
                            <h4>Price: <span>₱<?php echo number_format($eventPrice); ?></span></h4>
                            <h4>Reservation Fee: ₱10,000</h4>
                            <h4>Total Price: <span style="color:red;">₱<?php echo number_format($eventPrice + 10000) ?></span> </h4>
                            <br>
                           <a style="float:right;"  id="reserved"><button class="btn btn-info" <?php if(($address == "") || ($birthDay  == "") || ($contactNumber  == "")){ echo "disabled";} ?>>Add to reservation</button></a>

                            
                             <input type="text" id="packs" value="<?php echo $pax; ?>" class="form-control" style="display:none;">
                           
                           <br><br><br>
							<div class="alert alert-danger" style="display:none;"></div>	
                            </div>

                        <div class="col-lg-3">
                        <div class="offer_item">
                            <img class="img-fluid" src="img/paymentMode.png" alt="">

                           
                          
                        </div>

                    </div>

        			</div>





<div class="row">
    <div class="col-md-5">
        <hr>
        <h4>VENUE INCLUDED</h4>
          <p style="margin-top:40px;"><?php echo $eventInfo; ?></p>

          <br>
          <a href="img/main-menu.jpg" download>Download Menu  <i class="fa fa-download"></i></a>
    </div>
</div>





        			
        		</div>
        	</div>
        </section>
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
    echo "<i>" . $rowComment['comment'] . ":</i><br><hr>";
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


   
        <!--================End Offer Area =================-->
        
      
    
        
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
          <script src="js/bootstrap-datepicker.min.js"></script>

<?php

$array = array();
$select = "SELECT dateReserved FROM reservedcustomer WHERE eventID = '$Eventid' AND status !='canceled'";
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
		
		var packs = $("#packs").val();


		if(date == "")
		{
			$(".alert").html('Select date for your reservation');
			$("#date").css('border-color','red');
			$(".alert").show();
		}
		
		else if(packs == "")
		{
			$(".alert").html('Select number of packs for your reservation');
			$("#packs").css('border-color','red');
			$(".alert").show();
		}

			else
			{


		$.ajax({

			type:'POST',
			url:'php/ajax_request/reserved.php',
			data:{eventID:eventID,cusID:cusID,date:date,packs:packs},
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

          </script>
    </body>
</html>