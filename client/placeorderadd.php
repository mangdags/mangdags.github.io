<?php 
session_start();
include("asset/include/config.php");


  if (!isset($_SESSION['account_id'])) {
   header("location:../index.php.php");
   die();
  }

$account_id = $_SESSION['account_id'];
$offer_id = $_POST['offer_id'];
$address = $_POST['address'];
$code = rand(0000000,9999999);

  $insert = "INSERT INTO `customeravail` (code,offer_id,account_id,address) VALUES ('$code','$offer_id','$account_id','$address')";
            mysqli_query($conn,$insert);
  
  echo "<script>alert('Place Order Successfully!'); window.location.href='checkout.php?code=".$code."' </script>";
            


?>