	<?php 
include('reservationCount.php');
include('myReserveCount.php');
 ?>
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
						<!-- Brand and toggle get grouped for better mobile display -->
						<a class="navbar-brand logo_h" href="../fabeventsdashboard">FAB EVENTS</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav ml-auto">
								<li class="nav-item"><a class="nav-link" href="../fabeventsdashboard" style="color:#4285f4;cursor:pointer;" ><p><i class="fa fa-home" style="font-size:15px;"></i> &nbsp; Home</p></a></li>
								
								<li class="nav-item"><a class="nav-link" href="../myreservation"  style="color:#4285f4;cursor:pointer;" ><p><i class="fa fa-shopping-cart" style="font-size:15px;"></i>&nbsp; My reservation <?php if($result->num_rows > 0){ ?><b style="color:red;font-size:15px;"><?php echo $totalCount; ?></b> <?php } ?></p></a></li>
								
								<li class="nav-item"><a class="nav-link" href="../myevents" style="color:#4285f4;cursor:pointer;" ><p><i class="fa fa-calendar" style="font-size:15px;"></i> My Events <?php if($result->num_rows > 0){ ?><b style="color:red;font-size:15px;"><?php echo $totalCount1; ?></b> <?php } ?></p></a></li>
								
								<li class="nav-item submenu dropdown" > 
									<a href="#" style="color:#4285f4;cursor:pointer;" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" style="font-size:15px;"></i> <?php echo ucwords($fullName) ?></a>
									<ul class="dropdown-menu" style="background-color:whitesmoke;">
										<li class="nav-item"><a class="nav-link" href="../myaccount"><i class="fa fa-wrench"></i> My account</a>
										<li class="nav-item"><a href="../logout.php" class="nav-link"><i class="fa fa-power-off"></i> Log out</a>
										
									</ul>
								</li> 

								
								</ul>

						</div> 
					</div>
            	</nav>
            </div>

        </header>