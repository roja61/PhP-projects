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
                <h3 class="title1">List Check Books</h3> 

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

                $strSQL = "SELECT *,cq.id as cqId from chequebooks cq LEFT JOIN customers c on c.id=cq.customer_id order by book_requested_on DESC ";
                $rs = mysql_query($strSQL);

                if (mysql_num_rows($rs) == 0) {
                    ?>
                    <div class="alert alert-info" id="danger-alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong> There is no Requests. </strong>
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
                                    <th>Account Number</th>
                                    <th>Requested On</th> 
                                    <th>Admin Response</th>
                                    <th>Starting Number</th>
                                    <th>Ending Number</th>
                                    <th>Confirmed On</th>                                   
                                    <th>Edit</th>
                                    <th>Decline</th>
                                </tr> 
                            </thead> 
                            <tbody> 
                                <?php
                                $i = 1;
                                while ($row = mysql_fetch_array($rs)) {

                                   
                                    ?>

                                    <tr "> 
                                        <th scope="row"><?php echo $i; ?></th>                                         
                                        <td><?php echo $row['firstname']; ?></td> 
                                        <td><?php echo $row['lastname']; ?></td>
                                        <td><?php echo $row['account_num']; ?></td>
                                        <td><?php echo $row['book_requested_on']; ?></td> 
                                        <td><?php echo $row['admin_response']; ?></td>
                                        <?php if($row['admin_response']=='Approved') {?>
                                        <td><?php echo $row['book_start_num']; ?></td> 
                                        <td><?php echo $row['book_end_num']; ?></td>  
                                        <td><?php echo $row['book_confirmed_on']; ?></td> 
                                        <td></td>
                                        <td></td>
                                        <?php } else { ?>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><a href="chequeBookUpdate.php?cqId=<?php echo $row['cqId']; ?>"><span class="label label-info">Update details</span></a></td>    
                                        <td><a href="applyChequeBookStatus.php?book=decline&id=<?php echo $row['cqId']; ?>"><span class="label label-danger">Decline</span></a></td>    
                                        
                                        <?php } ?>
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