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
                    <h1 class="page-header">Contract</h1>
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
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">


<thead>
                <tr>
                               <th>Name</th>
                                <th>Event reserved</th>
                                <th>Reserved date</th>
                                
                              
                         
                        
                                <th>Action</th>
                             
                             
                            </tr>
      </thead>   
                            
                            <?php
$select = "SELECT user_account.userID,user_account.fullName, events.eventTitle,events.eventInfo,events.eventPrice,events.img,reservedcustomer.id, reservedcustomer.dateReserved,reservedcustomer.packs,reservedcustomer.paymentMethod,reservedcustomer.theme,reservedcustomer.paymentStatus,reservedcustomer.status,reservedcustomer.paymentMethod FROM reservedcustomer 
INNER JOIN events ON reservedcustomer.eventID = events.id
INNER JOIN user_account ON reservedcustomer.cusID = user_account.userID
WHERE  reservedcustomer.status = 'verified'

";
                                $result = $connection->query($select);
                                if($result->num_rows > 0)
                                {
                                while($row = $result->fetch_assoc())
                                {
                                    $userID = $row['userID'];
                                    $balance = $connection->query("SELECT * FROM paymenthistory WHERE userID = '$userID' ORDER BY dateUpdated DESC LIMIT 1")->fetch_assoc();
 
                             ?>
                                    <tr id="table_<?php echo $row['id'] ?>">
                                          <td><?php echo ucwords($row['fullName']) ?></td>
                                    <td><?php echo ucwords($row['eventTitle']) ?></td>
                                    <td><?php echo $row['dateReserved'] ?></td>
                                  
                                   
                                     <td>
                                        <a id="<?php echo $row['id']; ?>"class="btn btn-danger archive btn-sm print"> Print </a>
                                        <a id="<?php echo $row['id']; ?>" style="cursor:pointer;color:white;" class="btn btn-info  btn-sm view-contract">View </a>
                                     </td>
                                      
                                     
                                </tr>
                             <?php }
                                }
                                else {
                                    echo "<br><h4> No reservation </h4>";
                                }
                              ?>
                            


</table>
<div id="ajax_catcher"></div>

<div id="printTable" hidden></div>
  <button type="button"  style="display:none;" class="btn btn-info btn-sm prirint" onclick="printContent('printTable')"><i class="fa fa-print"></i> Print Contract</button>
                               
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
    $(".view-contract").click(function(){
        
    
        var id = $(this).attr('id');

    
    
        
    $.ajax({

            type:'POST',
            url:'viewContract.php',
            data:{id:id},
            success:function(data)
            {
                $("#ajax_catcher").html(data);
                
            }

        });

    


   });

 });


$(document).ready(function(){
    $(".print").click(function(){
        
    
        var id = $(this).attr('id');

    
    
        
    $.ajax({

            type:'POST',
            url:'printContract.php',
            data:{id:id},
            success:function(data)
            {
                $("#printTable").html(data);
                $(".print").click();

                
            }

        });

    


   });

 });






  function printContent(id){
str=document.getElementById(id).innerHTML
newwin=window.open('','printwin','left=100,top=100,width=1000,height=500');
newwin.document.write('<HTML>\n<HEAD>\n');
newwin.document.write('<center><img src="../img/gallery/fav-logo.png" width="50%;"/>\n</center>\n') ;
newwin.document.write('<br>\n');
newwin.document.write('<script>\n');
newwin.document.write('function chkstate(){\n');
newwin.document.write('if(document.readyState=="complete"){\n');
newwin.document.write('window.close()\n');
newwin.document.write('}\n');
newwin.document.write('else{\n');
newwin.document.write('setTimeout("chkstate()",2000)\n');
newwin.document.write('}\n');
newwin.document.write('}\n');
newwin.document.write('function print_win(){\n');
newwin.document.write('window.print();\n');
newwin.document.write('chkstate();\n');
newwin.document.write('}\n');
newwin.document.write('<\/script>\n');
newwin.document.write('</HEAD>\n');
newwin.document.write('<BODY onload="print_win()">\n');
newwin.document.write(str);
newwin.document.write('</BODY>\n');
newwin.document.write('</HTML>\n');
newwin.document.close();
}




    </script>

</body>

</html>
