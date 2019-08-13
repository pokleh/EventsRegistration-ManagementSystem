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
                    <h1 class="page-header">Completed Events</h1>
                </div>
               
         
                <!-- /.col-lg-12 -->
              
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <?php if(isset($_SESSION['info'])){?>
                    <div class="alert alert-success"><?php echo $_SESSION['info']; ?></div>
                    <?php } ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="addcompletedevent"><i class="fa fa-plus-circle"></i> Add Completed Event</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                              <div class="gallery_f_inner row imageGallery1">
                    
                <?php


                    $query = $connection->query("SELECT * FROM completedevents ORDER BY eventCategory ASC");
                        while($row = $query->fetch_assoc())
                            {  ?>
                                <div class="col-lg-4 col-md-4 col-sm-6 brand manipul design print">
                        <div class="h_gallery_item" style="margin-top:50px;">
                            <a href="viewcompletedevent?eventid=<?php echo $row['id'] ?>">
                            
                                <img class="img-fluid" src="../img/completedevent/<?php echo $row['coverPhoto'] ?>" style="width:100%;height:300px;" alt="">
                        </a>
                            
                            <div class="g_item_text">
                                <br>
                                <p style="text-align:center;"><?php echo ucwords($row['eventName']) ?><p>
                                   <center>

                                    <a href="viewcompletedevent?eventid=<?php echo $row['id'] ?>" class="btn btn-info btn-sm">View / Edit</a>
                                     <a id="<?php echo $row['id'] ?>"  style="cursor:pointer" class="btn btn-danger btn-sm delete-ev">Delete</a>
                                </center>
                            </div>
                        </div>
                        
                    </div>
                            
                            <?php } ?>




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

    $(".delete-ev").click(function(){


        var id = $(this).attr('id');

        if(confirm('Do you really want to delete this event?'))

        {
            $.ajax({
                type:'post',
                url:'php/deleComEv.php',
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
