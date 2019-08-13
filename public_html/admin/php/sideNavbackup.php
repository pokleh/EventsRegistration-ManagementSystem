 <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="verifiedreservation"><i class="fa fa-user fa-fw"></i> Verified Reservation</a>
                        </li>
                       
                        <li>
                            <a href="pendingreservation"><i class="fa fa-user fa-fw"></i> Pending Reservation</a>
                        </li>

                        <li>
                            <a href="contract"><i class="fa fa-file fa-fw"></i> Contracts</a>
                        </li>
                         
                        <li>
                            <a href="canceledreservation"><i class="fa fa-trash-o fa-fw"></i> Canceled Reservation</a>
                        </li>
						
						<li>
                            <a href="usersaccount"><i class="fa fa-users fa-fw"></i> Users Account</a>
                        </li>


                       
                        <li>
                            <a href="sales"><i class="fa fa-files-o fa-fw"></i> Sales </a>
                        </li>
                        
                         
                         <li>
                            <a href="administrators"><i class="fa fa-users fa-fw"></i> Admins</a>
                        </li>
                            
                        
                            <li>
                            <a href="events"><i class="fa fa-list-alt fa-fw"></i> List of Events</a>
                             </li>
                                
                                <li>
                            <a href="completedevents"><i class="fa fa-picture-o fa-fw"></i> Completed Events</a>
                            
                             </li>


                         <li>
                            <?php 
                                $row = $connection->query("SELECT count(*) as TotalCount FROM messages WHERE status = 'unread'")->fetch_assoc();;
                             ?>
                            <a href="messages"><i class="fa fa-envelope-o fa-fw"></i> Messages <span style="font-weight:bold;color:red;"><?php echo $row['TotalCount']; ?></span></a>
                        </li>
                               
                                 <li>
                            <a href="testimonials"><i class="fa fa-wechat fa-fw"></i> Testimonials</a>
                            
                             </li>

                              <li>
                            <a href="themes"><i class="fa fa-wechat fa-fw"></i> Themes</a>
                            
                             </li>

                             <li>
                            <a href="menu"><i class="fa fa-wechat fa-fw"></i> Menu</a>
                            
                             </li>




                    </ul>
                </div>