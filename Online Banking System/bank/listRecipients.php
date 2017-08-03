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
            <div class="tables">
                <h3 class="title1">List Recipients</h3> 
               
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

                    $strSQL = "SELECT *,r.id as rId from recipients r LEFT JOIN customers c on r.recipient_to=c.id where r.recipient_from='".$_SESSION['customerId']."'";
                    
                    $rs = mysql_query($strSQL);

                    if (mysql_num_rows($rs) == 0) {
                        ?>
                        <div class="alert alert-info" id="danger-alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong> There is no Recipients by you.. </strong>
                        </div>
                    <?php } else {
                        ?>
                        <div class="table-responsive bs-example widget-shadow" data-example-id="contextual-table">                     
                            <table class="table"> 
                                <thead> 
                                    <tr> 
                                        <th>#</th> 
                                        <th>Recipient First Name</th> 
                                        <th>Recipient Last Name</th>
                                        <th>Recipient Email</th>
                                        <th>Last Updated On</th>
                                        <th>Delete</th>
                                    </tr> 
                                </thead> 
                                <tbody> 
                                    <?php
                                    $i = 1;
                                    while ($row = mysql_fetch_array($rs)) {

                                        
                                        ?>

                                    <tr > 
                                                <th scope="row"><?php echo $i; ?></th>                                         
                                                <td><?php echo $row['firstname']; ?></td> 
                                                <td><?php echo $row['lastname']; ?></td>
                                                <td><?php echo $row['username']; ?></td>
                                                <td><?php echo $row['recipient_added_on']; ?></td>  
                                               <td><a href="deleteRecipients.php?id=<?php echo $row['rId']; ?>"><span class="label label-danger">Delete</span></a></td>    
                                    
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