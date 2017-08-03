<!-- header-starts -->
<div class="sticky-header header-section " style="height: 20%;background:#80ced6;">
    <div class="header-left"> 
        <div class="clearfix"> </div>
    </div>
    <div class="header-right" style="float:right;">
        <div class="profile_details_left"><!--notifications of menu start -->
            <ul class="nofitications">
                <li class="dropdown head-dpdn">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="font-size: 16 px;font-weight: bolder;padding-left: 20px;padding-right: 20px;color: #fff;">Home
                    
                    </a>
                    <ul class="dropdown-menu">
                        
                        <li class="odd"><a href="adminProfile.php" style="font-size: 14px;font-weight: bolder;padding: 10px;">Profile</a></li>
                        <li class="odd"><a href="logoutAdmin.php" style="font-size: 14px;font-weight: bolder;padding: 10px;">Logout</a></li>
                        
                    </ul>
                </li>
                <li class="dropdown head-dpdn">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="font-size: 16px;font-weight: bolder;padding-left: 20px;padding-right: 20px;color: #fff;">Customers
                    
                    </a>
                    <ul class="dropdown-menu">                        
                        <li> <a href="listCustomers.php" style="font-size: 14px;font-weight: bolder;padding: 10px;">View Customers</a></li>
                        <li class="odd"><a href="addCustomer.php" style="font-size: 14px;font-weight: bolder;padding: 10px;">Add Customers</a></li>
                                             
                    </ul>
                </li>
                <?php
        $strSQL = "SELECT count(id) as depositcount from transactions where admin_approve='Not Notified' and deposit_withdraw_transfer='Deposit'";
        $rs = mysql_query($strSQL);
        $row = mysql_fetch_array($rs);
    ?>
                <li class="dropdown head-dpdn">
                    <a href="listDepositsAdmin.php" class="active" style="font-size: 16px;font-weight: bolder;padding-left: 20px;padding-right: 20px;color: #fff;">Deposit Notification (<?php echo $row['depositcount'] ?>)</a>
                   
                </li>
                 <?php
        $strSQL = "SELECT count(id) as checkcount from chequebooks where admin_response='Not Approved'";
        $rs = mysql_query($strSQL);
        $row = mysql_fetch_array($rs);
    ?>
                 <li class="dropdown head-dpdn">
                    <a href="chequeBooksAdmin.php" class="active" style="font-size: 16px;font-weight: bolder;padding-left: 20px;padding-right: 20px;color: #fff;">Check Book Requests (<?php echo $row['checkcount'] ?>)</a>
                   
                </li>
                 <?php
        $strSQL = "SELECT count(id) as creditcount from creditcards where admin_response='Not Approved'";
        $rs = mysql_query($strSQL);
        $row = mysql_fetch_array($rs);
    ?>
                 <li class="dropdown head-dpdn">
                    <a href="creditCardAdmin.php" class="active" style="font-size: 16px;font-weight: bolder;padding-left: 20px;padding-right: 20px;color: #fff;">Credit Card Requests (<?php echo $row['creditcount']  ?>)</a>
                   
                </li>
                
                <li class="dropdown head-dpdn">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="font-size: 16px;font-weight: bolder;padding-left: 20px;padding-right: 20px;color: #fff;">Statements
                    
                    </a>
                    <ul class="dropdown-menu">                        
                        <li> <a href="statementsDepositAdmin.php" style="font-size: 14px;font-weight: bolder;padding: 10px;">Customers Deposit</a></li>
                        <li class="odd"><a href="statementsWithdrawAdmin.php" style="font-size: 14px;font-weight: bolder;padding: 10px;">Customers WithDraw</a></li>
                        <li class="odd"><a href="statementsTransactionsAdmin.php" style="font-size: 14px;font-weight: bolder;padding: 10px;">Customers All Transactions</a></li>    
                        <li class="odd"><a href="statementsTransfersAdmin.php" style="font-size: 14px;font-weight: bolder;padding: 10px;">Customers Transfers</a></li> 
                    </ul>
                </li>
                
              <li class="dropdown head-dpdn">
                    <a href="contactQueries.php" class="active" style="font-size: 16px;font-weight: bolder;padding-left: 20px;padding-right: 20px;color: #fff;">Messages</a>
                   
                </li>
                <li class="dropdown head-dpdn">
                    <a href="changePassword.php" class="active" style="font-size: 16px;font-weight: bolder;padding-left: 20px;padding-right: 20px;color: #fff;">Change Password</a>
                   
                </li>
            </ul>
            <div class="clearfix"> </div>
        </div>
        <!--notification menu end -->
        
        				
    </div>
    <div class="clearfix"> </div>	
</div>
<!-- //header-ends -->