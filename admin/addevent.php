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

$delete = "DELETE  FROM packageincluded WHERE status = '' ";
if($connection->query($delete)){}
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
 
    
<script src="js/tinymce/tinymce.min.js" type="text/javascript"></script>
     <script type="text/javascript">
      tinymce.init({
        selector: "textarea",
        statusbar: false,
        height : '150px',
        width:'800px',

        
        auto_focus: "main_editor",
        relative_urls : true,
        entity_encoding: 'raw',
        menubar: false
       });
      </script>


      <style>

body{
    overflow-x:hidden;
}
      </style>

</head>

<body>

    <div id="wrapper">
   <!-- Navigation -->
       <?php include('php/navbar.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                        <h1 class="page-header">Add New Event</h1>
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

     <div class="col-md-4">
            <br><br>
            <div class="form-group">


  <div class="form-group">
                <label for="">Event name</label>
                <input type="text" class="form-control" id="title">
            </div>




                <label for="">Event Category</label>
                <select name="" id="category" class="form-control">
                    <option value="">--Category--</option>
                    <option value="wedding">Wedding</option>
                    <option value="birthday">Birthday</option>
                    <option value="christening">Christening</option>
                    <option value="others">Others</option>
                </select>
            </div>


             <div class="form-group">
                <label for="">Pax</label>
                <input type="number" class="form-control" id="pax">
            </div>

            <div class="form-group">
                <label for="">Price</label>
                <input type="number" min = "1" class="form-control" id="price" >
            </div>



 
     </div>

      <div class="col-md-6">

        <img src="../img/notfound.png" alt="img" id="blah" style="width:400px;height:300px;margin-left:150px;">
        <br>
        <br>
        <form action="addevent" method="post" enctype="multipart/form-data" style="margin-left:150px;">
            <p>Upload new photo</p>
            <input type="file" name="image" id="image" class="" onchange="readURL(this);" accept=".jpg, .png, .jpeg">
        
            <input type="submit" name="submit" style="display:none;" id="upload">
        </form>


        <?php 


 if(isset($_POST['submit']))
{


$rowID = $connection->query("SELECT * FROM events ORDER BY id DESC LIMIT 1")->fetch_assoc();
$rid = $rowID['id'];

$image=$_FILES['image']['tmp_name'];
$name=$_FILES['image']['name'];


$update2=$connection->prepare("UPDATE events SET img='$name' WHERE id= ? ");
$update2->bind_param('i',$rid);
if($update2->execute())
{

  move_uploaded_file($image,"../img/gallery/".$name);

  $_SESSION['update'] = 'Event successfully added';
  echo "<script language='javascript'>
  

window.location ='events';

</script>
    ";
}


}


        ?>
        
     </div>

 </div><br><br>


<div class="row">
    <div class="col-md-6">
        <div class="form-group">
         <label for="">Add Package included: <small>Press Enter to add</small> </label>
        <input type="text" id="package" class="form-control" placeholder="Enter package included" style="width:320px;">
     
        <div id="package-container"></div>
    </div>
 
</div>
 
<br><br><br><br>
 <div class="container">
    <div class="row">
        <div class="col-md-12">

    <br> <b>Food included:</b>
   <textarea name="" id="food" style=""></textarea>
   
</div>
</div>

</div>
  <div class="alert alert-danger" style="width:40%;display:none;"></div>
 <button class="btn btn-info" style="float:right;margin-right:20px;" id="update">Add Event</button>
<?php


$rowID = $connection->query("SHOW TABLE STATUS LIKE 'events'")->fetch_assoc();
$lastID = $rowID['Auto_increment'];

 ?>

                           
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




$(document).ready(function(){
    $("#package").keydown(function (e){

        var packageIncluded = $(this).val();
       
            if(e.keyCode==13)

            {


                if(packageIncluded=="")
                {
                  
                }
                else
                {
                
                    $.ajax({

                        type:'post',
                        url:'php/packageIncluded.php',
                        data:{packageIncluded:packageIncluded},
                        success:function(b)
                            {
                                $("#ajax_catcher").html(b);
                            }


                    });

                  $("#package").val('');

                }
             
              }

    });


});


function intArray()
{
  
  var lastID = <?php echo $lastID; ?>;



  $.ajax({

        type:'post',
        url:'php/viewPackInc.php',
        data:{lastID:lastID},
        success:function(data)
        {
          $("#package-container").html(data);
        }

      });


} 

setInterval(intArray,1000);







    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });


 function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }


$(document).ready(function(){
    $("#update").click(function(){
  
    var lastID = <?php echo $lastID; ?>;

     var title = $("#title").val();

     var category = $("#category").val();
     var pax = $("#pax").val();
     var price = $("#price").val();
      var image = $("#image").val();
    var food = tinyMCE.get('food').getContent();
     
                    if(title == "")
                    {
                        $(".alert").html('Please enter event name');
                        $(".alert").show();
                    }
                   else if(category == "")
                    {
                        $(".alert").html('Please select category');
                        $(".alert").show();
                    }
                     else if(pax == "")
                    {
                        $(".alert").html('Please enter number of pax');
                        $(".alert").show();
                    }

                    else if(price == "")
                    {
                        $(".alert").html('Please enter price');
                        $(".alert").show();
                    }

                    
                 
                     else if(image == "")
                    {
                        $(".alert").html('Please add image for event');
                        $(".alert").show();
                    }
 
                    else
                    {
                        $.ajax({

                                type:'post',
                                url:'php/addEvent.php',
                                data:{title:title,category:category,pax:pax,price:price,food:food,lastID:lastID},
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
