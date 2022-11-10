<?php 
session_start();
include("asset/include/config.php");


  if (!isset($_SESSION['account_id'])) {
   header("location:../index.php");
   die();
  }
$statusMsg="";

$account_id = $_SESSION['account_id'];
$post_description = $_POST['post_description'];
$targetDir = "asset/images";
$fileName = basename($_FILES["file_post"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
      
      if (isset($_POST["save_post"]) && !empty($_FILES["file_post"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file_post"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = "INSERT INTO `posted_events`( `post_description`, `post_image`, `posted_on`, `accound_id`) VALUES ('$fileName','$post_description',NOW(),'$account_id');";
            if(mysqli_query($conn,$insert)){
                echo "<script>
                      alert('Posted Successfully!'); 
                      window.location.href='index.php'
                      </script>";
            }else{
                echo "<script>
                      alert('File upload failed, please try again.'); 
                      window.location.href='index.php'
                      </script>";
                
            } 
        }else{
          echo "<script>
                      alert('Sorry, there was an error uploading your file.'); 
                      window.location.href='index.php'
                      </script>";
            
        }
    }else{
      echo "<script>
                      alert('Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.'); 
                      window.location.href='index.php'
                      </script>";
       
    }
}else{
  echo "<script>
                      alert('Please select a file to upload.'); 
                      window.location.href='index.php'
                      </script>";
   
}

// Display status message
echo $statusMsg;


     ?>