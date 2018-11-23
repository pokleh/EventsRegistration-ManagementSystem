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

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

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
                    <h1 class="page-header">View Pending Reservation</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                      
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           
                                            
<?php
$id = mysqli_escape_string($connection,$_GET['id']);
$select = "SELECT user_account.userID,user_account.fullName, events.eventTitle,events.eventInfo,events.eventPrice,events.img,reservedcustomer.id, reservedcustomer.dateReserved,reservedcustomer.packs,reservedcustomer.paymentMethod,reservedcustomer.paymentStatus,reservedcustomer.status,reservedcustomer.paymentMethod FROM reservedcustomer 
INNER JOIN events ON reservedcustomer.eventID = events.eventID
INNER JOIN user_account ON reservedcustomer.cusID = user_account.userID
WHERE  reservedcustomer.id = '$id'";

 $result = $connection->query($select);
 $row = $result->fetch_assoc();
 ?>
 </div>


   <!--- <p><?php echo $row['fullName'];?></p>
    <p><?php echo $row['eventTitle'];?></p>
    <p><?php echo $row['packs'];?> pax</p>

    <p><?php echo number_format($row['eventPrice']);?></p>
        <p><?php echo $row['dateReserved'];?></p>
            <p><?php echo $row['paymentMethod'];?></p>
                <p><?php echo $row['paymentStatus'];?></p>
                    <p><?php echo $row['status'];?></p>
---->


<div class="row">

    <div class="col-md-6">
    <div class="" style="padding-left:10px;">
       <strong>Full Name:</strong><p><?php echo ucwords($row['fullName']);?> </p>
       <hr>
    <strong>Type of Event:</strong><p><?php echo ucwords($row['eventTitle']);?> </p>
       <hr>
       <strong>Pax:</strong><p><?php echo ucwords($row['packs']);?> pax </p>
       <hr>
       <strong>Price:</strong><p>₱<?php echo number_format($row['eventPrice']);?> </p>
       <hr>
        <strong>Reserved Date :</strong><p>₱<?php echo $row['dateReserved'];?> </p>
       <hr>




        </div>
    </div>
    <div class="col-md-6">
       
       <img src="../img/gallery/<?php echo $row['img'] ?>" style="width:100%;padding-right:10px;" alt="event">

    </div>



</div>

<a style="margin-right:20px;float:right;" class="btn btn-info confirm" id="<?php echo $row['id']; ?>">Confirm Reservation</a>


<br><br><br><br><br><br>



                               
        </div>
        <!-- /#page-wrapper -->
<div id="ajax_catcher"></div>
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
        $(".confirm").click(function(){

            var id = $(this).attr('id');

        

            $.ajax({
                type:'post',
                url:'php/confirmReservation.php',
                data:{id:id},
                success:function(x)
                {
                    $("#ajax_catcher").html(x);
                }
            });

 });
    });

    </script>

</body>

</html>
