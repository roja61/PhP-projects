<?php
session_start();
include_once 'mysql.php';
if (isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);


    $strSQL = "SELECT * FROM administrator where username='" . $username . "'";

    $rs = mysql_query($strSQL);


    while ($row = mysql_fetch_array($rs)) {
        
        if ($row['username'] == $username && $row['password'] == $password) {

            $_SESSION['administratorId'] = $row['id'];
            $_SESSION['administratorName'] = $row['username'];
        }
    }

    if (isset($_SESSION['administratorId']) && !empty($_SESSION['administratorId'])) {

        header("Location: contactQueries.php");
        exit();
    } else {
        header('Location: loginAdministrator.php?s=2&st=Invalid Username/Password');
    }
}