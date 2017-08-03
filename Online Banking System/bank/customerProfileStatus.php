<?php

include_once 'mysql.php';
if (isset($_POST) && !empty($_POST)) {    
   
   
    $sql = "update  customers set firstname='" . $_POST["firstname"] . "',lastname='" .$_POST["lastname"]. "',address='" .$_POST["address"]. "',city='" .$_POST["city"]. "',state='" .$_POST["state"]. "',country='" .$_POST["country"]. "',zipcode='" .$_POST["zipcode"]. "' where id='".$_POST['id']."'";
      

    $rs = mysql_query($sql, $conn);

    if ($rs === TRUE) {
        header('Location: customerProfile.php?s=1&st=Details Updated Succesfully');
    } else {
        header('Location: customerProfile.php?s=0&st=Something Went Wrong while Updating Details');
    }
} else {
    header('Location: customerProfile.php?s=0&st=Something Went Wrong while Updating Details');
}

