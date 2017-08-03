<?php
session_start();
include_once 'mysql.php';
include_once 'adminstratorHeader.php';
?>
<div class="main-content" style="margin-top: 5%;margin-left: 10%;">
    <!--left-fixed -navigation-->
     <?php include './customerMenu.php'; ?>
    <!--left-fixed -navigation-->
    <?php // include 'topmenuAdministrator.php'; ?>
    <!-- main content start-->

    <div id="page-wrapper" style="background: #fff;">
        <div class="main-page">


            <?php
            $strSQL = "SELECT sum(amount) as deposit_amount from transactions where ((deposit_withdraw_transfer='Deposit' and custmer_id='" . $_SESSION['customerId'] . "') or (deposit_withdraw_transfer='Transfer' and to_cust_id='" . $_SESSION['customerId'] . "'))";
            $rs = mysql_query($strSQL);
            $row = mysql_fetch_array($rs);

            $strSQL1 = "SELECT sum(amount) as withdraw_amount from transactions where  ((deposit_withdraw_transfer='WithDraw'  and custmer_id='" . $_SESSION['customerId'] . "') or (deposit_withdraw_transfer='Transfer' and from_cust_id='" . $_SESSION['customerId'] . "') or (deposit_withdraw_transfer='Deposit' and from_cust_id='" . $_SESSION['customerId'] . "'))";
            $rs1 = mysql_query($strSQL1);
            $row1 = mysql_fetch_array($rs1);
            $balance = $row['deposit_amount'] - $row1['withdraw_amount'];
            
            $strSQL3 = "SELECT * from customers where id='" . $_SESSION['customerId'] . "'";
            $rs3 = mysql_query($strSQL3);
            $row3 = mysql_fetch_array($rs3);
            
            ?>
            <div class="row-one">
                <div class="col-md-4 widget">
                    <div class="stats-left ">
                        <h5>Balance</h5>  
                        <h4><?php echo "$ ".$balance; ?></h4>
                    </div>                    
                    <div class="clearfix"> </div>	
                </div>
                <div class="col-md-4 widget states-mdl">
                    <div class="stats-left">
                        <h5>Account Number</h5>
                        <h4><?php echo $row3['account_num'] ?></h4>
                    </div>                    
                    <div class="clearfix"> </div>	
                </div>
                
                <div class="clearfix"> </div>	
            </div>

        </div>
    </div>
</div>
<!--footer-->

<!--//footer-->
</div>
<!-- Classie -->
<?php include_once 'adminstratorFooter.php'; ?>