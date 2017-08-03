<?php

session_start();
include_once 'mysql.php';

//echo "<pre>";
//print_r($_POST);exit;

if ((isset($_POST) && !empty($_POST)) && (isset($_POST['option']) && $_POST['option'] == 'deposit')) {

    $sql = "INSERT INTO transactions (custmer_id,deposit_withdraw_transfer,cash_cheque,amount,transaction_date,transaction_description)
VALUES ('" . $_SESSION["customerId"] . "','Deposit','Cash','" . $_POST["amount"] . "','" . date('Y-m-d H:i:s', time()) . "','" . $_POST["transaction_description"] . "')";
    $rs = mysql_query($sql, $conn);
} elseif ((isset($_POST) && !empty($_POST)) && (isset($_POST['option']) && $_POST['option'] == 'withdraw')) {
    $sql = "INSERT INTO transactions (custmer_id,deposit_withdraw_transfer,cash_cheque,amount,transaction_date,transaction_description)
VALUES ('" . $_SESSION["customerId"] . "','WithDraw','Cash','" . $_POST["amount"] . "','" . date('Y-m-d H:i:s', time()) . "','" . $_POST["transaction_description"] . "')";
    $rs = mysql_query($sql, $conn);
}

if ($rs === TRUE) {
    if ($_POST['option'] == 'deposit') {
        header('Location: customerHome.php?s=1&st=Deposit Posted Succesfully');
    } else if ($_POST['option'] == 'withdraw') {
        header('Location: listWithdraw.php?s=1&st=Cash WithDrawn Succesfully');
    }
} else {
    header('Location: customerHome.php?s=0&st=Something Went Wrong while Adding Deposit');
}







