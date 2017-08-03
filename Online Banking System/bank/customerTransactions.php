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
            <div class="tables">
                <h3 class="title1">List Transactions</h3> 

                <?php
                if (isset($_GET) && !empty($_GET)) {
                    if (isset($_GET) && !empty($_GET) && $_GET['s'] == 0) {
                        ?>                      
                        <div class="alert alert-danger" id="danger-alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong> <?php echo $_GET['st'] ?> </strong>
                        </div>                      
                    <?php } ?>

                    <?php
                    if (isset($_GET) && !empty($_GET) && $_GET['s'] == 1) {
                        ?>

                        <div class="alert alert-success" id="danger-alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong> <?php echo $_GET['st'] ?> </strong>
                        </div>

                        <?php
                    }
                }

                $strSQL = "SELECT * from transactions where custmer_id='" . $_SESSION['customerId'] . "' or to_cust_id='" . $_SESSION['customerId'] . "' or from_cust_id='" . $_SESSION['customerId'] . "' order by transaction_date DESC ";
                $rs = mysql_query($strSQL);


                $strSQL2 = "SELECT sum(amount) as deposit_amount from transactions where ((deposit_withdraw_transfer='Deposit' and custmer_id='" . $_SESSION['customerId'] . "') or (deposit_withdraw_transfer='Transfer' and to_cust_id='" . $_SESSION['customerId'] . "'))";
                $rs2 = mysql_query($strSQL2);
                $row2 = mysql_fetch_array($rs2);

                $strSQL1 = "SELECT sum(amount) as withdraw_amount from transactions where  ((deposit_withdraw_transfer='WithDraw'  and custmer_id='" . $_SESSION['customerId'] . "') or (deposit_withdraw_transfer='Transfer' and from_cust_id='" . $_SESSION['customerId'] . "') or (deposit_withdraw_transfer='Deposit' and from_cust_id='" . $_SESSION['customerId'] . "'))";
                $rs1 = mysql_query($strSQL1);
                $row1 = mysql_fetch_array($rs1);
                $balance = $row2['deposit_amount'] - $row1['withdraw_amount'];


                if (mysql_num_rows($rs) == 0) {
                    ?>
                    <div class="alert alert-info" id="danger-alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong> There is no Transactions done by you.. </strong>
                    </div>
                <?php } else {
                    ?>
                    <div class="table-responsive bs-example widget-shadow" data-example-id="contextual-table">                     
                        <table class="table"> 
                            <thead> 
                                <tr> 
                                    <th>#</th> 
                                    <th>Performed On</th>
                                    <th>Description</th> 
                                    <th>Action</th>
                                    <th>Amount</th>
                                    <th>Balance</th>                                       
                                </tr> 
                            </thead> 
                            <tbody> 
                                <?php
                                $i = 1;
                                $transaction = $balance;
                                while ($row = mysql_fetch_array($rs)) {

                                   
                                    ?>

                                    <tr > 
                                        <th scope="row"><?php echo $i; ?></th>                                         
                                        <td><?php echo $row['transaction_date']; ?></td> 
                                        <td><?php echo $row['transaction_description']; ?></td> 
                                        <td><?php if ($row['deposit_withdraw_transfer'] == 'Deposit') { ?>                                         
                                                <?php if ($row['cash_cheque'] == 'Cash') { ?>
                                                    Cash Deposited By Self
                                                <?php } else if ($row['cash_cheque'] == 'Cheque') { ?>
                                                    <?php if ($row['to_cust_id'] == $_SESSION['customerId']) { ?>
                                                        Check Cr

                                                    <?php } else if ($row['from_cust_id'] == $_SESSION['customerId']) { ?>
                                                        Check Dr

                                                    <?php } ?>   
                                                <?php } ?>
                                            <?php } elseif ($row['deposit_withdraw_transfer'] == 'WithDraw') { ?>
                                                <?php if ($row['cash_cheque'] == 'Cash') { ?>
                                                    Cash WithDraw By Self
                                                <?php } ?>              

                                            <?php } elseif ($row['deposit_withdraw_transfer'] == 'Transfer') { ?>
                                                <?php if ($row['to_cust_id'] == $_SESSION['customerId']) { ?>
                                                    <?php 
                                                    $strSQL2 = "SELECT * from customers where id='" . $row['from_cust_id'] . "'";
                                                    $rs2 = mysql_query($strSQL2);
                                                    $row5 = mysql_fetch_array($rs2);
                                                    ?>
                                                    Cash Received From  <?php echo $row5['firstname']." ".$row5['lastname'];?>
                                                <?php } else if ($row['from_cust_id'] == $_SESSION['customerId']) { ?>
                                                    <?php 
                                                    $strSQL2 = "SELECT * from customers where id='" . $row['to_cust_id'] . "'";
                                                    $rs2 = mysql_query($strSQL2);
                                                    $row5 = mysql_fetch_array($rs2);
                                                    ?>
                                                    Cash Transferred To <?php echo $row5['firstname']." ".$row5['lastname'];?>
                                                <?php } ?>               

                                            <?php } ?>

                                        </td>
                                        <?php if ($row['deposit_withdraw_transfer'] == 'Deposit') { ?>



                                            <?php if ($row['cash_cheque'] == 'Cash') { ?>
                                                <td><?php echo "+ " . $row['amount']; ?></td>
                                                <td><?php echo $transaction; ?></td> 
                                                <?php $transaction-=$row['amount']; ?>
                                            <?php } else if ($row['cash_cheque'] == 'Cheque') { ?>
                                                <?php if ($row['to_cust_id'] == $_SESSION['customerId']) { ?>
                                                    <td><?php echo "+ " . $row['amount']; ?></td> 

                                                    <td><?php echo $transaction; ?></td> 

                                                    <?php $transaction-=$row['amount']; ?>

                                                <?php } else if ($row['from_cust_id'] == $_SESSION['customerId']) { ?>
                                                    <td><?php echo "- " . $row['amount']; ?></td> 

                                                    <td><?php echo $transaction; ?></td>

                                                    <?php $transaction+=$row['amount']; ?>

                                                <?php } ?>  
                                            <?php } ?>





                                        <?php } else if ($row['deposit_withdraw_transfer'] == 'WithDraw') { ?>
                                            <td><?php echo "- " . $row['amount']; ?></td> 

                                           
                                            <td><?php echo $transaction; ?></td>

                                            <?php $transaction+=$row['amount']; ?>

                                        <?php } else if ($row['deposit_withdraw_transfer'] == 'Transfer') { ?>

                                            <?php if ($row['to_cust_id'] == $_SESSION['customerId']) { ?>
                                                <td><?php echo "+ " . $row['amount']; ?></td> 

                                                
                                                <td><?php echo $transaction; ?></td> 

                                                <?php $transaction-=$row['amount']; ?>

                                            <?php } else if ($row['from_cust_id'] == $_SESSION['customerId']) { ?>
                                                <td><?php echo "- " . $row['amount']; ?></td> 

                                               
                                                <td><?php echo $transaction; ?></td>

                                                <?php $transaction+=$row['amount']; ?>

                                            <?php } ?>                                         


                                        <?php } ?>

                                    </tr> 
                                    <?php
                                    $i++;
                                }
                                ?>
                            </tbody> 
                        </table> 
                    </div>
                    <?php
                }
                ?>




            </div>
        </div>
    </div>
    <!--footer-->

    <!--//footer-->
</div>
<!-- Classie -->
<?php include_once 'adminstratorFooter.php'; ?>