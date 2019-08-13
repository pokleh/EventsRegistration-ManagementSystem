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
 
$rid = mysqli_escape_string($connection,$_GET['eventid']);
$rowEv = $connection->query("SELECT * FROM completedevents WHERE id = '$rid'")->fetch_assoc();
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
                        <h3 class="page-header">View / Edit Completed Event</h3>
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

        <img src="../img/completedevent/<?php echo $rowEv['coverPhoto'] ?>" alt="img" id="blah" style="width:100%; height:300px;">
        <br>
        <br>
        <form action="viewcompletedevent?eventid=<?php echo $rid; ?>" method="POST" enctype="multipart/form-data">
            <p>Upload cover photo</p>
            <input type="file" name="image" id="image" class="form-control" onchange="readURL(this);" accept=".jpg, .png, .jpeg">

   

        
     </div>



    <div class="col-md-5">

        <div class="form-group">
            <label for="">Event name</label>
            <input type="text" name="name" class="form-control" id="name" value="<?php echo $rowEv['eventName'] ?>" autocomplete="off">
        </div>

        <div class="form-group">
            <label for="">Event Category</label>
            <select name="category" id="categ" class="form-control">
                <option value="<?php echo $rowEv['eventCategory'] ?>"><?php echo ucwords($rowEv['eventCategory']) ?></option>
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


<hr>
<h4>Gallery</h4>

<div class="row">
    <div class="col-md-12">
       

<div class="galery-container" style="border-top:1px solid gray;">

            <ul>
            <?php
            $rid = mysqli_escape_string($connection,$_GET['eventid']);
                $stmt_del =$connection->prepare("SELECT * FROM completedeventsimg WHERE eventID = ? ");
                $stmt_del->bind_param('i',$rid);
                $stmt_del->execute();
                $result_del = $stmt_del->get_result();
                while($row_del = $result_del->fetch_assoc()){
                ?>
                    
                    <li style="display:inline-block;margin-top:20px;margin-left:10px;" id="row_<?php echo $row_del['id']; ?>">
                        <div>
                            <a style="cursor:pointer;" class="view_del" id="<?php echo $row_del['id']; ?>"><img src="../img/completedevent/<?php echo $row_del['img']; ?>" alt="" style="width:100px;height:100px;"></a>
                                <br><input type="checkbox" name="img_id[]"  class="delete_del" value="<?php echo $row_del['id']; ?>" <?php if($row_del['img'] == ""){ echo "hidden"; } ?>>
                        </div>
                    </li>

                <?php } ?>


        </ul>

     
        </div>
        <br>
        <button id="selectAllDel" class="btn btn-success">Select all</button>
        <button class="btn btn-default" id="deleteItemsDel">Delete <span class="glyphicon glyphicon-trash"></span></button>
        <br><br>

</div>




    </div>
</div>






       
<?php 
$rid2 = mysqli_escape_string($connection,$_GET['eventid']);
$rowEv2 = $connection->query("SELECT * FROM completedevents WHERE id = '$rid2'")->fetch_assoc();

 if(isset($_POST['submit']))
{


$rid = mysqli_escape_string($connection,$_GET['eventid']);
$name = $_POST['name'];
$category = $_POST['category'];

if($_FILES['image']['size'] == 0)
{

 $update2=$connection->prepare("UPDATE completedevents SET eventName = ? , eventCategory = ? WHERE id = ? " );
  $update2->bind_param('ssi',$name,$category,$rid);
}
else
{
 
$image=$_FILES['image']['tmp_name'];
$imgname=$_FILES['image']['name'];
  $update2=$connection->prepare("UPDATE completedevents SET eventName = ? , eventCategory = ? , coverPhoto = ? WHERE id = ? " );
$update2->bind_param('sssi',$name,$category,$imgname,$rid);
}



$update2->execute();




if($_FILES['image']['name'] == "") 
{


}

else
{


  move_uploaded_file($image,"../img/completedevent/".$imgname);
    $_SESSION['uploadMultiple'] = 'Event successfully updated';

}


if($_FILES['gallery']['name'] == "") 
{


}

else
{
for($i=0;$i<count($_FILES["gallery"]["name"]);$i++)
{
$filename=$_FILES['gallery']['name'][$i];
$insert="INSERT INTO completedeventsimg (eventID,img) VALUES('$rid2','$filename')";
if($connection->query($insert)){}
 $uploadfile=$_FILES["gallery"]["tmp_name"][$i];
 $folder="../img/completedevent/";
 move_uploaded_file($_FILES["gallery"]["tmp_name"][$i], "$folder".$_FILES["gallery"]["name"][$i]);

}

}
  echo "<script language='javascript'>
  

window.location ='completedevents';

</script>
    ";
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











$(document).ready(function(){

$("#deleteItemsDel").click(function(){

   if(confirm("Are you sure you want to delete these images?"))  
           {  
                var id = [];  
                $('.delete_del:checked').each(function(i){  
                     id[i] = $(this).val();  
                });  
                if(id.length === 0) //tell you if the array is empty  
                {  
                     alert("Please Select item to delete");  
                }   
                else  
                {   
                     $.ajax({  
                          url:'php/delete_gal.php',  
                          method:'POST',  
                          data:{id:id},  
                          success:function(e)  
                          {  
                                $(".cont").html(e);
                               for(var i=0; i<id.length; i++)  
                               {  
                                    $('#row_'+id[i]+'').css('background-color', '#ccc');  
                                    $('#row_'+id[i]+'').fadeOut('slow');  
                               }  
                          }  
                     });  
                }  
           }  
           else  
           {  
                return false;  
           }  

});

});






$( document ).ready( function(){
    $("#selectAllDel").click(function(){
    var checkboxes2 = $( '.delete_del' );

    // Check all checkboxes
    checkboxes2.prop( 'checked', true );

    // Check if they are all checked and alert a message
    // or, if not, alert something else.
   checkboxes2.filter( ':checked' ).length == checkboxes.length;
       
   
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
     
                   if(name == "")
                    {
                        $(".alert").html('Please enter event name');
                        $(".alert").show();
                    }
                     else if(categ == "")
                    {
                        $(".alert").html('Please select category');
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
