<?php

include_once 'mysql.php';
if (isset($_POST) && !empty($_POST)) {

    $sql = "INSERT INTO contactus (firstname,lastname,email,mobile,address,city,state,country,zipcode,subject,message)
VALUES ('" . $_POST["firstname"] . "','" . $_POST["lastname"] . "','" . $_POST["email"] . "','" . $_POST["mobile"] . "','" . $_POST["address"] . "','" . $_POST["city"] . "','" . $_POST["state"] . "','" . $_POST["country"] . "','" . $_POST["zipcode"] . "','" . $_POST["subject"] . "','" . $_POST["message"] . "')";
   
//    echo $sql;exit;
    $rs = mysql_query($sql, $conn);     
    
    if ($rs === TRUE) {
        header('Location: contactus.php?s=1&st=Query Posted Succesfully');
    } else {
        header('Location: contactus.php?s=0&st=Something Went Wrong while Posting Query');
    }
} else {
    header('Location: contactus.php?s=0&st=Something Went Wrong while Posting Query');
}

