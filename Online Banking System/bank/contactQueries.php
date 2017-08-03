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
                <h3 class="title1">Contact Queries</h3> 
                <?php
                

                $strSQL = "SELECT * FROM contactus order by posted_on desc";
                $rs = mysql_query($strSQL);

                if (mysql_num_rows($rs) == 0) {
                    ?>
                    <div class="alert alert-info" id="danger-alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong> There is no Queries Posted. </strong>
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
                                    <th>Email</th> 
                                    <th>Mobile</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Country</th>
                                    <th>Zip Code</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Posted On</th>                                    
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
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['mobile']; ?></td>
                                         <td><?php echo $row['city']; ?></td>
                                          <td><?php echo $row['state']; ?></td>
                                           <td><?php echo $row['country']; ?></td>
                                            <td><?php echo $row['zipcode']; ?></td>
                                        <td><?php echo $row['subject']; ?></td>
                                        <td><?php echo $row['message']; ?></td>
                                        <td><?php echo $row['posted_on']; ?></td>
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