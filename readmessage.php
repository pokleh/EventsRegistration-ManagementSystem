<!doctype html>
<?php include('php/session_user.php'); 



if($connection->query("UPDATE "))


?>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/favicon.png" type="image/png">
        <title>FAB EVENTS</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="vendors/linericon/style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="vendors/animate-css/animate.css">
        <!-- main css -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <script src="admin/js/tinymce/tinymce.min.js" type="text/javascript"></script>
         <script type="text/javascript"> 
      tinymce.init({
        selector: "textarea",
        statusbar: false,
        height : '200px',
    

        
        auto_focus: "main_editor",
        relative_urls : true,
        entity_encoding: 'raw',
        menubar: false
       });
      </script>

<style>
  b{
    color: black;
  }
</style>
    </head>
    <body>
        
        <!--================Header Menu Area =================-->
 <?php include('php/header-dashboard.php') ?>
        <!--================Header Menu Area =================-->
        
        <!--================Home Banner Area =================-->
        
        <!--================End Home Banner Area =================-->
        
        <!--================About Area =================-->
        <section class="about_area">
          <div class="container">
            <div class="row about_inner">
              
              <div class="col-lg-12">
                <br>       <div id="ajax_cathcher"></div>
                        <div class="header" style="width:100%;height:50px;background-color:#fafafa;">
                            <button class="btn btn-primary btn-sm composed" style="margin-top:10px;margin-left:10px;"><span class="fa fa-plus"></span> Compose</button>

                           <a href="messages" class="btn btn-primary btn-sm" style="margin-top:10px;margin-left:10px;">Inbox </a>
                             <a href="sentmessages" class="btn btn-primary btn-sm" style="margin-top:10px;margin-left:10px;">Sent </a>

                               <a id="deleteItemsDel" class="btn btn-danger btn-sm" style="margin-top:10px;margin-right:10px;float:right;cursor:pointer;color:white;"> <span class="fa fa-trash"></span> Delete </a>
                                
                                 
                        </div>







<div id="composed" style="width:50%;height:440px;background-color:#eeeeee;position:absolute;margin-left:8%;margin-top:20px;display:none;border-radius:5%;">
    <div class="container">
        <br>
    <b style="color:black;">Subject:</b>
    <input type="text" id="subject" class="form-control" style="">
    <br>
    <textarea name="textarea" id="message"></textarea>
    <br>
    <button class="btn btn-info btn-sm" id="send" style="float:right;margin-right:10px;">Send</button>
    </div>
</div>


























                        <div class="message-container" style="width:100%; height:450px;overflow:auto;">
                          <br>
                          
                            <?php

$messageID = mysqli_escape_string($connection,$_GET['id']);
if($connection->query("UPDATE reply SET status = 'seen' WHERE messageID = '$messageID'")){}


     $clientmessage = $connection->query("SELECT * FROM clientmessage WHERE id ='$messageID' AND deleteStatus =''")->fetch_assoc();

?>
 <b>Subject: <?php echo ucwords($clientmessage['subject']); ?></b><br>
 <span><b>Message:</b> <?php echo ucfirst($clientmessage['message']) ?></span> <br> <br>
<?php 

   $select = $connection->query("SELECT * FROM reply WHERE messageID = '$messageID' AND statusDelete='' ORDER BY dateSent DESC");
                        while($row = $select->fetch_assoc())
                            { 
                

                              ?>

                              
                

                 <?php if($row['class'] == "admin"){

 echo "<b>Fab Events:</b>" . ucfirst($row['repply']) . "<small>" . date('M-d-Y g:i a',strtotime($row['dateSent'])). "</small><hr>";

                } 

                else
                {
                 echo "<b>You:</b>" . ucfirst($row['repply']) . "<small>" . date('M-d-Y g:i a',strtotime($row['dateSent'])). "</small><hr>";
                }



                ?>



                            <?php } ?>

                        
                        </div>




<div id="replyContainer">
    <b>Repply:</b>
    <textarea name="textarea" id="message"></textarea>
    <br><br>
    <button class="btn btn-info btn-sm" style="float:right;" id="sent">Send</button>
</div>










                    
            </div>
          </div>
        </section>
        <!--================End About Area =================-->
        




 


       <br>
       <br>
       <br>
       <br>
     
       
       <div id="ajax_catcher"></div>
     
      
        <!--================ start footer Area  =================-->  
                    <?php include('php/footer.php'); ?>
    <!--================ End footer Area  =================-->
        
 
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/stellar.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope-min.js"></script>
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendors/counter-up/jquery.counterup.js"></script>
        <script src="js/mail-script.js"></script>
        <script src="js/theme.js"></script>


<?php

$id = $_GET['id'];


if($connection->query("UPDATE clientmessage SET statusClient ='seen' WHERE id = '$id'"))
{}

 ?>

<script>
   

    $(document).ready(function(){
        $(".composed").click(function(){
            $("#composed").toggle({

            });

          

    });
            });
 


    $(document).ready(function() {

$("#sent").click(function(){

var id = <?php echo $id ?>;
var message = tinyMCE.get('message').getContent();
var userID = <?php echo $userID ?>;

    if(message == "")
    {
        alert('Please write your repply');
    }

    else
    {



    $.ajax({

        type:'post',
        url:'php/sendRepplyClient.php',
        data:{id:id,message:message,userID:userID },
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