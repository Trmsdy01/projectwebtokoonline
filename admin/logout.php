<?php 
session_destroy();
echo "<script>alert('Logged Out');</script>";
echo "<script>location='login.php';</script>";
?>