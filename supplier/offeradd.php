<?php 
session_start();
include("asset/include/config.php");


  if (!isset($_SESSION['account_id'])) {
   header("location:../index.php.php");
   die();
  }
$statusMsg="";

$account_id = $_SESSION['account_id'];

$description = $_POST['description'];
$price = $_POST['price'];
$title = $_POST['title'];
$targetDir = "asset/images/";
$fileName = basename($_FILES["file_post"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
      
      if (isset($_POST["save_post"]) && !empty($_FILES["file_post"]["name"])){

  

    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES['file_post']['tmp_name'], $targetDir.$fileName)){
            // Insert image file name into database
            $insert = "INSERT INTO `offer`(`account_id`,`title`,`description`,`price`,`file_name`) VALUES ('$account_id','$title','$description','$price','$fileName');";
            if(mysqli_query($conn,$insert)){
       
                echo "<script>
                      alert('Posted Successfully!'); 
                      window.location.href='offer.php'
                      </script>";
            }else{
                echo "<script>
                      alert('File upload failed, please try again.'); 
                      window.location.href='offer.php'
                      </script>";
                
            } 
        }
        else{
          echo "<script>
                      alert('Sorry, there was an error uploading your file.'); 
                      window.location.href='offer.php'
                      </script>";
            
        }
    }else{
      echo "<script>
                      alert('Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.'); 
                      window.location.href='offer.php'
                      </script>";
       
    }
  
}else if (isset($_POST["edit_post"]) && !empty($_FILES["file_post"]["name"])){

  
    $offer_id =$_POST['offer_id'];
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES['file_post']['tmp_name'], $targetDir.$fileName)){
            // Insert image file name into database
            $update = "UPDATE `offer` SET title = '$title', description = '$description', price = '$price', file_name = '$fileName' WHERE offer_id = '$offer_id' ";
            if(mysqli_query($conn,$update)){
       
                echo "<script>
                      alert('Update Successfully!'); 
                      window.location.href='offer.php'
                      </script>";
            }else{
                echo "<script>
                      alert('File upload failed, please try again.'); 
                      window.location.href='offer.php'
                      </script>";
                
            } 
        }
        else{
          echo "<script>
                      alert('Sorry, there was an error uploading your file.'); 
                      window.location.href='offer.php'
                      </script>";
            
        }
    }else{
      echo "<script>
                      alert('Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.'); 
                      window.location.href='offer.php'
                      </script>";
       
    }
  
}

else{

    $offer_id =$_POST['offer_id'];
$update = "UPDATE `offer` SET title = '$title', description = '$description', price = '$price' WHERE offer_id = '$offer_id' ";
              mysqli_query($conn,$update);
   echo "<script>
                      alert('Update Successfully!'); 
                      window.location.href='offer.php'
                      </script>";
}

// Display status message
echo $statusMsg;


     ?>