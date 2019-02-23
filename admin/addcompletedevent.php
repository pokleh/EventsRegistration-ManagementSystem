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

   
<script src="js/tinymce/tinymce.min.js" type="text/javascript"></script>
     <script type="text/javascript">
      tinymce.init({
        selector: "textarea",
        statusbar: false,
        height : '250px',
        
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
                        <h1 class="page-header">Add Completed Event</h1>
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

        <img src="../img/notfound.png" alt="img" id="blah" style="width:100%; height:300px;">
        <br>
        <br>
        <form action="addcompletedevent" method="POST" enctype="multipart/form-data">
            <p>Upload cover photo</p>
            <input type="file" name="image" id="image" class="form-control" onchange="readURL(this);" accept=".jpg, .png, .jpeg">

   

        
     </div>



    <div class="col-md-5">
        <div class="form-group">
            <label for="">Event name</label>
            <input type="text" name="name" class="form-control" id="name">
        </div>

        <div class="form-group">
            <label for="">Event Category</label>
            <select name="category" id="categ" class="form-control">
                <option value="">--Select Event Category--</option>
                <option value="birthday">Birthday</option>
                 <option value="christening">Christening</option>
                <option value="wedding">Wedding</option>
            </select>
        </div>
        <br>
        <div class="form-group">
            Upload images for gallery:
    <input type="file" id="gallery" name="gallery[]" accept=".jpg, .png, .jpeg" multiple >
   
        </div>
    <input type="submit" id="submitForm" name="submit" hidden >
    </form>
    <button class="btn btn-info" style="float:right;" id="next"> Save <i class="fa fa-save"></i></button><br><br>
<div class="alert alert-danger" hidden></div>
    </div>



 </div>

       
<?php 


 if(isset($_POST['submit']))
{

$rowID = $connection->query("SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES
WHERE table_name = 'completedevents'")->fetch_assoc();
$rid = $rowID['auto_increment'];



$name = $_POST['name'];
$category = $_POST['category'];

$image=$_FILES['image']['tmp_name'];
$imgname=$_FILES['image']['name'];


$update2=$connection->prepare("INSERT INTO  completedevents (eventName,eventCategory,coverPhoto) VALUES (?,?,?) ");
$update2->bind_param('sss',$name,$category,$imgname);
if($update2->execute())
{


  move_uploaded_file($image,"../img/completedevent/".$imgname);
    $_SESSION['uploadMultiple'] = 'Event successfully added';




for($i=0;$i<count($_FILES["gallery"]["name"]);$i++)
{
$filename=$_FILES['gallery']['name'][$i];
$insert="INSERT INTO completedeventsimg (eventID,img) VALUES('$rid','$filename')";
if($connection->query($insert)){}
 $uploadfile=$_FILES["gallery"]["tmp_name"][$i];
 $folder="../img/completedevent/";
 move_uploaded_file($_FILES["gallery"]["tmp_name"][$i], "$folder".$_FILES["gallery"]["name"][$i]);

}


  echo "<script language='javascript'>
  

window.location ='completedevents';

</script>
    ";
}

}

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
    $("#next").click(function(){

var image = $("#image").val();
var name = $("#name").val();
var categ = $("#categ").val();
var gallery = $("#gallery").val();
     
                    if(image == "")
                    {
                        $(".alert").html('Please upload cover photo');
                        $(".alert").show();
                    }
                   else if(name == "")
                    {
                        $(".alert").html('Please enter event name');
                        $(".alert").show();
                    }
                     else if(categ == "")
                    {
                        $(".alert").html('Please select category');
                        $(".alert").show();
                    }

                      else if(gallery == "")
                    {
                        $(".alert").html('Please upload images for gallery');
                        $(".alert").show();
                    }


                    else
                    {
                        $("#submitForm").click();
                    }




    });

});


    </script>

</body>

</html>
