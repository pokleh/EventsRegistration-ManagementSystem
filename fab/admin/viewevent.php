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
 ?>
<html lang="en">

<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

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
                    <h1 class="page-header">Events</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <?php if(isset($_SESSION['update'] )) { ?>
                    <div class="alert alert-success"><?php echo  $_SESSION['update'] ; ?></div>
                    <?php } unset($_SESSION['update'] ); ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">


    <?php
$id = mysqli_escape_string($connection,$_GET['id']);
$row = $connection->query("SELECT * FROM events WHERE id ='$id'")->fetch_assoc();
 ?>

 <div class="row">

     <div class="col-md-4">
            <br><br>
            <div class="form-group">


  <div class="form-group">
                <label for="">Event name</label>
                <input type="text" class="form-control" id="title" value="<?php echo $row['eventTitle'] ?>">
            </div>




                <label for="">Event Category</label>
                <select name="" id="category" class="form-control">
                    <option value="<?php echo $row['eventCategory'] ?>"><?php echo ucwords($row['eventCategory']); ?></option>
                    <option value="wedding">Wedding</option>
                    <option value="birthday">Birthday</option>
                    <option value="christening">Christening</option>
                    <option value="others">Others</option>
                </select>
            </div>


             <div class="form-group">
                <label for="">Pax</label>
                <input type="text" class="form-control" id="pax" value="<?php echo $row['pax'] ?>">
            </div>

            <div class="form-group">
                <label for="">Price</label>
                <input type="text" class="form-control" id="price" value="<?php echo $row['eventPrice'] ?>">
            </div>




     </div>

      <div class="col-md-6">

        <img src="../img/gallery/<?php echo $row['img'] ?>" alt="img" id="blah" style="width:100%;">
        <br>
        <br>
        <form action="viewevent?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
            <p>Upload new photo</p>
            <input type="file" name="image" class="form-control" onchange="readURL(this);" accept=".jpg, .png, .jpeg">
        
            <input type="submit" name="submit" style="display:none;" id="upload">
        </form>


        <?php 


 if(isset($_POST['submit']))
{

$image=$_FILES['image']['tmp_name'];
$name=$_FILES['image']['name'];

 
 if($image == "")

{

  $_SESSION['update'] = 'Event successfully updated';
  echo "<script language='javascript'>
  

window.location ='viewevent?id=$id';

</script>
    ";
}
else
{
$update2=$connection->prepare("UPDATE events SET img='$name' WHERE id= ? ");
$update2->bind_param('i',$id);
if($update2->execute())
{

  move_uploaded_file($image,"../img/gallery/".$name);

  $_SESSION['update'] = 'Event successfully updated';
  echo "<script language='javascript'>
  

window.location ='viewevent?id=$id';

</script>
    ";
}
}
}

        ?>
        
     </div>

 </div>
<br><br><br>
<div class="row">
    <div class="col-md-12">
        <label for="">Event information</label>
        <textarea name="textarea" id="info" cols="30" rows="10" class="form-control"><?php echo $row['eventInfo'] ?></textarea>
  <br><br>  <br><br>
  <div class="alert alert-danger" style="width:40%;display:none;"></div>
    <button class="btn btn-info" style="float:right;" id="update">Update Event</button>
  <br><br>  <br><br>
    </div>
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
    $("#update").click(function(){

     var title = $("#title").val();
      var info = $("#info").val();
     var category = $("#category").val();
     var pax = $("#pax").val();
     var price = $("#price").val();
     var id = <?php echo $id; ?>;
     
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
                     else if(info == "")
                    {
                        $(".alert").html('Please add information for event');
                        $(".alert").show();
                    }

                    else
                    {
                        $.ajax({

                                type:'post',
                                url:'php/updateEvent.php',
                                data:{title:title,category:category,pax:pax,price:price,info:info,id:id},
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
