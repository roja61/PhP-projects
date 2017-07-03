<?php
$conn=mysqli_connect('localhost','root','');
$db= mysqli_select_db($conn, "student");
if(!$conn)
    echo "error";
//else 
    //echo "yes";

?>


