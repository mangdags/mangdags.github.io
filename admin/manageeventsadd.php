<?php 
session_start();
include("asset/include/config.php");


  if (!isset($_SESSION['account_id'])) {
   header("location:../index.php");
   die();
  }
$account_id = $_SESSION['account_id'];
$msg = '';
if (isset($_POST['upload'])) {
  $description = $_POST['description'];
  $image = $_FILES['feature_image']['name'];
  $path = '../uploads/'.$image;


  if ($image == '') {
    $query = mysqli_query($conn, "UPDATE manage_events SET f_events_desc = '$description'");

    echo "<script>alert('Update Events Successfully!'); 
                      window.location.href='manageevents.php'
                      </script>";

  }else{
    $query = mysqli_query($conn, "UPDATE manage_events SET f_events_desc = '$description', f_images = '$path'");

    move_uploaded_file($_FILES['feature_image']['tmp_name'], $path);
    echo "<script>alert('Update Events Successfully!'); 
                      window.location.href='manageevents.php'
                      </script>";
  }
    


  

}


 ?>