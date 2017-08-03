<?php

include_once 'mysql.php';
if(isset($_GET['id']) && !empty($_GET['id'])){
    $sql = "delete from problems where id='" . $_GET["id"] . "'";
        $rs = mysql_query($sql, $conn);
        if ($rs === TRUE) {
            header('Location: customerHome.php?s=1&st=Problem Deleted Succesfully');
        }else {
            header('Location: customerHome.php?s=0&st=Something Went Wrong while Deleting Problem');
        }
}else{
    header('Location: customerHome.php?s=0&st=Something Went Wrong while Deleting Problem');
}
