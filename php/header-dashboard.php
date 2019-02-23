
 <style>
.header_area .navbar .nav .nav-item.submenu ul .nav-item:hover .nav-link {
  background: #fbbdba;
  color: #fff;
}
  
 </style>
 <header class="header_area">
            <div class="main_menu">
            	<nav class="navbar navbar-expand-lg navbar-light" style="border-bottom:1px solid #cccccc;">
					<div class="container box_1620">
						<!-- Brand and toggle get grouped for better mobile display --><img src="img/gallery/fav-logo.png" alt="" style="width:200px;">
					<a class="navbar-brand logo_h" href="index"></a>
						
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- Collect the nav links, forms, and other content for toggling --> 
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav ml-auto">
								<li class="nav-item"><a class="nav-link" href="fabeventsdashboard" style="color:#4285f4;cursor:pointer;" ><p><i class="fa fa-home" style="font-size:15px;"></i> &nbsp; Home</p></a></li>
								
								<li class="nav-item"><a class="nav-link" href="myevents" style="color:#4285f4;cursor:pointer;" ><p><i class="fa fa-calendar" style="font-size:15px;"></i> My Reservation <b style="color:red;font-size:15px;"><?php $select = "SELECT count(cusID) as totalCount FROM reservedcustomer WHERE cusID = '$userID' and status = 'verified'";
$result = $connection->query($select);
$row = $result->fetch_assoc();
$totalCount = $row['totalCount'];
echo $totalCount; ?></b></p></a></li>								
								<li class="nav-item"><a class="nav-link" href="myevents" style="color:#4285f4;cursor:pointer;" ><p><i class="fa fa-calendar" style="font-size:15px;"></i> My Events <b style="color:red;font-size:15px;"><?php $select1 = "SELECT count(cusID) as totalCount FROM reservedcustomer WHERE cusID = '$userID' and status = 'verified'";
$result1 = $connection->query($select1);
$row1 = $result1->fetch_assoc();
$totalCount1 = $row1['totalCount'];
echo $totalCount1; ?></b></p></a></li>

<li class="nav-item"><a class="nav-link" href="messages" style="color:#4285f4;cursor:pointer;" ><p><i class="fa fa-envelope" style="font-size:15px;"></i> Messages <b style="color:red;font-size:15px;"><?php $select3 = "SELECT count(id) as totalCount FROM clientmessage WHERE statusClient = 'unseen' AND userID ='$userID' AND deleteStatus='' ";
$result3 = $connection->query($select3);
$row3 = $result3->fetch_assoc();
$totalCount3 = $row3['totalCount'];
echo $totalCount3; ?></b></p></a></li>
								 
								<li class="nav-item submenu dropdown" > 
									<a href="#" style="color:#4285f4;cursor:pointer;" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" style="font-size:15px;"></i> <?php echo ucwords($fullName) ?></a>
									<ul class="dropdown-menu" style="background-color:whitesmoke;">
										<li class="nav-item"><a class="nav-link" href="myaccount"><i class="fa fa-wrench"></i> My account</a>
										<li class="nav-item"><a href="logout.php" class="nav-link" href="portfolio-details.html"><i class="fa fa-power-off"></i> Log out</a>
										
									</ul>
								</li> 

								
								</ul>

						</div> 
					</div>
            	</nav>
            </div>

        </header>