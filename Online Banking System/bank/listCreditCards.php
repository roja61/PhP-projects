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
            <div class="forms">
                <h3 class="title1">List Credit Cards</h3>
               
                <div class="form-grids row widget-shadow" data-example-id="basic-forms" style="width: 70%;"> 

                    <div class="form-body">                       
                        <form enctype="multipart/form-data" method="post" action="applyCrediCardStatus.php"> 
                            <input type="text" name="card" value="apply" hidden="">
                            <button type="submit" class="btn btn-default">Apply New Credit Card</button> 
                        </form>

                    </div>
                </div>
            </div>
            <div class="tables">
                <h3 class="title1">List Credit Cards </h3> 

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

                $strSQL = "SELECT * from creditcards where customer_id='" . $_SESSION['customerId'] . "' order by credit_applied_on DESC ";
                $rs = mysql_query($strSQL);

                if (mysql_num_rows($rs) == 0) {
                    ?>
                    <div class="alert alert-info" id="danger-alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong> There is no Cards requested by you.. </strong>
                    </div>
                <?php } else {
                    ?>
                    <div class="table-responsive bs-example widget-shadow" data-example-id="contextual-table">                     
                        <table class="table"> 
                            <thead> 
                                <tr> 
                                    <th>#</th> 
                                    <th>Requested On</th> 
                                    <th>Admin Response</th>
                                    <th>Credit Card Number</th>
                                    <th>Credit Balance</th>
                                    <th>Confirmed On</th>
                                </tr> 
                            </thead> 
                            <tbody> 
                                <?php
                                $i = 1;
                                while ($row = mysql_fetch_array($rs)) {

                                    if ($i % 4 == 0) {
                                        $color = "active";
                                    } elseif ($i % 4 == 1) {
                                        $color = "";
                                    } elseif ($i % 4 == 2) {
                                        $color = "info";
                                    } elseif ($i % 4 == 3) {
                                        $color = "";
                                    }
                                    ?>

                                    <tr class="<?php echo $color; ?>"> 
                                        <th scope="row"><?php echo $i; ?></th>                                         
                                        <td><?php echo $row['credit_applied_on']; ?></td> 
                                        <td><?php echo $row['admin_response']; ?></td>
                                        <?php if($row['admin_response']=='Approved') {?>
                                        <td><?php echo $row['credit_card_num']; ?></td> 
                                        <td><?php echo $row['credit_balance']; ?></td>  
                                        <td><?php echo $row['card_confirm_on']; ?></td> 
                                        <?php } else { ?>
                                        <td></td><td></td><td></td>
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