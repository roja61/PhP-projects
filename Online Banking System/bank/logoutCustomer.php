<?php
session_start();
unset($_SESSION['customerId']);
unset($_SESSION['customerName']);
header("Location: index.php");
?>
