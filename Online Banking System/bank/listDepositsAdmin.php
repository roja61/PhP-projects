<?php
session_start();
include_once 'mysql.php';
include_once 'adminstratorHeader.php';
?>
<div class="main-content" style="margin-top: 5%;margin-left: 2%;">
    <!--left-fixed -navigation-->
     <?php include 'adminTop.php'; ?>
    <!--left-fixed -navigation-->
    <?php // include 'topmenuAdministrator.php'; ?>
    <!-- main content start-->

    <div id="page-wrapper" style="background: #fff; width:100%;">
        <div class="main-page">
            <div class="tables">
                <h3 class="title1">Deposits Statements</h3> 
               
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

                    $strSQL = "SELECT *,t.id as tId from transactions t LEFT JOIN customers c on c.id=t.custmer_id where t.deposit_withdraw_transfer='Deposit' and t.admin_approve='Not Notified' order by transaction_date DESC ";
                    $rs = mysql_query($strSQL);

                    if (mysql_num_rows($rs) == 0) {
                        ?>
                        <div class="alert alert-info" id="danger-alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong> There is no Deposits Added by Customers </strong>
                        </div>
                    <?php } else {
                        ?>
                        <div class="table-responsive bs-example widget-shadow" data-example-id="contextual-table">                     
                            <table class="table"> 
                                <thead> 
                                    <tr> 
                                        <th>#</th> 
                                        <th>Performed On</th>
                                        <th>First Name</th> 
                                        <th>Last Name</th> 
                                        <th>Account Number</th>
                                        <th>Description</th> 
                                        <th>Deposit Amount(In Dollars)</th>
                                        <th>Action</th>
                                    </tr> 
                                </thead> 
                                <tbody> 
                                    <?php
                                    $i = 1;
                                    while ($row = mysql_fetch_array($rs)) {

                                        ?>

                                        <tr > 
                                            <th scope="row"><?php echo $i; ?></th>                                         
                                            <td><?php echo $row['transaction_date']; ?></td>
                                            <td><?php echo $row['firstname']; ?></td>
                                            <td><?php echo $row['lastname']; ?></td>
                                            <td><?php echo $row['account_num']; ?></td>
                                             <td><?php echo $row['transaction_description']; ?></td> 
                                            <td><?php echo $row['amount']; ?></td>  
                                            <td><a href="removeDepositAdmin.php?id=<?php echo $row['tId']; ?>"><span class="label label-danger">Remove from list</span></a></td>    
                                   
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