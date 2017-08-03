<ul class="nav" id="side-menu">

    <li>
        <a href="contactQueries.php" >Messages</a>
    </li>
    <li>
        <a href="changePassword.php" > Change Password</a>
    </li>
    <li><a href="#">Manage Customers <span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">
            <li>
                <a href="listCustomers.php">View Customers</a>
            </li>
            <li>
                <a href="addCustomer.php">Add New Customer</a>
            </li>
        </ul>
        <!-- /nav-second-level -->
    </li>
     <?php
        $strSQL = "SELECT count(id) as depositcount from transactions where admin_approve='Not Approved' and deposit_withdraw_transfer='Deposit'";
        $rs = mysql_query($strSQL);
        $row = mysql_fetch_array($rs);
    ?>
 <li class="">
     <a href="listDepositsAdmin.php" >Deposit Notification<span class="nav-badge"><?php echo $row['depositcount'] ?></span></a>
    </li>
    <?php
        $strSQL = "SELECT count(id) as checkcount from chequebooks where admin_response='Not Approved'";
        $rs = mysql_query($strSQL);
        $row = mysql_fetch_array($rs);
    ?>
    <li class="">
        <a href="chequeBooksAdmin.php" >Check Book Requests  <span class="nav-badge"><?php echo $row['checkcount'] ?></span></a>
    </li>
    <?php
        $strSQL = "SELECT count(id) as creditcount from creditcards where admin_response='Not Approved'";
        $rs = mysql_query($strSQL);
        $row = mysql_fetch_array($rs);
    ?>
 <li class="">
     <a href="creditCardAdmin.php" >Credit Card Requests <span class="nav-badge"><?php echo $row['creditcount'] ?></span></a>
    </li>
    <li><a href="#">Statements<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">
            <li>
                <a href="statementsDepositAdmin.php">Customers Deposit Statements</a>
            </li>
            <li>
                <a href="statementsWithdrawAdmin.php"> Customers WithDraw Statements</a>
            </li> 
            <li>
                <a href="statementsTransactionsAdmin.php"> Customers All Transactions</a>
            </li>
            <li>
                <a href="statementsTransfersAdmin.php">Customers Transfers</a>
            </li> 
        </ul>
    </li>
</ul>