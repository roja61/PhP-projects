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

        $strSQL1 = "SELECT * FROM customers where username='" . $_POST["username"] . "'";
        $rs1 = mysql_query($strSQL1);
        
        if (mysql_num_rows($rs1) > 0) {
            header('Location: addCustomer.php?s=1&st=Customer is Already Registerd with given Email..');
            exit(0);
        } else {
            $sql = "INSERT INTO customers (account_num,firstname,lastname,mobile,username,password,address,city,state,country,zipcode,customer_created_on,customer_last_updated_on,customer_status)
VALUES ('" . time() . "','" . $_POST["firstname"] . "','" . $_POST["lastname"] . "','" . $_POST["mobile"] . "','" . $_POST["username"] . "','" . md5($_POST["password"]) . "','" . $_POST["address"] . "','" . $_POST["city"] . "','" . $_POST["state"] . "','" . $_POST["country"] . "','" . $_POST["zipcode"] . "','" . date('Y-m-d H:i:s', time()) . "','" . date('Y-m-d H:i:s', time()) . "','" . $_POST["customer_status"] . "')";
            $rs = mysql_query($sql, $conn);ini_set('max_execution_time', 3000);

    require 'mailer/PHPMailerAutoload.php';

    $strSQL2 = "SELECT * FROM emailsendingaddress";
    $rs2 = mysql_query($strSQL2);
    $row2 = mysql_fetch_array($rs2);

    if (isset($_SESSION['userId']) && !empty($_SESSION['userId']) && isset($_POST['checkout']) && !empty($_POST['checkout'])) {
    $strSQL3 = "SELECT * FROM user where id='" . $_SESSION['userId'] . "'";
    $rs3 = mysql_query($strSQL3);
    $row3 = mysql_fetch_array($rs3);
    }

    $mail = new PHPMailer;
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
//$mail->SMTPDebug = 4;
    $mail->isSMTP();
    $mail->Host = gethostbyname($row2['emailhost']);
    $mail->SMTPAuth = true;
    $mail->Username = trim($row2['senderemail']);
    $mail->Password = trim($row2['emailpassword']);
    $mail->SMTPSecure = 'tls';
    $mail->Port = trim($row2['emailport']);
    $mail->setFrom(trim($row2['senderemail']), 'Online Banking System');
    $mail->addReplyTo(trim($row2['senderemail']), 'Online Banking System');
    $mail->addAddress($_POST["username"],$_POST["username"]);
   
    $mail->isHTML(true);
   $mail->Subject = "Hey...! " . $_POST["username"]. " Account created Successfully";
    $mail->Body = 'Dear ' . $_POST["username"] . ',Account created Successfully '
                . '<br>Login Credentials: 
                   <br>Username : ' . $_POST["username"] . '
                   <br>Password : ' . $_POST["password"] . '
                   ';
   
    if (!$mail->send()) {

        $message = $mail->ErrorInfo;
    } else {
        $message = "Mail Sent Successfully";
    }
            
            
        }
    }
}

if ($rs === TRUE) {

    if ($_POST['update'] == "update") {
        header('Location: listCustomers.php?s=1&st=Customers Details Updated Succesfully');
    } else {
        header('Location: listCustomers.php?s=1&st=Customers Details Added Succesfully');
    }
} else {
    header('Location: listTechnician.php?s=0&st=Something Went Wrong while Adding Technician Details');
}







