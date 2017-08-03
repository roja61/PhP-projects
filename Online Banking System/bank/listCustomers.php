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
            <div class="tables">
                <h3 class="title1">List Customers</h3> 

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

                $strSQL = "SELECT * from customers";
                $rs = mysql_query($strSQL);

                if (mysql_num_rows($rs) == 0) {
                    ?>
                    <div class="alert alert-info" id="danger-alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong> There is no Customers Added by you.. </strong>
                    </div>
                <?php } else {
                    ?>
                    <div class="table-responsive bs-example widget-shadow" data-example-id="contextual-table">                     
                        <table class="table"> 
                            <thead> 
                                <tr> 
                                    <th>#</th> 
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                    <th>Account Number</th>
                                    <th>Mobile</th>
                                    <th>Address1</th>
                                    <th>Address2</th>
                                    <th>Zip code</th>
                                    <th>Status</th>
                                    <th>Created On</th>                                    
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr> 
                            </thead> 
                            <tbody> 
                                <?php
                                $i = 1;
                                while ($row = mysql_fetch_array($rs)) {

                                   
                                    ?>

                                    <tr> 
                                        <th scope="row"><?php echo $i; ?></th>                                         
                                        <td><?php echo $row['firstname']; ?></td> 
                                        <td><?php echo $row['lastname']; ?></td> 
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['account_num']; ?></td>
                                        <td><?php echo $row['mobile']; ?></td> 
                                        <td><?php echo $row['address']; ?></td> 
                                        <td><?php echo $row['city'].",".$row['state'].",".$row['country']; ?></td> 
                                        
                                        <td><?php echo $row['zipcode']; ?></td> 
                                        <td><?php if($row['customer_status']==1) echo "Active"; else  echo "In-Active";?></td>                                         
                                        <td><?php echo $row['customer_created_on']; ?></td>                                        
                                        <td><a href="addCustomer.php?id=<?php echo $row['id']; ?>"><span class="label label-info">Edit</span></a></td>    
                                        <td><a href="deleteCustomer.php?id=<?php echo $row['id']; ?>"><span class="label label-danger">Delete</span></a></td>    
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