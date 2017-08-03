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
            <div class="forms">
                <h3 class="title1">Update Cheque Details</h3>
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
                        <form enctype="multipart/form-data" method="post" action="applyChequeBookStatus.php"> 

                                <div class="form-group"> 
                                    <label for="Name">Starting Number</label> 
                                    <input type="number" class="form-control" id="book_start_num"  name="book_start_num" style="width: 100%;" required="" pattern="[0-9]{6}" min="100000" max="999899"> 
                                </div>
                                <div class="form-group"> 
                                    <label for="Name">Number of Checkss</label> 
                                    <input type="number" class="form-control" id="no_of_cheques"  name="no_of_cheques"  style="width: 100%;" required=""  pattern="[0-9]" min="10" max="100"> 
                                </div>                              
                                
                                
                                <input type="text" value="update" name="book" hidden="">
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