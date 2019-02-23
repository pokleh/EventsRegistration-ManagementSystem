<!doctype html>
<?php include('php/session_user.php'); 

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
                                
                                  <a id="selectAllDel"  class="btn btn-success btn-sm" style="margin-top:10px;margin-right:10px;float:right;cursor:pointer;color:white;"> <span class="fa fa-check"></span> Select all </a>
                        </div>



                        <div class="message-container" style="position:absolute;width:100%;">
                          <br>
                           <table class="table">
                            <tr>
                              <th> <div class="fa fa-check"></div></th>
                              <th>Subject</th>
                              <th>Message</th>
                              <th>Date Sent</th>
                            </tr>
                            <?php

                     $select = $connection->query("SELECT * FROM clientmessage WHERE userID = '$userID' AND deleteStatus=''");
                        while($row = $select->fetch_assoc())
                            { ?>
                                <tr style="cursor:pointer;" class="read" id="<?php echo $row['id'] ?>">
                                  <td style="width:80px;"><input type="checkbox" id="checkboxes" class="checkboxes" value="<?php echo $row['id']; ?>"></td>
                                  <td> <?php echo ucwords($row['subject']) ?> </td>
                                  <td><?php echo ucwords(substr($row['message'], 0,100)) ?> </td>
                                  <td><?php echo date('M-d-Y',strtotime($row['dateSent'])) . " " . date('g:i a',strtotime($row['dateSent'])) ?> </td>
                                </tr>

                            <?php } ?>

                            </table>
                        </div>
                    
        		</div>
        	</div>
        </section>
        <!--================End About Area =================-->
        


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



 


       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
          <br>
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
        <br>
       <br>
     
      
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




<script>
   





$( document ).ready( function(){


$(document).ready(function(){

$("#deleteItemsDel").click(function(){

   if(confirm("Are you sure you want to delete these messages?"))  
           {  
                var id = [];  
                $('.checkboxes:checked').each(function(i){  
                     id[i] = $(this).val();  
                });  
                if(id.length === 0) //tell you if the array is empty  
                {  
                     alert("Please Select item to delete");  
                }   
                else  
                {   
                     $.ajax({  
                          url:'php/delete_sentmes.php',  
                          method:'POST',  
                          data:{id:id},  
                          success:function(e)  
                          {  
                                $(".cont").html(e);
                               for(var i=0; i<id.length; i++)  
                               {  
                                    $('#'+id[i]+'').css('background-color', '#ccc');  
                                    $('#'+id[i]+'').fadeOut('slow');  

                                  
                               }  

                               $("#ajax_cathcher").html(e);
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






    $("#selectAllDel").click(function(){
    var checkboxes = $( '#checkboxes' );

    // Check all checkboxes
    checkboxes.prop( 'checked', true );

    // Check if they are all checked and alert a message
    // or, if not, alert something else.
   checkboxes.filter( ':checked' ).length == checkboxes.length;
       
   
});
    });





$(document).ready(function(){
        $(".read").click(function(){
           
           var id = $(this).attr('id');

           window.location = 'readmessage?id=' + id;

          

    });
            });






    $(document).ready(function(){
        $(".composed").click(function(){
            $("#composed").toggle({

            });

          

    });
            });
 

$(document).ready(function(){
        $("#send").click(function(){
           
          var subject = $("#subject").val();
          var  message = tinyMCE.get('message').getContent();
          var userid = <?php echo $userID ?>;

          if(message == "")
          {
            alert('Please write your message');
          }

          else
          {
                $.ajax({

                    type:'post',
                    url:'php/sendMessage.php',
                    data:{subject:subject,message:message,userid:userid},
                    success:function(x){
                        $("#ajax_cathcher").html(x);
                    }
                });
          }


    });
            });


</script>





    </body>
</html>