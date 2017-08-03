<?php
session_start();
include_once 'mysql.php';
include_once 'adminstratorHeader.php';
?>
<div class="main-content" style="margin-top: 5%;margin-left: 10%;">
    <!--left-fixed -navigation-->
     <?php include 'adminTop.php'; ?>
    <!--left-fixed -navigation-->
    <?php // include 'topmenuAdministrator.php'; ?>
    <!-- main content start-->

    <div id="page-wrapper" style="background: #fff;">
        <div class="main-page">
            <div class="forms">
                <h3 class="title1">Add Customer</h3>
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
                        if (isset($_GET['id']) && !empty($_GET['id'])) {
                            $strSQL = "SELECT * FROM customers where id='" . $_GET['id'] . "'";
                            $rs = mysql_query($strSQL);
                            $row = mysql_fetch_array($rs);
                            ?>
                            <form enctype="multipart/form-data" method="post" action="addCustomerStatus.php"> 

                                <div class="form-group"> 
                                    <label for="Name">First Name</label> 
                                    <input type="text" class="form-control" id="firstname"  name="firstname" placeholder="First Name" style="width: 100%;" required="" value="<?php echo $row['firstname']; ?>"> 
                                </div>
                                <div class="form-group"> 
                                    <label for="Name">Last Name</label> 
                                    <input type="text" class="form-control" id="lastname"  name="lastname" placeholder="Last Name" style="width: 100%;" required="" value="<?php echo $row['lastname']; ?>"> 
                                </div> 

                                <div class="form-group"> 
                                    <label for="Name">Mobile</label> 
                                    <input  type="text" class="form-control" id="mobile"  name="mobile" value="<?php echo $row['mobile']; ?>" placeholder="Mobile" style="width: 100%;" required="" pattern="[0-9]{10}">
                                </div>


                                <div class="form-group"> 
                                    <label for="Name">Address</label> 
                                    <textarea type="text" class="form-control" id="address"  name="address" placeholder="Address" style="width: 100%;" rows="5" cols="50"><?php echo $row['address']; ?></textarea> 
                                </div> 
                                <div class="form-group"> 
                                    <label for="Name">City</label> 
                                    <input type="text" class="form-control" id="city" value="<?php echo $row['city']; ?>" name="city" placeholder="City" style="width: 100%;" required=""> 
                                </div>
                                <div class="form-group"> 
                                    <label for="Name">State</label> 
                                    <input type="text" class="form-control" id="state" value="<?php echo $row['state']; ?>" name="state" placeholder="State" style="width: 100%;" required=""> 
                                </div> 
                                <div class="form-group"> 
                                    <label for="Name">Country</label> 
                                    <input type="text" class="form-control" id="country" value="<?php echo $row['country']; ?>" name="country" placeholder="Country" style="width: 100%;" required=""> 
                                </div> 

                                <div class="form-group"> 
                                    <label for="Name">Zip Code</label> 
                                    <input  type="text" class="form-control" id="zipcode" value="<?php echo $row['zipcode']; ?>" name="zipcode" placeholder="Zip Code" style="width: 100%;" required="" pattern="[0-9]{5}">
                                </div>                                
                                <div class="form-group">
                                    <label for="selector1">Status</label>
                                    <div>
                                        <select name="customer_status" id="status" class="form-control" required="" style="width: 100%;">                                               
                                            <option value="1" <?php if (1 == $row['customer_status']) { ?> selected="" <?php } ?>> Active</option>
                                            <option value="0" <?php if (0 == $row['customer_status']) { ?> selected="" <?php } ?>> In-Active</option>                                                    
                                        </select>
                                    </div>
                                </div> 
                                <input type="text" value="update" name="update" hidden="">
                                <input type="text" value="<?php echo $row['id']; ?>" name="id" hidden="">
                                <button type="submit" class="btn btn-default">Submit</button> 
                            </form>


                            <?php
                        } else {
                            ?>
                            <form enctype="multipart/form-data" method="post" action="addCustomerStatus.php"> 

                                <div class="form-group"> 
                                    <label for="Name">First Name</label> 
                                    <input type="text" class="form-control" id="firstname"  name="firstname" placeholder="First Name" style="width: 100%;" required=""> 
                                </div>
                                <div class="form-group"> 
                                    <label for="Name">Last Name</label> 
                                    <input type="text" class="form-control" id="lastname"  name="lastname" placeholder="Last Name" style="width: 100%;" required=""> 
                                </div> 
                                <div class="form-group"> 
                                    <label for="Name">User Name / Email</label> 
                                    <input type="email" class="form-control" id="username"  name="username" placeholder="abc@abc.com" style="width: 100%;" required=""> 
                                </div> 
                                <div class="form-group"> 
                                    <label for="Name">Mobile</label> 
                                    <input  type="text" class="form-control" id="mobile"  name="mobile" placeholder="Mobile" style="width: 100%;" required="" pattern="[0-9]{10}">
                                </div>
                                <div class="form-group"> 
                                    <label for="Name">Password</label> 
                                    <input type="password" class="form-control" id="password"  name="password" placeholder="Password" style="width: 100%;" required="" pattern=".{5,10}" title="5 to 10 characters"> 
                                </div> 

                                <div class="form-group"> 
                                    <label for="Name">Address</label> 
                                    <textarea type="text" class="form-control" id="address"  name="address" placeholder="Address" style="width: 100%;" rows="5" cols="50"></textarea> 
                                </div> 
                                <div class="form-group"> 
                                    <label for="Name">City</label> 
                                    <input type="text" class="form-control" id="city"  name="city" placeholder="City" style="width: 100%;" required=""> 
                                </div>
                                <div class="form-group"> 
                                    <label for="Name">State</label> 
                                    <input type="text" class="form-control" id="state"  name="state" placeholder="State" style="width: 100%;" required=""> 
                                </div> 
                                <div class="form-group"> 
                                    <label for="Name">Country</label> 
                                    <input type="text" class="form-control" id="country"  name="country" placeholder="Country" style="width: 100%;" required=""> 
                                </div> 

                                <div class="form-group"> 
                                    <label for="Name">Zip Code</label> 
                                    <input  type="text" class="form-control" id="zipcode"  name="zipcode" placeholder="Zip Code" style="width: 100%;" required="" pattern="[0-9]{5}">
                                </div>
                                <div class="form-group">
                                    <label for="selector1">Status</label>
                                    <div>
                                        <select name="customer_status" id="customer_status" class="form-control" required="" style="width: 100%;">                                               
                                            <option value="1" selected=""> Active</option>
                                            <option value="0" > In-Active</option>                                                    
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-default">Submit</button> 
                            </form>
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