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
   <?php include('php/navbar.php'); ?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Change Fullname</h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="row">
                    <div class="col-md-12">
                       
                    </div>
                </div>
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
$id = mysqli_escape_string($connection,$_GET['id']);
$row = $connection->query("SELECT * FROM  user_account WHERE userID='$id'")->fetch_assoc();

?>


<div class="row offer_inner">
                  <div class="col-md-5">
                        <div class="alert alert-danger" style="display:none;"></div>
                        <p>Change <?php echo $row['fullName']; ?> to:</p>
                            <input type="text" class="form-control" id="fullName" placeholder="Full name eg: Juan Cruz Dela Cruz ">
                                <br>
                            <button class="btn btn-danger" style="float:right;" id="change">Change</button>
                        
        			</div>
                    </div>
               


                               
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
   

$(document).ready(function(){
    $("#change").click(function(){

        var fullName  = $("#fullName").val();
        var userID = <?php echo $id; ?>;

        if(fullName == "")
                {
                        $(".alert").html('Please enter fullname');
                        $(".alert").show();
                }

        else if (fullName.length < 10)
        {
            $(".alert").html('Invalid fullname');
            $(".alert").show();
        }

        else
        {
            $(".alert").html('');
            $(".alert").hide();


            $.ajax({

                    type:'post',
                    url:'php/changeFullName.php',
                    data:{userID:userID,fullName:fullName},
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
