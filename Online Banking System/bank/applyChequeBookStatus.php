<?php

session_start();
include_once 'mysql.php';

//echo "<pre>";
//print_r($_POST);exit;

if ((isset($_POST) && !empty($_POST)) && (isset($_POST['book']) && $_POST['book'] == 'update')) {

    $endnum=$_POST["book_start_num"]+$_POST["no_of_cheques"];
    $sql = "update chequebooks  set admin_response= 'Approved',book_start_num= '" . $_POST["book_start_num"] . "',book_end_num= '" . $endnum . "',book_confirmed_on='" . date('Y-m-d H:i:s', time()) . "' where id='" . $_POST["id"] . "'";
    $rs = mysql_query($sql, $conn);
} elseif ((isset($_POST) && !empty($_POST)) && (isset($_POST['book']) && $_POST['book'] == 'apply')) {
    $sql = "INSERT INTO chequebooks (customer_id,book_requested_on)
VALUES ('" . $_SESSION["customerId"] . "','" . date('Y-m-d H:i:s', time()) . "')";
    $rs = mysql_query($sql, $conn);
}elseif ((isset($_GET) && !empty($_GET)) && (isset($_GET['book']) && $_GET['book'] == 'decline')) {
   
    $sql = "update chequebooks  set admin_response= 'Declined',book_confirmed_on='" . date('Y-m-d H:i:s', time()) . "' where id='" . $_GET["id"] . "'";
    $rs = mysql_query($sql, $conn);
}



if ($rs === TRUE) {
    if ($_POST['book'] == 'apply') {
        header('Location: listChequeBook.php?s=1&st=Book Applied Successfully');
    } else if ($_POST['book'] == 'update') {
        header('Location: chequeBooksAdmin.php?s=1&st=Updated Succesfully');
    }else if ($_GET['book'] == 'decline') {
        header('Location: chequeBooksAdmin.php?s=1&st=Updated Succesfully');
    }
} else {
    header('Location: listChequeBook.php?s=0&st=Something Went Wrong while Adding Deposit');
}







