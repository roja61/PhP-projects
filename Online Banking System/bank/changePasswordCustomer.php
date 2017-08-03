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
                <h3 class="title1">Change Password</h3>     
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
                }?>
                <div class="form-grids row widget-shadow" data-example-id="basic-forms" style="width: 70%;">
                    <div class="form-body">                        
                        <form enctype="multipart/form-data" method="post" action="changePasswordCustomerStatus.php"> 
                                <div class="form-group"> 
                                    <label for="Name">Current Password</label> 
                                    <input type="password" class="form-contraddCategoryStatusol" id="currentpassword"  name="currentpassword" placeholder="Current Password" style="width: 100%;" required=""> 
                                </div> 

                                <div class="form-group"> 
                                    <label for="Name">New Password</label><label id="message" style="margin-left: 20px;"></label> 
                                    <input type="password" class="form-contraddCategoryStatusol" id="newpassword"  name="newpassword" placeholder="New Password" style="width: 100%;" required="" pattern=".{5,10}" title="5 to 10 characters"> 
                                </div>
                            
                                <div class="form-group"> 
                                    <label for="Name">Confirm Password</label> 
                                    <input type="password" class="form-contraddCategoryStatusol" id="confirmpassword"  name="confirmpassword" placeholder="Confirm Password" style="width: 100%;" onkeyup="checkPassword()" required="" pattern=".{5,10}" title="5 to 10 characters"> 
                                </div> 

                          
                                <button type="submit" class="btn btn-default" id="submitbtn" >Submit</button> 
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
<script type="text/javascript">
function checkPassword() {
     var password = document.getElementById("newpassword").value;
     var confirmPassword = document.getElementById("confirmpassword").value;
     if (password != confirmPassword) {
          document.getElementById('message').style.color = "red";
            document.getElementById("message").innerHTML="Passwords are not same";
            document.getElementById('submitbtn').style.display = "none";
        }else{
            document.getElementById('message').style.color = "green";
            document.getElementById("message").innerHTML="Passwords are matched";
            document.getElementById('submitbtn').style.display = "";
        }
       
}
</script>
<?php include_once 'adminstratorFooter.php'; ?>>