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
                    <h1 class="page-header">Messages</h1>
                </div>
                <!-- /.col-lg-12 -->


            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                        <?php if(isset($_SESSION['sent'])){ ?>
                      <div class="alert alert-success">Message successfully deleted</div> <?php } unset($_SESSION['sent']); ?>

                    <div class="panel panel-default">

                        <div class="panel-heading">
                          
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">


<thead>
                <tr>
                               <th>Name</th>
                                <th>Email</th>
                                <th>subject</th>
                                <th>Date Sent</th>
                                <th>Action</th>
                                
                             
                             
                            </tr>
      </thead>   
                            
                            <?php
$select = "SELECT * FROM messages ORDER BY status DESC ";
                                $result = $connection->query($select);
                                if($result->num_rows > 0)
                                {
                                while($row = $result->fetch_assoc())
                                {

                             ?>

                                <?php
                                 if($row['status'] == "unread")
                                {  

                                    echo "<tr style='font-weight:bold;'>";
                                }
                                else
                                {
                                    echo " <tr style='color:gray;'>";
                                }

                                    ?>
                                

                              
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['subject'] ?></td>
                                     <td><?php echo date('Y-m-d',strtotime($row['dateSent'])) ?></td>
                                    <td>
                                    <button class="btn btn-info btn-sm read" id="<?php echo $row['id'] ?>">Read</button>
                                    <button class="btn btn-danger btn-sm delete" id="<?php echo $row['id'] ?>">Delete</button>
                                    </td>
                                </tr>
                                   
                             <?php }
                                }
                                else {
                                    echo "<br><h4> No Messages </h4>";
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

$(".read").click(function(){

var id = $(this).attr('id');



    $.ajax({

        type:'post',
        url:'php/readmessage.php',
        data:{id:id},
        success:function(x)
        {
            $("#ajax_catcher").html(x);
        }

    });


});

  });


$(document).ready(function() {

$(".delete").click(function(){

var id = $(this).attr('id');

if(confirm('Do you really want to delete this message?'))
{

    $.ajax({

        type:'post',
        url:'php/deleteMessage.php',
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
