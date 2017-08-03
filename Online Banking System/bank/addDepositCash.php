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
                <h3 class="title1">Add Deposit (Cash)</h3>
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
                        
                        <form enctype="multipart/form-data" method="post" action="addDepositCashStatus.php"> 
                                <div class="form-group"> 
                                    <label for="Name">Deposit Amount (In Dollars )</label> 
                                    <input  type="number" class="form-control" id="amount"  name="amount" placeholder="Amount" style="width: 100%;" required="" min="1.00" step="0.01"> 
                                </div>  
                                <div class="form-group"> 
                                    <label for="Name">Description</label> 
                                    <textarea  class="form-control" id="transaction_description"  name="transaction_description"  style="width: 100%;" required="" rows="5" cols="50"> </textarea>
                                </div>  
                            <input type="text" name="option" value="deposit" hidden="">
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