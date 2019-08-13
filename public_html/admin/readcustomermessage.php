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

$id = mysqli_escape_string($connection,$_GET['id']);


if($connection->query("UPDATE clientmessage SET status = 'seen' WHERE id = '$id'")){ }

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
      <script src="js/tinymce/tinymce.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      tinymce.init({
        selector: "textarea",
        statusbar: false,
        height : '150px',
    

        
        auto_focus: "main_editor",
        relative_urls : true,
        entity_encoding: 'raw',
        menubar: false
       });
      </script>

</head>

<body>

    <div id="wrapper">
   <!-- Navigation -->
      <?php include('php/navbar.php'); ?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Customers Messages</h1>
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
                          
                            
                            <?php
$select = "SELECT user_account.fullName,clientmessage.id,clientmessage.userID,clientmessage.subject,clientmessage.message,clientmessage.dateSent,clientmessage.status 
FROM clientmessage 

INNER JOIN user_account ON clientmessage.userID = user_account.userID
WHERE clientmessage.deleteStatusAdmin = ''
ORDER BY clientmessage.status DESC ";
                                $result = $connection->query($select);
                                $row = $result->fetch_assoc();
                                ?>
                            



<b>Sender: <?php echo ucwords($row['fullName']) ?></b><br>
<b>Date Sent: <?php echo date('M-d-Y',strtotime($row['dateSent'])) . " " . date('g:i a',strtotime($row['dateSent'])) ?></b><br>
<b>Subject: <?php echo ucwords($row['subject']) ?></b><br>



<br><br>

<div id="messageContainer" style="height:400px;overflow:auto;">
    
<?php
$id = mysqli_escape_string($connection,$_GET['id']);
$repply = $connection->query("SELECT * FROM reply WHERE messageID = '$id' ORDER BY dateSent DESC");

while($rowRepply = $repply->fetch_assoc())
{
    if($rowRepply['class']=='admin')
    {
         echo "<span style=''>You:</span>" . $rowRepply['repply'] . "<hr>";
    }
    else
    {
    echo ucwords($row['fullName']) .":" . $rowRepply['repply'] . "<hr>";
    }
}
 ?>



    
<?php echo ucwords($row['fullName']) .":" . $row['message']; ?>

</div>

<hr>
<div id="replyContainer">
    <b>Repply:</b>
    <textarea name="textarea" id="message"></textarea>
    <br><br>
    <button class="btn btn-info btn-sm" style="float:right;" id="send">Send</button>
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
    <?php 
$id = mysqli_escape_string($connection,$_GET['id']);
$userID = mysqli_escape_string($connection,$_GET['userid']);
 ?>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });


    $(document).ready(function() {

$("#send").click(function(){

var id = <?php echo $id ?>;
var  message = tinyMCE.get('message').getContent();
var userID = <?php echo $userID ?>;

    if(message == "")
    {
        alert('Please write your repply');
    }

    else
    {



    $.ajax({

        type:'post',
        url:'php/sendRepply.php',
        data:{id:id,message:message,userID:userID },
        success:function(x)
        {
            $("#ajax_catcher").html(x);
        }

    });

     }


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
