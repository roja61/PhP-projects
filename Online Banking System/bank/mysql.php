<?php
$conn = mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("bank", $conn)or die(mysql_error());
date_default_timezone_set('America/Chicago');
?>