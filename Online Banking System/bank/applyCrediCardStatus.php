<?php

session_start();
include_once 'mysql.php';

//echo "<pre>";
//print_r($_POST);exit;

if ((isset($_POST) && !empty($_POST)) && (isset($_POST['card']) && $_POST['card'] == 'update')) {
    $cardNum="22".time();
    $sql = "update creditcards  set admin_response= 'Approved',credit_card_num= '" . $cardNum . "',credit_balance= '" . $_POST['credit_balance'] . "',card_confirm_on='" . date('Y-m-d H:i:s', time()) . "' where id='" . $_POST["id"] . "'";
  
    $rs = mysql_query($sql, $conn);
} elseif ((isset($_POST) && !empty($_POST)) && (isset($_POST['card']) && $_POST['card'] == 'apply')) {
    $sql = "INSERT INTO creditcards (customer_id,credit_applied_on)
VALUES ('" . $_SESSION["customerId"] . "','" . date('Y-m-d H:i:s', time()) . "')";
    $rs = mysql_query($sql, $conn);
}elseif ((isset($_GET) && !empty($_GET)) && (isset($_GET['card']) && $_GET['card'] == 'decline')) {
   
    $sql = "update creditcards  set admin_response= 'Declined',card_confirm_on='" . date('Y-m-d H:i:s', time()) . "' where id='" . $_GET["id"] . "'";
    $rs = mysql_query($sql, $conn);
}

if ($rs === TRUE) {
    if ($_POST['card'] == 'apply') {
        header('Location: listCreditCards.php?s=1&st=Card Applied Successfully');
    } else if ($_POST['card'] == 'update') {
        header('Location: creditCardAdmin.php?s=1&st=Updated Succesfully');
    }else if ($_GET['card'] == 'decline') {
        header('Location: chequeBooksAdmin.php?s=1&st=Updated Succesfully');
    }
} else {
    header('Location: listCreditCards.php?s=0&st=Something Went Wrong');
}







