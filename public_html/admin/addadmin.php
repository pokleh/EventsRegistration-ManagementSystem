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

    <link rel="stylesheet" href="../css/bootstrap-datepicker3.css">

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
                    <h1 class="page-header">Add Admin</h1>
                    <div class="alert alert-info">Upon adding new admin. a password will be <i>fabevents123</i> as a default password</div>
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


            <div class="row">

                <div class="col-md-5">
                    <div class="form-group">
                        <label for="">Fullname</label>
                        <input type="text" class="form-control" id="fullName" onkeypress='return event.charCode >= 95 && event.charCode 

<= 122'
>
                    </div>
                </div>




            </div>



            <div class="row">

                <div class="col-md-5">
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" class="form-control" id="address">
                    </div>
                </div>

                


            </div>


            <div class="row">

                <div class="col-md-5">
                    <div class="form-group">
                        <label for="">Birthday</label>
                        <input type="text" class="form-control" id="birthday">
                    </div>
                </div>

                


            </div>


            <div class="row">

                <div class="col-md-5">
                    <div class="form-group">
                        <label for="">Contact Number</label>
                        <input type="text" class="form-control" id="contactNumber" onkeypress='return event.charCode >= 48 && event.charCode 

<= 57'>
                    </div>
                </div>

                


            </div>


            <div class="row">

                <div class="col-md-5">
                    <div class="form-group">
                        <label for="">Email address</label>
                        <input type="text" class="form-control" id="emailAddress">
                    </div>
                </div>

                


            </div>


            <div class="row">

                <div class="col-md-5">
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" class="form-control" id="username">
                    </div>
                </div>

                


            </div>





            <div class="row">

                <div class="col-md-5">
                  <div class="button btn btn-info" style="float:right;" id="submit">Submit</div>
                </div>

                


            </div>

<br><br>
 <div class="row">

                <div class="col-md-5">
                 <div class="alert alert-danger" style="display:none;"></div>
                </div>

                


            </div>

<br><br>



                           
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
  <script src="../js/bootstrap-datepicker.min.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });

$(document).ready(function(){
 
 
    $("#birthday").datepicker({
            
            autoclose:true,
            startDate : new Date(),
            
         

            
     });

 });


    $(document).ready(function(){
        $("#submit").click(function(){

var fullName = $("#fullName").val();
var address= $("#address").val();
var birthday= $("#birthday").val();
var contactNumber= $("#contactNumber").val();
var emailAddress= $("#emailAddress").val();
var username= $("#username").val(); 
var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;


            if(fullName == "")
            {
                    $(".alert-danger").html("Please enter full name");
                    $(".alert-danger").show();
            }
        
             else if(address == "")
            {
                    $(".alert-danger").html("Please enter address");
                    $(".alert-danger").show();
            }

                 else if(address.length < 10 )
            {
                    $(".alert-danger").html("Invalid address");
                    $(".alert-danger").show();
            }

            else if(birthday == "")
            {
                    $(".alert-danger").html("Please enter birthday");
                    $(".alert-danger").show();
            }
            
            else if(contactNumber == "")
            {
                    $(".alert-danger").html("Please enter contact number");
                    $(".alert-danger").show();
            }


            else if(contactNumber == "")
    {
    $(".alert-danger").html('Enter your contact number');
    $(".alert-danger").show();
   

  }
  else if(isNaN(contactNumber))
  {
    $(".alert-danger").html('Invalid contact number');
   $(".alert-danger").show();
   
  }

  else if(contactNumber.length != 11)
  {
    $(".alert-danger").html('Invalid contact number');
   $(".alert-danger").show();
   
  }

  else if(contactNumber.substring(0,2) != "09")
  {
    $(".alert-danger").html('Invalid contact number');
   $(".alert-danger").show();
   
  }



            else if(regex.test(emailAddress) == false)
            {
                    $(".alert-danger").html("Invalid email address");
                    $(".alert-danger").show();
            }

             else if(emailAddress == "")
            {
                    $(".alert-danger").html("Please enter email address");
                    $(".alert-danger").show();
            }


             else if(username == "")
            {
                    $(".alert-danger").html("Please enter username");
                    $(".alert-danger").show();
            }

             else if(username.length < 5)
            {
                    $(".alert-danger").html("username too short");
                    $(".alert-danger").show();
            }

            else
            {

                $.ajax({
                type:'post',
                url:'php/addAddmin.php',
                data:{fullName:fullName,address:address,birthday:birthday,contactNumber:contactNumber,emailAddress:emailAddress,username:username},
                success:function(x)
                {
                    $("#ajax_catcher").html(x);
                }


                })
            }

        });
 });

    </script>

</body>

</html>
