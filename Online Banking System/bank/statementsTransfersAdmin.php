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

    <div id="page-wrapper">
        <div class="main-page">
            <div class="forms">
                <h3 class="title1">Deposit Transfers</h3>
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
                        <form enctype="multipart/form-data" method="post" action="statementsTransfersResultsAdmin.php"> 
                                <?php
                            $strSQL2 = "SELECT * from customers ";
                            $rs2 = mysql_query($strSQL2);
                            ?>
                            <div class="form-group">

                                <label for="selector1">Customer</label>
                                <div><select name="customer_id" id="customer_id" class="form-control" required="">
                                        <option value="" >Select Customer</option>
                                        <?php while ($row2 = mysql_fetch_array($rs2)) { ?>
                                        <option value="<?php echo $row2['id']; ?>" ><?php echo $row2['firstname'] . " " . $row2['lastname']; ?></option>
                                        <?php } ?>                     
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                        <label for="selector1">Statement From</label>
                                        <div class='input-group date' id='datetimepicker1' style="width: 100%;">
                                            <input type='date' class="form-control" style="width: 100%;" name="from_date" required="" max="<?php echo $maxDate; ?>"/>
                                        </div>
                                    </div>
                            <div class="form-group">
                                        <label for="selector1">Statement To</label>
                                        <div class='input-group date' id='datetimepicker2' style="width: 100%;">
                                            <input type='date' class="form-control" style="width: 100%;" name="to_date" required="" max="<?php echo $maxDate; ?>" />
                                        </div>
                                    </div>
                            
                                <button type="submit" class="btn btn-default">Submit</button> 
                            </form>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--footer-->

    <!--//footer-->
</div>
<!-- Classie -->

<?php include_once 'adminstratorFooter.php'; ?>