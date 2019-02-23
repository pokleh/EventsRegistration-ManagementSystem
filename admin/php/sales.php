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
                               echo "['".$row["month"]."', ".$row["totalClient"].", ".$row["totalPrice"]."],";  
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