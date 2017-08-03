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
                <h3 class="title1">Transfer Amount</h3>
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

                        <form enctype="multipart/form-data" method="post" action="addTransferStatus.php"> 

                            <?php
                            $strSQL2 = "SELECT *,c.id as cId from recipients r LEFT JOIN customers c on c.id=r.recipient_to where r.recipient_from='" . $_SESSION['customerId'] . "'";

                            $rs2 = mysql_query($strSQL2);
                            ?>
                            <div class="form-group">

                                <label for="selector1">Recipient</label>
                                <div><select name="to_cust_id" id="to_cust_id" class="form-control" required="">
                                        <option value="" >Select Recipient</option>
                                        <?php while ($row2 = mysql_fetch_array($rs2)) { ?>
                                            <option value="<?php echo $row2['cId']; ?>" ><?php echo $row2['firstname'] . " " . $row2['lastname']; ?></option>
                                        <?php } ?>                     
                                    </select>
                                </div>
                            </div>                               
                            <?php
                            $strSQL = "SELECT sum(amount) as deposit_amount from transactions where ((deposit_withdraw_transfer='Deposit' and custmer_id='" . $_SESSION['customerId'] . "') or (deposit_withdraw_transfer='Transfer' and to_cust_id='" . $_SESSION['customerId'] . "'))";
                            $rs = mysql_query($strSQL);
                            $row = mysql_fetch_array($rs);

                            $strSQL1 = "SELECT sum(amount) as withdraw_amount from transactions where  ((deposit_withdraw_transfer='WithDraw'  and custmer_id='" . $_SESSION['customerId'] . "') or (deposit_withdraw_transfer='Transfer' and from_cust_id='" . $_SESSION['customerId'] . "') or (deposit_withdraw_transfer='Deposit' and from_cust_id='" . $_SESSION['customerId'] . "'))";
                            $rs1 = mysql_query($strSQL1);
                            $row1 = mysql_fetch_array($rs1);
                            $balance = $row['deposit_amount'] - $row1['withdraw_amount'];
                            ?>



                            <div class="form-group"> 
                                <label for="Name">Transfer Amount (In Dollars )</label> 
                                <input  type="number" class="form-control" id="amount"  name="amount" placeholder="Amount" style="width: 100%;" required="" min="1.00" step="0.01" max="<?php echo $balance; ?>"> 
                            </div>      
                             <div class="form-group"> 
                                    <label for="Name">Description</label> 
                                    <textarea  class="form-control" id="transaction_description"  name="transaction_description"  style="width: 100%;" required="" rows="5" cols="50"> </textarea>
                                </div>  
                            <input type="text" name="option" value="transfer" hidden="">
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