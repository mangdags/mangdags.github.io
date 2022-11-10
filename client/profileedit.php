<?php 
session_start();
include("asset/include/config.php");


  if (!isset($_SESSION['account_id'])) {
   header("location:../index.php.php");
   die();
  }

$account_id = $_SESSION['account_id'];

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$contact_number = $_POST['contact_number'];
$email = $_POST['email'];
$address = $_POST['address'];
$category = $_POST['category'];


  $update = "UPDATE accounts SET firstname = '$firstname', lastname = '$lastname', contact_number = '$contact_number', email = '$email', address = '$address', category = '$category' WHERE account_id = '$account_id'";
            mysqli_query($conn,$update);
  
  echo "<script>alert('Update Successfully!'); window.location.href='myprofile.php' </script>";
            


?>