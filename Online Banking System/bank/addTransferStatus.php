<?php

session_start();
include_once 'mysql.php';

//echo "<pre>";
//print_r($_POST);exit;

if ((isset($_POST) && !empty($_POST)) && (isset($_POST['option']) && $_POST['option'] == 'transfer')) {

    $sql = "INSERT INTO transactions (custmer_id,deposit_withdraw_transfer,cash_cheque,amount,to_cust_id,from_cust_id,transaction_date,transaction_description)
VALUES ('" . $_SESSION["customerId"] . "','Transfer','Cash','" . $_POST["amount"] . "','" . $_POST["to_cust_id"] . "','" . $_SESSION["customerId"] . "','" . date('Y-m-d H:i:s', time()) . "','" . $_POST["transaction_description"] . "')";
    $rs = mysql_query($sql, $conn);
} 

if ($rs === TRUE) {    
        header('Location: listTransfers.php?s=1&st=Transfered Succesfully');    
} else {
    header('Location: listTransfers.php?s=0&st=Something Went Wrong while Transferring Amount');
}







