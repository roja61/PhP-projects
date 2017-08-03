<?php

session_start();
include_once 'mysql.php';

if (isset($_POST) ) {
    $strSQL = "select * from administrator where id='" . $_SESSION['administratorId'] . "'";
    $rs = mysql_query($strSQL);
    $row = mysql_fetch_array($rs);
    
    if (md5($_POST['currentpassword']) == $row['password']) {
        $sql = "update administrator  set password='" . md5($_POST['newpassword']) . "' where id='" . $_SESSION['administratorId'] . "'";
        $rs1 = mysql_query($sql, $conn);
        if ($rs1 === TRUE) {
            header('Location: changePassword.php?s=1&st=Password Updated Succesfully');
        } else {
            header('Location: changePassword.php?s=0&st=Something Went Wrong while Updating Password.Please Try Later.');
        }
    } else {
        header('Location: changePassword.php?s=0&st=Current Password is Wrongly Entered.Please Try Later.');
    }
}





