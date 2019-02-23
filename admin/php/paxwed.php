<?php

include('connection.php');


$pax = $_POST['pax'];
$year  = $_POST['year'];


                 
if($pax == "all")
 {
 	$query = "SELECT COUNT(*) AS totalClient,sum(price) AS totalPrice, dateReserved, eventCategory FROM sales WHERE  YEAR(dateReserved) = '$year' AND eventCategory = 'wedding'  GROUP BY MONTH(dateReserved) ORDER BY dateReserved ASC";  
 
 }
 else
 {
 	$query = "SELECT COUNT(*) AS totalClient,sum(price) AS totalPrice, dateReserved, eventCategory FROM sales WHERE  YEAR(dateReserved) = '$year' AND pax = '$pax' AND eventCategory = 'wedding'  GROUP BY MONTH(dateReserved) ORDER BY dateReserved ASC";  
 
 }
 

 $result = $connection->query($query);  

 if($result->num_rows > 0)
 {
 ?>  
  <script type="text/javascript">  
           google.charts.load('current', {'packages':['bar']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Month','Total Client'],  
                          <?php  
                          while($row =$result->fetch_assoc())  
                          {   
                             $dateReserved = date('M',strtotime($row['dateReserved']));
                               echo "['".$dateReserved."', ".$row["totalClient"]." ],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: '',  
                     curveType: 'function',
                  legend: { position: 'bottom' },
                 
                   bars: 'horizontal'
                  
                     };  
            var chart = new google.charts.Bar(document.getElementById('piechart4'));
      chart.draw(data, options);
           }  
           </script>  
      
    <?php   } 

else
{
  echo "<h3>No data found </h3>";
}

    ?>





