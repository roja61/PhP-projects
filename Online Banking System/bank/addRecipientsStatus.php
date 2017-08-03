<?php

session_start();
include_once 'mysql.php';

//echo "<pre>";
//print_r($_POST);exit;
if (isset($_POST['update']) && $_POST['update'] == "update") {
    $sql = "update customers  set firstname= '" . $_POST["firstname"] . "',lastname= '" . $_POST["lastname"] . "',mobile= '" . $_POST["mobile"] . "',address= '" . $_POST["address"] . "',city= '" . $_POST["city"] . "',"
            . "state= '" . $_POST["state"] . "',country= '" . $_POST["country"] . "',zipcode= '" . $_POST["zipcode"] . "',customer_status= '" . $_POST["customer_status"] . "',customer_last_updated_on='" . date('Y-m-d H:i:s', time()) . "' where id='" . $_POST["id"] . "'";
    $rs = mysql_query($sql, $conn);
} else {
    if (isset($_POST) && !empty($_POST)) {

        $strSQL1 = "SELECT * FROM customers where UPPER(username)='" . strtoupper($_POST["username"]) . "' and UPPER(firstname)='" . strtoupper($_POST["firstname"]) . "' and UPPER(lastname)='" . strtoupper($_POST["lastname"]) . "'";
        $rs1 = mysql_query($strSQL1);

        if (mysql_num_rows($rs1) == 0) {
            header('Location: addRecipients.php?s=1&st=You Entered Wrong Recipient Details.');
            exit(0);
        } else {
            $row = mysql_fetch_array($rs1);
            if ($row['id'] == $_SESSION['customerId']) {
                header('Location: addRecipients.php?s=1&st=You Provided Your Personal Details to add recipient.It is not Allowed.');
                exit(0);
            } else {
                $strSQL2 = "SELECT * FROM recipients where recipient_to='" . $row['id'] . "' and recipient_from='" . $_SESSION['customerId'] . "' ";
                $rs2 = mysql_query($strSQL2);

                if (mysql_fetch_array($rs2) > 1) {
                    header('Location: addRecipients.php?s=1&st=Recipient is Already Added.');
                    exit(0);
                } else {
                    $sql = "INSERT INTO recipients (recipient_from,recipient_to,recipient_added_on)
VALUES ('" . $_SESSION['customerId'] . "','" . $row['id'] . "','" . date('Y-m-d H:i:s', time()) . "')";
                    $rs = mysql_query($sql, $conn);

                    header('Location: listRecipients.php?s=1&st=Recipient Added Succesfully');
                }
            }
        }
    }
}






