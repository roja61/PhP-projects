<?php
include 'connect.php';
$id = $_POST['Id'];
$fname = $_POST['First_name'];
$lname = $_POST['Last_name'];
$dob= $_POST['bday'];

echo $id." ".$fname." ".$lname." ".$dob;

$result= mysqli_query($conn,"insert into u_reg(u_id,fname,lname,dob)values('$id','$fname','$lname','$dob')");

echo $id."data added";

//echo $result;
?>

