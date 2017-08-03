<?php

include_once 'mysql.php';
if(isset($_GET['id']) && !empty($_GET['id'])){
    $sql = "delete from recipients where id='" . $_GET["id"] . "'";
        $rs = mysql_query($sql, $conn);
        if ($rs === TRUE) {
            header('Location: listRecipients.php?s=1&st=Recipient Deleted Succesfully');
        }else {
            header('Location: listRecipients.php?s=0&st=Something Went Wrong while Deleting Recipient');
        }
}else{
    header('Location: listRecipients.php?s=0&st=Something Went Wrong while Deleting Recipient');
}
