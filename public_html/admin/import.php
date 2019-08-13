<!DOCTYPE html>
<?php

session_start();
 
date_default_timezone_set("Asia/Manila");

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
     <link href="css/morris.css" rel="stylesheet">
     <script src="js/loader.js"></script>

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
                    <h1 class="page-header">Sales</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	

 
                <div class="col-lg-12">

                    <div class="panel panel-default">

                        <div class="panel-heading">
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal" style=""><i class="fa fa-upload"></i> <a style="color:white;"> Import CSV File </a></button>

                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
		
		<select name="" id="year" class="form-control" style="width:200px;">
			<option value="<?php if(isset($_GET['year'])){ echo $_GET['year']; } ?>"><?php if(isset($_GET['year'])){ echo $_GET['year']; } else { echo "--Select year--"; } ?></option>
			
<?php
	// Set timezone
	date_default_timezone_set('UTC');

	// Start date
	$date =  date ("Y-m-d", strtotime("-5 year"));
	$arr =array();
	// End date
	$end_date = date('Y-m-d');

	while (strtotime($date) <= strtotime($end_date)) {
               
                $date = date ("Y-m-d", strtotime("+1 year", strtotime($date)));
                 echo "$date\n";

                 array_push($arr, $date);

             }


	?>


		<?php 
			$count = count($arr) - 1;
			for($y=$count;$y >= 0;$y--)
			{



		?>

	<option value="<?php echo date ("Y", strtotime("-1 year", strtotime($arr[$y]))); ?>"><?php echo date ("Y", strtotime("-1 year", strtotime($arr[$y]))); ?></option>

		



	<?php } ?>
		</select>
                          
			<?php  
 $year;

 if(isset($_GET['year']))
 {
 	$year = date($_GET['year']);

 }
 else
 {
 	 $year = date('Y');
 }

 

 $query = "SELECT COUNT(*) AS totalClient,sum(price) AS totalPrice, dateReserved FROM sales WHERE  YEAR(dateReserved) = '$year'  GROUP BY MONTH(dateReserved) ORDER BY dateReserved ASC";  
 $result = $connection->query($query);  

 if($result->num_rows > 0)
 {
 ?>  
  <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Month','Total Client', 'Total Sales'],  
                          <?php  
                          while($row =$result->fetch_assoc())  
                          {   
                             $dateReserved = date('M',strtotime($row['dateReserved']));
                               echo "['".$dateReserved."', ".$row["totalClient"].", ".$row["totalPrice"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: '',  
                     curveType: 'function',
          				legend: { position: 'bottom' }
                     };  
                var chart = new google.visualization.LineChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
      
    <?php   } 

else
{
	echo "<h3>No data found </h3>";
}

    ?>


           <div style="width:100%;">  
			
			<?php
 if($result->num_rows > 0)
 {
			 ?>
                <h3 align="center">Total Sales in <?php echo $year; ?></h3>  
               
<?php } ?>
              <center><div id="piechart" style="width:100%; height: 600px;padding-bottom:150px;"></div>  </center>  
           </div>  
      </body>  
 </html>  





 
<?php

if (session_status() == PHP_SESSION_NONE) {

} 


if(isset($_POST["Import"])){
  
 
    $filename=$_FILES["file"]["tmp_name"];
    $array_check = array();
 
     if($_FILES["file"]["size"] > 0)
     {
 
        $file = fopen($filename, "r");
           while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
           {



            if(($emapData[1] === "Price") || ($emapData[1] === "price") ||($emapData[1] === "") )
                {
                  // DO NOTHING
                }
                else
                {


                  $dateFormat = date('Y-m-d', strtotime($emapData[0]));

             $sql = "INSERT INTO sales 
             (`dateReserved`,
              `price`
                 ) 

                values(
                  '$dateFormat',
                  '$emapData[1]') ";
          
            $result = $connection->query($sql);
              if(! $result )
              {
               
               $_SESSION['failed'] = 'Failed to upload you file';

                  
       
              }

              else
              {
                  $_SESSION['success'] = 'Files successfully uploaded';
              }

            

               echo "<script type=\"text/javascript\">
                   
                   window.location = 'sales';
                  
                  </script>";
        
          }
        }
}



fclose($file);
    mysqli_close($conn); 


}








?>









                               
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
    <script src="js/raphael.min.js"></script>
    <script src="js/morris.min.js"></script>
   
    
    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>
   

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>


    </script>

</body>

</html>
