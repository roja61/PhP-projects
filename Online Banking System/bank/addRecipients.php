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
                <h3 class="title1">Add Recipient</h3>
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
                        
                            <form enctype="multipart/form-data" method="post" action="addRecipientsStatus.php"> 

                                <div class="form-group"> 
                                    <label for="Name">First Name</label> 
                                    <input type="text" class="form-control" id="firstname"  name="firstname" placeholder="First Name" style="width: 100%;" required=""> 
                                </div>
                                <div class="form-group"> 
                                    <label for="Name">Last Name</label> 
                                    <input type="text" class="form-control" id="lastname"  name="lastname" placeholder="Last Name" style="width: 100%;" required=""> 
                                </div> 
                                <div class="form-group"> 
                                    <label for="Name">Email</label> 
                                    <input type="email" class="form-control" id="username"  name="username" placeholder="Email" style="width: 100%;" required=""> 
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