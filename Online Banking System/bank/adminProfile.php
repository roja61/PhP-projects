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
            <?php
            if (isset($_GET['s']) && !empty($_GET)) {
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

                <?php } ?>


            <?php } ?>
            <?php if (isset($_SESSION['administratorId']) && !empty($_SESSION['administratorId'])) { ?>
                <div class="tables">
                    <h3 class="title1">Update Administrator Details</h3> 
                    <?php
                        $strSQL3 = "SELECT * from administrator where id='" . $_SESSION['administratorId'] . "'";
                        $rs3 = mysql_query($strSQL3);
                        $row = mysql_fetch_array($rs3);
                        if (mysql_num_rows($rs3) == 0) {
                        ?>
                        <div class="alert alert-info" id="danger-alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong> There is no Administrator Exists. </strong>
                        </div>
                    <?php } else { ?>
                        <div class="forms">
                            <div class="form-grids row widget-shadow" data-example-id="basic-forms" style="width: 70%;"> 

                                <div class="form-body">                        
                                    <form enctype="multipart/form-data" method="post" action="adminProfileStatus.php">                                  
                                        <div class="form-group"> 
                                            <label for="Name">First Name<span style="color:red;">*</span></label> <br>
                                            <input type="text" placeholder="First Name" name="firstname" required="" value="<?php echo $row['firstname']; ?>">
                                        </div>
                                        <div class="form-group"> 
                                            <label for="">Last Name<span style="color:red;">*</span></label><br>
                                            <input type="text" placeholder="Last Name" name="lastname" required="" value="<?php echo $row['lastname']; ?>">
                                        </div> 

                                        <div class="form-group"> 
                                            <label for="">Address<span style="color:red;">*</span></label><br>
                                            <textarea  placeholder="Address" name="address" required="" cols="50" rows="5"><?php echo $row['address']; ?></textarea>
                                        </div>

                                        <div class="form-group"> 
                                            <label for="">City<span style="color:red;">*</span></label><br>
                                            <input type="text" placeholder="City" name="city" required="" value="<?php echo $row['city']; ?>">
                                        </div>
                                        <div class="form-group"> 
                                            <label for="">State<span style="color:red;">*</span></label><br>
                                            <input type="text" placeholder="State" name="state" required="" value="<?php echo $row['state']; ?>">
                                        </div>

                                        <div class="form-group"> 
                                            <label for="">Country<span style="color:red;">*</span></label><br>
                                            <input type="text" placeholder="Country" name="country" required="" value="<?php echo $row['country']; ?>">
                                        </div>
                                        <div class="form-group"> 
                                            <label for="">Zip Code<span style="color:red;">*</span></label><br>
                                            <input type="text" placeholder="Zip Code" name="zipcode" required="" value="<?php echo $row['zipcode']; ?>">
                                        </div>
                                        
                                        
                                        <input type="text" placeholder="" name="id" required="" value="<?php echo $row['id']; ?>" hidden="">
                                        <button type="submit" class="btn btn-default">Submit</button> 
                                    </form>

                                </div>
                            </div>
                        </div>    

                    <?php }
                    ?>

                </div>

            <?php } else { ?>
                <div class="alert alert-info" id="danger-alert">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong> There is no Customers Exists. </strong>
                </div>
            <?php } ?>


        </div>
    </div>
</div>
<!-- Classie -->
<?php include_once 'adminstratorFooter.php'; ?>