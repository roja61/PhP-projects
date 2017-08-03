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
                <h3 class="title1">List Deposits</h3> 
               
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

                    $strSQL = "SELECT * from transactions where custmer_id='".$_SESSION['customerId']."' and deposit_withdraw_transfer='Deposit' order by transaction_date DESC ";
                    $rs = mysql_query($strSQL);

                    if (mysql_num_rows($rs) == 0) {
                        ?>
                        <div class="alert alert-info" id="danger-alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong> There is no Deposits Added by you.. </strong>
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
                                        <th>Deposit Amount(In Dollars)</th>
                                    </tr> 
                                </thead> 
                                <tbody> 
                                    <?php
                                    $i = 1;
                                    while ($row = mysql_fetch_array($rs)) {

                                       
                                        ?>

                                        <tr> 
                                            <th scope="row"><?php echo $i; ?></th>                                         
                                            <td><?php echo $row['transaction_date']; ?></td> 
                                            <td><?php echo $row['transaction_description']; ?></td> 
                                            <td><?php echo $row['amount']; ?></td>                                            
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