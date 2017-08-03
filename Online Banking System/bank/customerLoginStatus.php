<?php

session_start();
include_once 'mysql.php';

if (isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password']) ) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // SQL query
    $strSQL = "SELECT * FROM customers where username='" . $username . "'";

    // Execute the query (the recordset $rs contains the result)
    $rs = mysql_query($strSQL);

    // Loop the recordset $rs
    // Each row will be made into an array ($row) using mysql_fetch_array
    while ($row = mysql_fetch_array($rs)) {
        if ($row['username'] == $username && $row['password'] == $password) {

            $_SESSION['customerId'] = $row['id'];
            $_SESSION['customerName'] = $row['firstname'] . " " . $row['lastname'];
           
        }
    }

    if (isset($_SESSION['customerId']) && !empty($_SESSION['customerId'])) {
         header("Location: customerDashboard.php");
            exit();
        
    } else {
        header('Location: customerLogin.php?s=2&st=Invalid Username/Password');
    }
}
?>