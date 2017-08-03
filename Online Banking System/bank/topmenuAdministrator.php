 <!-- header-starts -->
            <div class="sticky-header header-section ">
                <div class="header-left">
                    <!--toggle button start-->
                    <button id="showLeftPush"><i class="fa fa-bars"></i></button>
                    <!--toggle button end-->
                    <!--logo -->
                    <div class="logo">
                        <a href="contactQueries.php">
                            <h1>Internet Banking System</h1>
                            <span>AdminPanel</span>
                        </a>
                    </div>
                    <!--//logo-->
                    
                    <div class="clearfix"> </div>
                </div>
                <div class="header-right">
                    
                    <!--notification menu end -->
                    <div class="profile_details">		
                        <ul>
                            <li class="dropdown profile_details_drop">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <div class="profile_img">	
                                        <span class="prfil-img"><img src="images/user1.png" alt=""> </span> 
                                        <div class="user-name">
                                            <p><?php echo $_SESSION['administratorName']; ?></p>
                                            <span>Administrator</span>
                                        </div>
                                        <i class="fa fa-angle-down lnr"></i>
                                        <i class="fa fa-angle-up lnr"></i>
                                        <div class="clearfix"></div>	
                                    </div>	
                                </a>
                                <ul class="dropdown-menu drp-mnu">
                                    <li> <a href="adminProfile.php"><i class="fa fa-cog"></i> Profile</a> </li>
                                    <li> <a href="logoutAdmin.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>				
                </div>
                <div class="clearfix"> </div>	
            </div>
            <!-- //header-ends -->