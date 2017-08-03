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
                <h3 class="title1">Update Credit Card Details</h3>
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
                        <?php
                        if (isset($_GET['cqId']) && !empty($_GET['cqId'])) {                            
                            ?>
                        <form enctype="multipart/form-data" method="post" action="applyCrediCardStatus.php"> 

                                <div class="form-group"> 
                                    <label for="Name">Credit Balance</label> 
                                    <input type="number" class="form-control" id="credit_balance"  name="credit_balance" style="width: 100%;" required="" pattern="[0-9]" min="1.00" step="0.01"> 
                                </div>
                                                             
                                
                                
                                <input type="text" value="update" name="card" hidden="">
                                <input type="text" value="<?php echo $_GET['cqId']; ?>" name="id" hidden="">
                                <button type="submit" class="btn btn-default">Submit</button> 
                            </form>


                            <?php
                        } else {
                            ?>
                            <div class="alert alert-danger" id="danger-alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong> Something Went Wrong. Please Try Later. </strong>
                        </div>
                        <?php } ?>
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