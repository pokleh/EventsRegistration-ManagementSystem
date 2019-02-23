<!DOCTYPE html>
<?php 

include('php/session_user.php');
$id =mysqli_escape_string($connection,$_GET['reservationid']);






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
#payment > li{

    display: inline-block;
    margin-left: 30px;
    
}

body
{
    overflow-x:hidden;
}
</style>
    </head>
    <body>
        
        <!--================Header Menu Area =================-->
       

<?php include('php/header-dashboard.php');



$select = "SELECT events.eventTitle,events.eventInfo,events.eventPrice,events.img,reservedcustomer.id, reservedcustomer.dateReserved,reservedcustomer.packs,reservedcustomer.paymentMethod,reservedcustomer.paymentStatus,reservedcustomer.status,reservedcustomer.cusID,reservedcustomer.eventID FROM reservedcustomer
INNER JOIN events ON reservedcustomer.eventID = events.id
 WHERE reservedcustomer.id = '$id'
";
$result = $connection->query($select);
$row = $result->fetch_assoc();
                     
$eventID = $row['eventID'];
 $userID = $row['cusID'];
 $price = $row['eventPrice'] + 30000;


 ?>

  
        <br><br>  
        <!--================Offer Area =================-->
        <section style="margin-top:100px;">
            <div class="container">
             


                       


               
            <div class="row offer_inner">
        
                        <div class="col-lg-7">

<div class="alert alert-danger" style="display:none;"></div>

                 Send payment to: <br> Rose Ann Barquilla – Mendoza  <br> 0935 – 633 – 7433 <br> 326 Buli Taal, Batangas
    <br><br>
   


<form action="payremitance?reservationid=<?php echo $id; ?>"  method="post" enctype="multipart/form-data">


    <label for="">Select Remitance Center:</label>
    <br>
<select name="remCenter" id="remCenter" class="form-control" style="width:300px;">
    <option value="">--Remitance Center--</option>
    <option value="LBC">LBC</option>
    <option value="Palawan Express">Palawan Express</option>
    <option value="Cebuana Lhuillier">Cebuana Lhuillier</option>
    <option value="MLhuillier">MLhuillier</option>
    <option value="Smartpadala">Smartpadala</option>
</select>



<br><br>


    <label for="">Tracking Number:</label>
<input type="text" name="trackingNumber" id="trackingNumber" class="form-control">


 


<label for="">Amount:</label>
<input type="text" name="amount" id="amount" class="form-control" oninput="this.value=this.value.replace(/[^0-9]/g,'');" autocomplete="off">
<br>
<label for="">Upload receipt</label>
<br>
    <input type="file" name="img" id="img" accept="image/*">

<input type="submit" name="submit" class="btn btn-primary" id="submit" style="display:none;">

</form>


       
  <?php 


 if(isset($_POST['submit']))
{


$image=$_FILES['img']['tmp_name'];
$name=$_FILES['img']['name'];
$remCenter = $_POST['remCenter'];
$trackingNumber = $_POST['trackingNumber'];
$amount = $_POST['amount'];
$totalAmount = str_replace( ',', '', $amount );

 
$insert ="INSERT INTO uploadedPayment (userID,eventID,remitance,trackingNumber,amount,receipt)
          VALUES ('$userID','$id','$remCenter','$trackingNumber','$totalAmount','$name')";

if($connection->query($insert))
{

  move_uploaded_file($image,"img/receipt/".$name);

  $_SESSION['verified'] = 'Payment successfully submitted';
  echo "<script language='javascript'>
  

window.location ='myreservation';

</script>
    ";
}


}


        ?>











                        


                   
                    </div>
                    

                        <div class="col-lg-5">
                        <div class="offer_item">
                          
                          <div class="card" style="">

  <div class="card-body">
    <h5 class="card-title" style="">Upload your money remitance receipt</h5>
    <h4><?php echo ucwords($row['eventTitle']) ?></h4>
    <p class="card-text">Reserved Date: <span style="color:orange;"><?php echo ucwords($row['dateReserved']) ?></span><br>
    Packs: &lt; <span style="color:orange;"><?php echo ucwords($row['packs']) ?></span></p>
 <h2 class="card-title">Total Price: <span style="color:orange;">₱<?php echo number_format($row['eventPrice'] + 30000) ?>.00 </span></h2>
    <button id="confirm" class="btn btn-primary" style="float:right;color:white;">Proceed</button>
  </div>
</div>
                        
                        </div>

                    </div>

                    </div>


                    
                </div>
            </div>
        </section>


<div id="ajax_catcher"></div>


   
        <!--================End Offer Area =================-->
        
      
    
        
        <!--================ start footer Area  =================-->    
       
  <br><br>  
<input type="text" id="radioStat" hidden>
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


         
 <script>





$(document).ready(function(){
$('#amount').keyup(function(event) {
var val = $(this).val();
var explode = val.replace (/,/g, "");
var totalBalance = <?php echo $price ?> ;

  // skip for arrow keys
  if(event.which >= 37 && event.which <= 40) return;

  // format number
  $(this).val(function(index, value) {
    return value
    .replace(/\D/g, "")
    .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    ;
  });


if(explode > totalBalance)
{
  $("#amount").css('border-color','red');
  $("#confirm").prop('disabled', true);
}
else
{
  $("#amount").css('border-color','#cccccc');
  $("#confirm").prop('disabled', false);
}


});

});




$(document).ready(function(){
    $("#confirm").click(function(){

        var remCenter= $("#remCenter").val();
        var trackingNumber= $("#trackingNumber").val();
        var amount= $("#amount").val();

        var img = $("#img").val();

    
        if(remCenter == "")
        {
            $(".alert-danger").html('Please select money remitance center');
            $(".alert-danger").show();
        }

        else if(trackingNumber == "")
        {

            $(".alert-danger").html('Please add tracking number');
            $(".alert-danger").show();

        }
          else if(amount == "")
        {

            $(".alert-danger").html('Please enter amount');
            $(".alert-danger").show();

        }
          else if(img == "")
        {

            $(".alert-danger").html('Please upload your receipt');
            $(".alert-danger").show();

        }


            else
            {
                $("#submit").click();
            }

    
   });

 });


          </script>
    </body>
</html>