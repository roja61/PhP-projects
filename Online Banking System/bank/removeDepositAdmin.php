<?php

include_once 'mysql.php';
if(isset($_GET['id']) && !empty($_GET['id'])){
    $sql = "update transactions set admin_approve='Notified' where id='" . $_GET["id"] . "'";
        $rs = mysql_query($sql, $conn);
        if ($rs === TRUE) {
            header('Location: listDepositsAdmin.php?s=1&st=Notification Removed Succesfully');
        }else {
            header('Location: listDepositsAdmin.php?s=0&st=Something Went Wrong while Deleting Notification');
        }
}else{
    header('Location: listDepositsAdmin.php?s=0&st=Something Went Wrong while Deleting Notification');
}
