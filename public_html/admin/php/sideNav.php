
<?php 

$countPending = $connection->query("SELECT count(id) as TotalCountPending FROM reservedcustomer WHERE status ='pending'")->fetch_assoc();
$countReceipt = $connection->query("SELECT count(id) as TotalCountReceipt FROM uploadedpayment WHERE status =''")->fetch_assoc();

?>

 <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            
                            <!-- /input-group -->
                        </li>
 

 							<li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Reservations <span style="font-weight:bold;color:red;"><?php echo $countPending['TotalCountPending'] + $countReceipt['TotalCountReceipt']; ?> <small> new </small></span><span class="fa arrow"></span></a>
                           
                            <ul class="nav nav-second-level">
                             
                             <li><a href="verifiedreservation">Verified Reservation</a></li>
                             <li><a href="pendingreservation">Pending Reservation <span style="font-weight:bold;color:red;"><?php echo $countPending['TotalCountPending']; ?> <small>new </small></span></a></li>
                             <li><a href="canceledreservation">Canceled Reservation  </a></li>
                              <li><a href="paymentreceipt">Payment Receipt <span style="font-weight:bold;color:red;"><?php echo $countReceipt['TotalCountReceipt']; ?> <small>new </small></span></a></li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>




							<li>
                            <a href="#"><i class="fa fa-list-alt fa-fw"></i> Events<span class="fa arrow"></span></a>
                           
                            <ul class="nav nav-second-level">
                             <li><a href="events">List of Events</a> </li>
                              <li><a href="completedevents">Completed Events</a></li> 
                               <li> <a href="themes">Themes</a></li>
                                   <li>  <a href="menu">Menu</a> </li>

                            
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>





							<li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Accounts<span class="fa arrow"></span></a>
                           
                            <ul class="nav nav-second-level">
                             <li><a href="administrators">Admins</a></li>
                             	<li> <a href="usersaccount">Users Account</a> </li>

                            
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>




                        
                       

                        <li>
                            <a href="contract"><i class="fa fa-file fa-fw"></i> Contracts</a>
                        </li>
                         
                       
						
					


                       
                        <li>
                            <a href="sales"><i class="fa fa-files-o fa-fw"></i> Sales </a>
                        </li>
                        
                         
                        
                            
                        
                            
                               


                         <li>
                            <?php 
                                $row = $connection->query("SELECT count(*) as TotalCount FROM messages WHERE status = 'unread'")->fetch_assoc();;
                             ?>
                            <a href="messages"><i class="fa fa-envelope-o fa-fw"></i> Messages <span style="font-weight:bold;color:red;"><?php echo $row['TotalCount']; ?></span></a>
                        </li>

                         <li>
                            <?php 
                                $row2 = $connection->query("SELECT count(*) as TotalCount FROM clientmessage WHERE status = 'unseen' AND deleteStatusAdmin = ''")->fetch_assoc();;
                             ?>
                            <a href="customermessage"><i class="fa fa-envelope fa-fw"></i> Customers Messages <span style="font-weight:bold;color:red;"><?php echo $row2['TotalCount']; ?></span></a>
                        </li>
                               
                                 <li>
                            <a href="testimonials"><i class="fa fa-wechat fa-fw"></i> Testimonials</a>
                            
                             </li>

                            

                         



                    </ul>
                </div>