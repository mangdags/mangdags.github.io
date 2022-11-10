<?php 
session_start();
include("asset/include/config.php");


  if (!isset($_SESSION['account_id'])) {
   header("location:../index.php.php");
   die();
  }
$statusMsg="";

$account_id = $_SESSION['account_id'];

        
$targetDir = "asset/images/";
$fileName = basename($_FILES["file_post"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
      
      if (isset($_POST["save_post"]) && !empty($_FILES["file_post"]["name"])){

        $services = $_POST['services'];

    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES['file_post']['tmp_name'], $targetDir.$fileName)){
            // Insert image file name into database
            $insert = "INSERT INTO `works`(`file_name`,`account_id`) VALUES ('$fileName','$account_id');";
            if(mysqli_query($conn,$insert)){
              $update = "UPDATE accounts SET services = '$services' WHERE account_id = '".$account_id."'";
              mysqli_query($conn,$update);
                echo "<script>
                      alert('Posted Successfully!'); 
                      window.location.href='services.php'
                      </script>";
            }else{
                echo "<script>
                      alert('File upload failed, please try again.'); 
                      window.location.href='services.php'
                      </script>";
                
            } 
        }
        else{
          echo "<script>
                      alert('Sorry, there was an error uploading your file.'); 
                      window.location.href='services.php'
                      </script>";
            
        }
    }else{
      echo "<script>
                      alert('Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.'); 
                      window.location.href='services.php'
                      </script>";
       
    }
  
}

else{
  // echo "<script>
  //                     alert('Please select a file to upload.'); 
  //                     window.location.href='services.php'
  //                     </script>";

  $services = $_POST['services'];
$update = "UPDATE accounts SET services = '$services' WHERE account_id = '".$account_id."'";
              mysqli_query($conn,$update);
   echo "<script>
                      alert('Posted Successfully!'); 
                      window.location.href='services.php'
                      </script>";
}

// Display status message
echo $statusMsg;


     ?>