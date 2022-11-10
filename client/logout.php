<?php 
session_start();
unset($_SESSION['account_id']);
unset($_SESSION['firstname']);
header("location:../index.php");
die();



 ?>