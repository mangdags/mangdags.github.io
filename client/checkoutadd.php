<?php 
session_start();
include("asset/include/config.php");


  if (!isset($_SESSION['account_id'])) {
   header("location:../index.php");
   die();
  }
$statusMsg="";

$account_id = $_SESSION['account_id'];


$code = $_POST['code'];
$targetDir = "asset/images/";
$fileName = basename($_FILES["file_post"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
      

    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES['file_post']['tmp_name'], $targetDir.$fileName)){
            // Insert image file name into database
            $update = "UPDATE customeravail SET file_name = '$fileName' WHERE code = '$code'";
            if(mysqli_query($conn,$update)){
       
                echo "<script>
                      alert('Posted Successfully!'); 
                      window.location.href='reserved.php'
                      </script>";
            }else{
                echo "<script>
                      alert('File upload failed, please try again.'); 
                      window.location.href='checkout.php?code=".$code."'
                      </script>";
                
            } 
        }
        else{
          echo "<script>
                      alert('Sorry, there was an error uploading your file.'); 
                      window.location.href='checkout.php?code=".$code."'
                      </script>";
            
        }
    }else{
      echo "<script>
                      alert('Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.'); 
                      window.location.href='checkout.php?code=".$code."'
                      </script>";
       
    }
  


// Display status message
echo $statusMsg;


     ?>