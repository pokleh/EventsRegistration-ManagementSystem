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
                    <h1 class="page-header">Break down of Payment</h1>
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
                            <table class="table">
                                <tr>
                                    <th>One Thousand Pesos</th>
                                    <th>Five Hundred Pesos</th>
                                    <th>Two Hundred Pesos</th>
                                    <th>One Hundred Pesos</th>
                                    <th>Fifty Pesos</th>
                                    <th>Twenty Pesos</th>
                                    <th>Ten Pesos</th>
                                    <th>Five Pesos</th>
                                    <th>One Pesos</th>
                                </tr>
                           
            
                            
        <?php 
         $userID = mysqli_escape_string($connection,$_GET['userid']);
         $eventid = mysqli_escape_string($connection,$_GET['eventid']);
         $paymentID =  mysqli_escape_string($connection,$_GET['paymentid']);
         $paymentDate =  mysqli_escape_string($connection,$_GET['date']);
         $amount =  mysqli_escape_string($connection,$_GET['amount']);
      


             $name = $connection->query("SELECT * FROM user_account WHERE userID = '$userID'")->fetch_assoc();
             
             $paymentBreakdown = $connection->query("SELECT * FROM paymentbreakdown WHERE paymentID = '$paymentID' AND userID = '$userID' AND eventID = '$eventid' AND dateUpdated = '$paymentDate'")->fetch_assoc();
           //to be follow  $event = $connection->query("SELECT * FROM user_account WHERE userID = '$userID'")->fetch_assoc();
                   echo "<b>Customer Name: ". ucwords($name['fullName']) ."</b><br>";
                    echo "<b>Payment Date: ". date('Y-m-d',strtotime($paymentDate))."</b><br>";
                      echo "<b style='color:red;'>Amount: ". $amount ."</b><br><br><br>";
                         ?>
                

    <tr>
        <td><?php echo $paymentBreakdown['thousand']; ?></td>
         <td><?php echo $paymentBreakdown['five']; ?></td>
          <td><?php echo $paymentBreakdown['two']; ?></td>
           <td><?php echo $paymentBreakdown['onehun']; ?></td>
            <td><?php echo $paymentBreakdown['fifty']; ?></td>
             <td><?php echo $paymentBreakdown['twenty']; ?></td>
              <td><?php echo $paymentBreakdown['ten']; ?></td>
               <td><?php echo $paymentBreakdown['fivepes']; ?></td>
                <td><?php echo $paymentBreakdown['one']; ?></td>
    </tr>


</table>


                      
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
                    }

                });
}
        });
    });
    </script>

</body>

</html>
