<?php
session_start();
unset($_SESSION['administratorId']);
unset($_SESSION['administratorName']);
header("Location: index.php");
?>
