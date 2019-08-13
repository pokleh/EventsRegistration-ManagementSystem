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

$id = $_SESSION['adminID'];
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
                    <h1 class="page-header">My Profile</h1>
                </div>
               
         
                <!-- /.col-lg-12 -->
                <div class="row">
                    <div class="col-md-12">
                        <?php if(isset($_SESSION['change'])){ ?>
            <div class="alert alert-success"><?php echo $_SESSION['change']; unset($_SESSION['change']); ?></div>
            <?php } 
               ?>
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

$row = $connection->query("SELECT * FROM  user_account WHERE userID='$id'")->fetch_assoc();

?>




  <p>Full name: <br> <span style="font-weight:bold;"><?php echo ucwords($row['fullName']); ?></span> <a href="changemyfullname" style="float:right;color:gray;font-family:arial;"><i class="fa fa-pencil"></i> Change fullname</a></p>
                <hr>
                <p>Address: <br> <span style="font-weight:bold;"><?php if($row['address'] == "") {  echo "<span style='color:red;'>(incomplete)</span>";} else { echo $row['address']; } ?></span> <a href="updatemyaddress" style="float:right;color:gray;font-family:arial;"><i class="fa fa-pencil"></i> Update address</a></p>
                <hr>
                <p>Birthday: <br> <span style="font-weight:bold;"><?php if($row['birthDay'] == "") {  echo "<span style='color:red;'>(incomplete)</span>";}  else { echo $row['birthDay']; }  ?></span> <a href="updatemybirthday" style="float:right;color:gray;font-family:arial;"><i class="fa fa-pencil"></i> Update birthday</a></p>
                <hr>
                <p>Contact number: <br> <span style="font-weight:bold;"><?php if($row['contactNumber'] == "") {  echo "<span style='color:red;'>(incomplete)</span>";}  else { echo $row['contactNumber']; }  ?></span> <a href="updatemycontactnumber" style="float:right;color:gray;font-family:arial;"><i class="fa fa-pencil"></i> Update contact number</a></p>
                <hr>
                <p>Username: <br> <span style="font-weight:bold;"><?php echo $row['username']; ?></span><a href="changemyusername" style="float:right;color:gray;font-family:arial;"><i class="fa fa-pencil"></i> Change username</a></p>   
                <hr>
                <p>Password: <br> <span style="font-weight:bold;">***********</span><a href="changepassword" style="float:right;color:gray;font-family:arial;"><i class="fa fa-pencil"></i> Change password</a></p>
                 
               


                               
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
   




    </script>

</body>

</html>
