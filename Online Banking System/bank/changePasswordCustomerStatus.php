<?php

session_start();
include_once 'mysql.php';

if (isset($_POST) ) {
    $strSQL = "select * from customers where id='" . $_SESSION['customerId'] . "'";
    $rs = mysql_query($strSQL);
    $row = mysql_fetch_array($rs);
    
    if (md5($_POST['currentpassword']) == $row['password']) {
        $sql = "update administrator  set password='" . md5($_POST['newpassword']) . "' where id='" . $_SESSION['customerId'] . "'";
        $rs1 = mysql_query($sql, $conn);
        if ($rs1 === TRUE) {
            header('Location: changePasswordCustomer.php?s=1&st=Password Updated Succesfully');
        } else {
            header('Location: changePasswordCustomer.php?s=0&st=Something Went Wrong while Updating Password.Please Try Later.');
        }
    } else {
        header('Location: changePasswordCustomer.php?s=0&st=Current Password is Wrongly Entered.Please Try Later.');
    }
}





