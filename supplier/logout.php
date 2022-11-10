<?php 
session_start();
unset($_SESSION['account_id']);
unset($_SESSION['firstname']);
unset($_SESSION['lastname']);
header("location:../index.php");
die();



 ?>