<link href="css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="css/dataTables.responsive.css" rel="stylesheet">

<?php
 include('connection.php');
 $category = $_POST['category'];

?>
 <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">


<thead>
                <tr>			
                	 		 <th>Category</th>
                               <th>Theme</th>	
                               <?php if ($category=="birthday") { echo "<th>Sex</th>"; }?>
                              
                                <th>Action</th>
                             
                             
                             
                            </tr>

      </thead>    

 <?php

$select1 = "SELECT * FROM theme WHERE category = '$category' ORDER BY theme ASC";
                                $result1 = $connection->query($select1);
                                if($result1->num_rows > 0)
                                {
                                while($row1 = $result1->fetch_assoc())
                                {

                             ?>
                                
							<tr>
								<td><?php echo ucwords($row1['category']) ?></td>
								<td><?php echo ucwords($row1['theme']) ?></td>
								 <?php if ($category=="birthday") {  echo "<td>" . ucwords($row1['sex']) . "</td>" ; }?>
								<td style="text-align:center;">
									<a href="edittheme?id=<?php echo $row1['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
									<a id="<?php echo $row1['id'] ?>" style="cursor:pointer;" class="btn btn-danger btn-sm delete">Delete</a>

								</td>
							</tr>
                                   
                             <?php }
                                }
                                
                              ?>









                  
</table>

<script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/dataTables.responsive.js"></script>