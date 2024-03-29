<!DOCTYPE html>

<?php

include('php/connection.php');
$eventid = mysqli_escape_string($connection,$_GET['eventid']);

  
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
#pack > li{
  
 
  margin-top: 10px;
}
</style>
    </head>
    <body>
        
        <!--================Header Menu Area =================-->
        

            <?php include('php/header.php'); ?>


        
        <!--================Offer Area =================-->
        <section class="offer_area p_120">
        <div class="container">
               
                <div class="row offer_inner">
                    <div class="row offer_inner">
  <?php

      $select = "SELECT * FROM events WHERE id = '$eventid'";
          $result = $connection->query($select);
                $row = $result->fetch_assoc();
                        

                     ?>

    <div class="col-lg-5">
                        <div class="offer_item">
                                <h2><?php echo strtoupper($row['eventTitle']); ?></h2>
                            <img class="img-fluid" src="img/gallery/<?php echo $row['img'] ?>" alt="">
                            

                        </div>

                    </div>


                    <div class="col-lg-4">
                        <div class="offer_item">
                
                                 
                        </div>
                                <br><br>
                                <p style="color:#4285f4;"> <span class="fa fa-calendar"></span> &nbsp; Select available dates</p>
                                
                            <input class="form-control" id="date" name="date" placeholder="mm/dd/yyyy" type="text" autocomplete="off" />
                            <br>
                          
                            
                             <input type="text" id="packs" value="<?php echo $row['pax']; ?>" class="form-control" style="display:none;">
                           <br> <h4><span><?php echo $row['pax']; ?></span> pax</h4>
                            <h4>Planning fee: ₱30,000 </h4>
                            <h4>Reservation Fee: ₱10,000 <small><br>Reservation fee shall be subtracted from the event planning fee</small></h4>
                              <br>
                            <h3>Total Price: <span style="color:red;">₱<?php echo number_format($row['eventPrice'] + 30000) ?></span> </h3>
                            
                               
                            </div>

                        <div class="col-lg-3">
                        <div class="offer_item">
                             <img class="img-fluid" src="img/newpayment2.jpg" alt="" style="margin-top:200px;">

                             
                            <br><br> <br><br>
                         
                                     <a style="float:right;"  id="signin" class="genric-btn info-border">Reserve now</a><br><br><br>
                            <div class="alert alert-danger" style="display:none;">You need to sign in to make reservation</div>  
                        
                        </div>

                    </div>

                    </div>


                    
                </div>





<div class="row">
    <div class="col-md-5">
        <hr>
        <h5>VENUE INCLUDED</h5>
        <ul id="pack">
          <?php

          $select = "SELECT * FROM packageincluded WHERE eventID = '$eventid'";
          $result = $connection->query($select);
          while($row = $result->fetch_assoc())
              {
               
               
           ?>


           <li><input type="checkbox" class="packIncluded" id ="<?php echo $row['id'] ?>" value="<?php echo $row['id'] ?>" checked disabled><?php echo $row['package'] ?>,</li>

 
           <?php } ?>
        </ul>
       

          <br>
          
    </div>
</div>



 



            </div>
        </section>
        <!--================End Offer Area =================-->
        <div class="container">
            <br><br>
    <h5>Ratings</h5>
    <div class="rw-ui-container" style="height:100px;"></div>
    <br>
            <section id="comment">
    <h5>Comments:</h5>
<br><br>

<?php

$stmtComment = "SELECT user_account.fullName,comment.comment,comment.dateAdded FROM comment
INNER JOIN user_account ON comment.userID = user_account.userID WHERE comment.eventID = '$eventid' ORDER BY dateAdded DESC;
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
       
        <!--================End Feature Area =================-->
        
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
$select = "SELECT dateReserved FROM reservedcustomer WHERE eventID = '$eventid' AND status ='verified'";
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
        $("#signin").click(function(){

            $(".alert").show();

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

</script>


    </body>
</html>