<!DOCTYPE html>
<?php

session_start();
if(!isset($_SESSION['userName']))
{
    header("location:../index");
}
if(isset($_SESSION['user']))
{
    header("location:../fabeventsdashboard");
} 
     
include('php/connection.php');
 ?> 
<html lang="en">

<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

   <title>FAB EVENTS - System Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">
   <!-- Navigation -->
       <?php include('php/navbar.php'); ?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">View Verified Reservation</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
<?php
$id = mysqli_escape_string($connection,$_GET['id']);
$select = "SELECT user_account.userID,user_account.fullName, events.eventTitle,events.eventInfo,events.eventPrice,events.img,reservedcustomer.id,reservedcustomer.startTime,reservedcustomer.startFor,reservedcustomer.endTime, reservedcustomer.endTimeFor,reservedcustomer.dateReserved,reservedcustomer.packs,reservedcustomer.paymentMethod,reservedcustomer.paymentStatus,reservedcustomer.status,reservedcustomer.theme,reservedcustomer.paymentMethod,reservedcustomer.eventID,reservedcustomer.cusID FROM reservedcustomer 
INNER JOIN events ON reservedcustomer.eventID = events.id
INNER JOIN user_account ON reservedcustomer.cusID = user_account.userID
WHERE  reservedcustomer.id = '$id'";

 $result = $connection->query($select);
 $row = $result->fetch_assoc();
 $eventID = $row['eventID'];
 $userID = $row['cusID'];
 $price = $row['eventPrice'] + 30000;


$paymentHistory = $connection->query("SELECT * FROM  paymenthistory WHERE userID = '$userID' AND eventID = '$id' ORDER BY dateUpdated DESC LIMIT 1")->fetch_assoc();

$totalBalance;

if($paymentHistory <= 0)
{
  $totalBalance = 0;
}
else
{
  $totalBalance = $paymentHistory['totalBalance'];
}


 ?>


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                      
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <strong style="color:red;font-size:18px;">Current Balance: ₱<?php echo number_format($totalBalance) . ".00" ; ?> </strong>
                          <a style="margin-right:20px;float:right;" class="btn btn-danger archive" id="<?php echo $row['id']; ?>">Delete Event</a>
                  
                            <button class="btn btn-info" data-toggle="modal" data-target="#myModal" style="float:right;margin-right:5px;">Add Payment</button>          
            <br><br>  
                                            

 </div>


   

<div class="row">

    <div class="col-md-6">

    <div class="" style="padding-left:10px;">

       <strong>Full Name:</strong><p><?php echo ucwords($row['fullName']); ?> </p>
       <hr>
    <strong>Type of Event:</strong><p><?php echo ucwords($row['eventTitle']);?> </p>
       <hr>
       <strong>Pax:</strong><p><?php echo ucwords($row['packs']);?> pax </p>
       <hr>
        <strong>Theme:</strong><p><?php echo ucwords($row['theme']);?> </p>
       <hr>
       <strong>Price:</strong><p>₱<?php echo number_format($row['eventPrice'] + 30000);?> </p>
       <hr>
        <p><?php echo $row['dateReserved'];?> </p>
       <hr>

     <strong>Menu:</strong>
      
	<div class="menuContainer">
		<ul>
			
	  <?php 

        $select2 = "SELECT * FROM  foodchoice WHERE eventID = '$eventID' AND userID = '$userID' AND status ='approved'";
          $result2 = $connection->query($select2);
            while($row2 = $result2->fetch_assoc())
            {  ?>

          <ul>
            <li><?php echo ucwords($row2['menu']) ?></li>
          </ul>

          <?php } ?>

		</ul>
	</div>
 

        </div>
    </div>
    <div class="col-md-6">
       
       <img src="../img/gallery/<?php echo $row['img'] ?>" style="width:100%;padding-right:10px;" alt="event">
<br>
<br><br>
 <strong>Packages:</strong>
       <br>
       <h5>Venue Included</h5>
       <?php

        $select3 = "SELECT * FROM  packagechoices WHERE eventID = '$eventID' AND userID = '$userID' AND status='ok' and confirmStatus = 'ok'";
          $result3 = $connection->query($select3);
            while($row3 = $result3->fetch_assoc())
            {  ?>

          <ul>
            <li><?php echo ucwords($row3['package']) ?></li>
          </ul>

          <?php } ?>
    </div>



</div>



<br><br><br><br><br><br>



                               
        </div>
        <!-- /#page-wrapper -->
<div id="ajax_catcher"></div>




<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">
            <?php 

           
            ?>
        </h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-3">
                 <strong>Total Price:<p>₱<?php echo number_format($row['eventPrice'] + 30000);?> </p></strong>
            </div>
            <div class="col-md-3">
                <strong>Total Balance:<p id="totalBal">₱<?php echo number_format($totalBalance) ;?> .00 </p></strong>

            </div>

            <div class="text"></div>
        </div>
     <br><br>
     <label for="">Enter Amount:</label>
     <input type="text" class="form-control" id="amount" oninput="this.value=this.value.replace(/[^0-9]/g,'');" autocomplete="off">
            <input type="text" id="totalAmount" hidden>
             <input type="text" id="totalBalanceCurrent" hidden>
          

            <br>
            <hr>
<h4>Breakdown of Payment</h4>
 <div class="form-group">
        <label for="">One Thousand Pesos</label>
        <input type="text" id="thousand" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
>
    </div>

    <br>

       <div class="form-group">
        <label for="">Five Hundred Pesos</label>
        <input type="text" id="five" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
>
    </div>

     <br>

       <div class="form-group">
        <label for="">Two Hundred Pesos</label>
        <input type="text" id="two" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
>
    </div>


    
     <br>

       <div class="form-group">
        <label for="">One Hundred Pesos</label>
        <input type="text" id="onehun" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
>
    </div>


      <br>

       <div class="form-group">
        <label for="">Fifty Pesos</label>
        <input type="text" id="fifty" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
>
    </div>

  <br>

       <div class="form-group">
        <label for="">Twenty Pesos</label>
        <input type="text" id="twenty" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
>
    </div>

      <br>

       <div class="form-group">
        <label for="">Ten Pesos</label>
        <input type="text" id="ten" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
>
    </div>


  <br>

       <div class="form-group">
        <label for="">Five Pesos</label>
        <input type="text" id="fivepes" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
>
    </div>

  <br>

       <div class="form-group">
        <label for="">One Pesos</label>
        <input type="text" id="one" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57'
>
    </div>








            
        </p>
      </div>
      <div class="modal-footer">
     
<button style="margin-right:10px;float:right;" class="btn btn-info confirm" id="<?php echo $row['id']; ?>">Submit Payment</button>

      </div>
    </div>

  </div>
</div>











    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>




 $(document).ready(function() {
        $('.confirm').click(function(){

          var amount = $("#amount").val();

          var userID = <?php echo $userID ?>;
          var eventID = <?php echo $id ?>;
          var price = <?php echo $price; ?>;
          var TotalBalance = $("#totalBalanceCurrent").val();
          var amountInput = $("#totalAmount").val();

          var thousand = $("#thousand").val();
          var five  = $("#five").val();
          var two = $("#two").val();
          var onehun = $("#onehun").val();
          var fifty = $("#fifty").val();
          var twenty = $("#twenty").val();
          var ten = $("#ten").val();
          var fivepes = $("#fivepes").val();
          var one = $("#one").val();

          var totalThou = 1000 * +thousand;
          var totalFiveh = 500 * +five;
          var totaltwo = 200 * +two;
          var totalOneHun = 100 * +onehun;
          var totalFifty = 50 * +fifty;
          var totalTwent = 20 * +twenty;
          var totalTen = 10 * +ten;
          var totalFivePes = 5 * + fivepes;
          var totalOnePes = 1 * +one;

var totalInputBreakdown = +totalThou + +totalFiveh + +totaltwo + +totalOneHun + +totalFifty + +totalTwent + +totalTen + +totalFivePes + +totalOnePes;






          if(amount =="")
          {
            alert('Please enter amount');
          }

else if(totalInputBreakdown == 0)
{
    alert('Please enter breakdown of payment');
}

else if (+totalInputBreakdown != +amountInput)
{
     alert('Invalid breakdown of payment. must be equal to total amount of payment');
}
  else
          { 

          if(confirm('Do you really want to add payment?'))

          {

              $.ajax({

                 type:'post',
                 url:'php/addpayment.php',
                 data:{
                  userID:userID,
                  eventID:eventID,
                  price:price,
                  TotalBalance:TotalBalance,
                  amountInput:amountInput,
                  thousand:thousand,
                  five:five,
                  two:two,
                  onehun:onehun,
                  fifty:fifty,
                  twenty:twenty,
                  ten:ten,
                  fivepes:fivepes,
                  one:one,
                 },
                 success:function(x){
                  $("#ajax_catcher").html(x);
                 }
 

              });

          }

        }
 });
    });









    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });








$(document).ready(function(){
$('#amount').keyup(function(event) {
var val = $(this).val();
var explode = val.replace (/,/g, "");
var totalBalance = <?php echo $totalBalance ?> ;
var totalBalanceCurrent = +totalBalance - +explode;
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
  $(".confirm").prop('disabled', true);
}
else
{
  $("#amount").css('border-color','#cccccc');
  $(".confirm").prop('disabled', false);
}

$("#totalAmount").val(explode);
$("#totalBalanceCurrent").val(totalBalanceCurrent);

});

});

















 $(document).ready(function() {
        $('.archive').click(function(){

            var id = $(this).attr('id');

                $("#table_" + id).fadeOut(1000);
if(confirm('Do you really want to archive this event?'))
{
                $.ajax({  

                    type:'post',
                    url:'php/archive.php',
                    data:{id:id},
                    success:function(x)
                    {
                        $("#ajax_catcher").html(x);
                        window.location = 'verifiedreservation';
                    }

                });
}
        });
    });

    
    </script>

</body>

</html>
