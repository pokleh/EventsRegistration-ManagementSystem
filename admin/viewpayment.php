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
                    <h1 class="page-header">View Payment</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          
                            <?php
                            $id = $_GET['id'];
$select = "SELECT user_account.userID,user_account.fullName,user_account.address,user_account.contactNumber,uploadedpayment.trackingNumber,uploadedpayment.amount,uploadedpayment.receipt,uploadedpayment.remitance,uploadedpayment.dateUploaded,uploadedpayment.id,reservedcustomer.dateReserved,uploadedpayment.eventID,uploadedpayment.id AS upID FROM uploadedpayment 

INNER JOIN user_account ON uploadedpayment.userID = user_account.userID
INNER JOIN reservedcustomer ON uploadedpayment.eventID = reservedcustomer.id
WHERE uploadedpayment.id = '$id';
";
                                $result = $connection->query($select);
                                
                                $row = $result->fetch_assoc();
                                
                                    $userID = $row['userID'];
                                    $reservedID = $row['eventID'];
                                    $upID = $row['upID'];

 $select1 = $connection->query("SELECT * FROM reservedcustomer WHERE id = '$reservedID'")->fetch_assoc();
 $eve = $select1['eventID'];
 $select2 = $connection->query("SELECT * FROM events WHERE id = '$eve'")->fetch_assoc();
$history = $connection->query("SELECT * FROM  paymenthistory WHERE eventID = '$reservedID' AND userID = '$userID' ORDER BY dateUpdated DESC LIMIT 1")->fetch_assoc();
                                  
                                    
                             ?>
 
<div class="row">
    <div class="col-md-7">
                                        
                             
<p>Name: <?php echo ucwords($row['fullName']); ?></p>      
<p>Address: <?php echo ucwords($row['address']); ?></p>       
<p>Contact No.:<?php echo ucwords($row['contactNumber']); ?></p>  
<p>Event reserved: <?php echo ucwords($select2['eventTitle']); ?></p>
<p>Total Price: <b>₱ <?php echo number_format($select2['eventPrice'] + 30000); ?>.00</b></p>
<p>Total Balance: <b>₱ 

    <?php 
if($history['totalBalance']=="")
{
  echo number_format($select2['eventPrice']  + 30000 ) . ".00"; 
}
elseif($history['totalBalance'] <= 0)
{
    echo "00.00";
}
else
{

    echo number_format($history['totalBalance']) . ".00";
}

?>
</b>

</p>

<hr>
<b>Payment Information:</b><br><br>
<p>Remitance: <?php echo ucwords($row['remitance']); ?></p>   
<p>Tracking No.: <?php echo ucwords($row['trackingNumber']); ?></p>   
<p>Amount: ₱ <b><?php echo number_format($row['amount']); ?><b></p>   
    </div>

<?php

if($history['totalBalance'] == "")
{
$tempAmount = $select2['eventPrice'] + 30000;
$finalTotal = $tempAmount - $row['amount'];
}
else
{
$finalTotal = $history['totalBalance'] - $row['amount'];
}
 ?>
<input type="text" id="price" value="<?php echo $select2['eventPrice'] + 30000 ?>" hidden>
<input type="text" id="amountSent" value="<?php echo $row['amount'] ?>" hidden>
<input type="text" id="totalBalance" value="<?php echo $finalTotal ?>" hidden>


<div class="col-md-5">
    <img src="../img/receipt/<?php echo $row['receipt'] ?>" alt="<?php echo $row['receipt'] ?>" style="width:100%;height:500px;">
</div>






</div>



<div class="row">
<div class="col-md-12">
    <button class="btn btn-info" data-toggle="modal" data-target = "#myModal">Approve payment</button>
</div>
</div>



<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <h4>Breakdown of Payment</h4>
        <br><br>

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









        
    





      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default"   id="approve">Confirm Payment</button>
      </div>
    </div>

  </div>
</div>









 

<div id="ajax_catcher"></div>




                               
        </div>
        <!-- /#page-wrapper -->

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
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });


      $(document).ready(function() {
        $('#approve').click(function(){
 
var userID = <?php echo $userID ?>;
var reservedID = <?php echo $reservedID ?>;
var price = $("#price").val();
var amountSent = $("#amountSent").val();
var totalBalance = $("#totalBalance").val();
var upID = <?php echo $upID ?>;



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



if(totalInputBreakdown == 0)
{
    alert('Please enter breakdown of payment');
}

else if (+totalInputBreakdown != +amountSent)
{
     alert('Invalid breakdown of payment. must be equal to total amount of payment');
}

else
    {         
if(confirm('Do you really want to approve this payment?'))
{ 
                $.ajax({

                    type:'post',
                    url:'php/confirmPayment.php',
                    data:{userID:userID,reservedID:reservedID,price:price,amountSent:amountSent,totalBalance:totalBalance,upID:upID,
                        thousand:thousand,five:five,two:two,onehun:onehun,fifty:fifty,twenty:twenty,ten:ten,fivepes:fivepes,one:one},
                    success:function(x)
                    {
                        $("#ajax_catcher").html(x);
                           $("#table_" + id).fadeOut(1000);
                    }

                }); 
            }
}
        });
    });






    </script>

</body>

</html>
