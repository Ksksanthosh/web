<?php
include 'config.php';
$name ="sample";
$email="email@122";
$phone=123467898;
 mysqli_query($con,"INSERT INTO userdetails(user_Name,email_Id,phone_Number) VALUES ('sample', 'email@122', '123467898' )");
?>