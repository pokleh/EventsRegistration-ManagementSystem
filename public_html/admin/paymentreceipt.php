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
                    <h1 class="page-header">Payment Receipt</h1>
                </div>
                <!-- /.col-lg-12 -->

            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <?php if(isset($_SESSION['success'])){ ?>
                       <div class="alert alert-success"><?php echo $_SESSION['success']; ?></div>
                       <?php } unset($_SESSION['success']) ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">


<thead>
                <tr>
                               <th>Name</th>
                                <th>Event reserved</th>
                                <th>Date Reserved</th>
                                <th>Remitance</th>
                               <th>Date Uploaded</th>
                               <th>Action</th>
                             
                             
                            </tr>
      </thead>   
                            
                            <?php
$select = "SELECT user_account.userID,user_account.fullName,uploadedpayment.trackingNumber,uploadedpayment.amount,uploadedpayment.receipt,uploadedpayment.remitance,uploadedpayment.dateUploaded,uploadedpayment.id,reservedcustomer.dateReserved,uploadedpayment.eventID FROM uploadedpayment 

INNER JOIN user_account ON uploadedpayment.userID = user_account.userID
INNER JOIN reservedcustomer ON uploadedpayment.eventID = reservedcustomer.id
WHERE uploadedpayment.status = '';
";
                                $result = $connection->query($select);
                                if($result->num_rows > 0)
                                {
                                while($row = $result->fetch_assoc())
                                {
                                    $userID = $row['userID'];
                                    $reservedID = $row['eventID'];

 $select1 = $connection->query("SELECT * FROM reservedcustomer WHERE id = '$reservedID'")->fetch_assoc();
 $eve = $select1['eventID'];

                                $select2 = $connection->query("SELECT * FROM events WHERE id = '$eve'")->fetch_assoc();
                                  
                                    
                             ?>
                                    <tr id="table_<?php echo $row['id'] ?>">
                                        <td><?php echo ucwords($row['fullName']); ?></td>
                                           <td><?php echo ucwords($select2['eventTitle']); ?></td>
                                         <td><?php echo ucwords($row['dateReserved']); ?></td>
                                            <td><?php echo ucwords($row['remitance']); ?></td>
                                            <td><?php echo ucwords($row['dateUploaded']); ?></td>
                                   
                                     <td>
                                        <a id="<?php echo $row['id']; ?>"class="btn btn-danger archive btn-sm"> Delete </a>
                                        <a href="viewpayment?id=<?php echo $row['id']; ?>"class="btn btn-info  btn-sm">View </a>
                                     </td>
                                     
                                   
                                </tr>
                             <?php }
                                }
                                else {
                                    echo "<br><h4> No reservation </h4>";
                                }
                              ?>
                            


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

             
if(confirm('Do you really want to archive this event?'))
{
                $.ajax({

                    type:'post',
                    url:'php/archive.php',
                    data:{id:id},
                    success:function(x)
                    {
                        $("#ajax_catcher").html(x);
                           $("#table_" + id).fadeOut(1000);
                    }

                }); 
}
        });
    });
    </script>

</body>

</html>
