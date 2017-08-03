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
                <h3 class="title1">WithDraw Statements</h3>
                <?php
                if (isset($_GET['s']) && !empty($_GET['s'])) {
                    if (isset($_GET) && !empty($_GET) && $_GET['s'] == 1) {
                        ?>                      
                        <div class="alert alert-danger" id="danger-alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong> <?php echo $_GET['st'] ?> </strong>
                        </div>                      
                    <?php } ?>

                   


                <?php } ?>
                <div class="form-grids row widget-shadow" data-example-id="basic-forms" style="width: 70%;"> 

                    <div class="form-body">
                        <?php  $maxDate = date('Y-m-d', time());?>
                        <form enctype="multipart/form-data" method="post" action=""> 
                                <div class="form-group">
                                        <label for="selector1">Statement From</label>
                                        <div class='input-group date' id='datetimepicker1' style="width: 100%;">
                                            <input type='date' class="form-control" style="width: 100%;" name="from_date" required="" value="<?php echo $_POST['from_date'] ?>"/>
                                        </div>
                                    </div>
                            <div class="form-group">
                                        <label for="selector1">Statement To</label>
                                        <div class='input-group date' id='datetimepicker2' style="width: 100%;">
                                            <input type='date' class="form-control" style="width: 100%;" name="to_date" required="" max="<?php echo $maxDate; ?>" value="<?php echo $_POST['to_date'] ?>"/>
                                        </div>
                                    </div>
                            
                                <button type="submit" class="btn btn-default">Submit</button> 
                            </form>
                       
                    </div>
                </div>
            </div>
            <div class="tables">
               
               
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

                    $strSQL = "SELECT * from transactions where custmer_id='".$_SESSION['customerId']."' and deposit_withdraw_transfer='WithDraw' and (transaction_date >= '".$_POST['from_date']."' and transaction_date <= '".date('Y-m-d H:i:s',strtotime('+23 hour +59 minutes +59 seconds',strtotime($_POST['to_date'])))."') order by transaction_date DESC ";
                    $rs = mysql_query($strSQL);

                    if (mysql_num_rows($rs) == 0) {
                        ?>
                        <div class="alert alert-info" id="danger-alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong> There is no WithDraw  by you.. </strong>
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
                                        <th>WithDraw Amount(In Dollars)</th>
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