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
                    <h1 class="page-header">Add menu</h1>
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

 ?>

 <div class="row">

     <div class="col-md-4">
            <br><br>
            <div class="form-group">


  <div class="form-group">
                <label for="">Menu</label>
                <input type="text" class="form-control" id="menu" value="">
            </div>




                <label for="">Menu Category</label>
                <select name="" id="category" class="form-control">
                    <option value="">--Category--</option>
                    <option value="beef">Beef</option>
                    <option value="chicken">Chicken</option>
                    <option value="pork">Pork</option>
                     <option value="fish">Fish</option>
                    <option value="vegetables">Vegetables</option>
                      <option value="pancit">Pancit</option>
                        <option value="pasta">Pasta</option>
                         <option value="drinks">Drinks</option>
                          <option value="dessert">Dessert</option>

                </select>



            </div>
		
	 

     </div>

      <div class="col-md-6">

        <img src="../img/menu/notfound.png" alt="img" id="blah" style="width:500px;height:300px;">
        <br>
        <br>
        <form action="addmenu" method="post" enctype="multipart/form-data">
            <p>Upload new photo</p>
            <input type="file" name="image" id="img" class="form-control" onchange="readURL(this);" accept=".jpg, .png, .jpeg">
        
            <input type="submit" name="submit" style="display:none;" id="upload">
        </form>


       <?php 


 if(isset($_POST['submit']))
{

  $row = $connection->query("SELECT * FROM  menu ORDER BY menuID DESC LIMIT 1")->fetch_assoc();  
$id = $row['menuID'];
$image=$_FILES['image']['tmp_name'];
$name=$_FILES['image']['name'];

 
$update2=$connection->prepare("UPDATE menu SET img='$name' WHERE menuID= ? ");
$update2->bind_param('i',$id);
if($update2->execute())
{

  move_uploaded_file($image,"../img/menu/".$name);

  $_SESSION['update'] = 'Menu successfully added';
  echo "<script language='javascript'>
  
window.location = 'menu';


</script>
    ";
}
}


        ?>
        
     </div>

 </div>
<br><br><br> 






<div class="row">
    <div class="col-md-12">
        <b>Ingredients:</b> <br>
        <textarea name="" id="ing" style=""></textarea>
   
    </div>
</div>

<br><br>

 
<div class="row">
    <div class="col-md-12">
       
  <div class="alert alert-danger" style="width:40%;display:none;"></div>
    
    
    <button class="btn btn-info" style="float:right;" id="update">Add menu</button>
 
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

     var menu = $("#menu").val();
     var category = $("#category").val();
    var ing = tinyMCE.get('ing').getContent();
    var img = $("#img").val();

     
                    if(menu == "")
                    {
                        $(".alert").html('Please enter menu');
                        $(".alert").show();
                    }
                    else if(category == "" )
                    	   {
                        $(".alert").html('Please select category');
                        $(".alert").show();
                    }
                      else if(img == "" )
                           {
                        $(".alert").html('Please add image of menu');
                        $(".alert").show();
                    }


                 
                    else
                    {

                            if(confirm('Do you really want to add this menu?'))
                                    {

                        $.ajax({

                                type:'post',
                                url:'php/addMenu.php',
                                data:{menu:menu,category:category,ing:ing},
                                success:function(x)
                                {
                                    $("#ajax_catcher").html(x);
                                }

                        });

                    }
                    }




    });

});




$(document).ready(function(){
    $("#delete").click(function(){

        var id = <?php echo $id ?>;

        if(confirm('Do you really want to delete this event?'))
        {
             $.ajax({

                                type:'post',
                                url:'php/deletEvent.php',
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
