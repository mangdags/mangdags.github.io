<?php 
session_start();
include("asset/include/config.php");


  if (!isset($_SESSION['account_id'])) {
   header("location:../index.php.php");
   die();
  }
$statusMsg="";

// $account_id = $_SESSION['account_id'];
        
$account_id = $_POST['account_id'];
   
            // Insert image file name into database
            $insert = "UPDATE accounts SET account_status = 'Approved' WHERE account_id = '$account_id'";
            mysqli_query($conn,$insert);
                echo "<script>
                      alert('Approved Successfully!'); 
                      window.location.href='users.php'
                      </script>";
    


// Display status message
echo $statusMsg;


     ?>