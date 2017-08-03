<?php

include_once 'mysql.php';
if(isset($_GET['id']) && !empty($_GET['id'])){
    $sql = "delete from customers where id='" . $_GET["id"] . "'";
        $rs = mysql_query($sql, $conn);
        if ($rs === TRUE) {
            header('Location: listCustomers.php?s=1&st=Customer Deleted Succesfully');
        }else {
            header('Location: listCustomers.php?s=0&st=Something Went Wrong while Deleting Customer');
        }
}else{
    header('Location: listCustomers.php?s=0&st=Something Went Wrong while Deleting Customer');
}
