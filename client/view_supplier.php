<?php 
session_start();
include("asset/include/config.php");


  if (!isset($_SESSION['account_id'])) {
   header("location:../index.php");
   die();
  }
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>	ISESA</title>
<link rel = "icon" href ="asset/images/icon1.png" type = "image/x-icon">
<link rel="stylesheet" type="text/css" href="asset/css/style.css">

</head>
<body style="background-image: url('asset/images/bg.jpg'); background-repeat: no-repeat; background-size: cover; background-attachment: fixed; background-position: center; ">

<?php include('asset/include/navbar.php'); ?>

<?php 

  
 ?>

<div class="container text-center">
  <!-- Stack the columns on mobile by making one full-width and the other half-width -->
  <div class="row">
    <div class="col" style="background-color: rgba(255, 250, 240, 0.8);">

      <?php 

      $get_supplier_id = $_GET['id'];
      $supply_id = $get_supplier_id;


      $ds_supplier_profile = mysqli_query($conn, "SELECT * FROM accounts where account_id='$supply_id'");
      while($ds_supplier_profile_row = mysqli_fetch_array($ds_supplier_profile))
      {

       $firstname = $ds_supplier_profile_row['firstname'];
       $lastname = $ds_supplier_profile_row['lastname'];
       $capsfirstname = strtoupper($firstname);
       $capslastname = strtoupper($lastname);
       ?>
       <div class="container-fluid p-5 my-5 border" style="padding-top: 20px; ">
    <div class="row">
      <div class="col-12" style="background-color: floralwhite; ">


        <div class="profile_image">
        <img src="asset/images/default_img.png" class="img-fluid rounded-circle" >
        </div>


      </div>
  </div>

      <div class="row">
      <div class="col-12" style="background-color: floralwhite; ">
      <h1 class="text-center text-capitalize"><?php echo $capsfirstname; ?> <?php echo $capslastname; ?></h1>        
      </div>
  </div>

       <?php
      } ?>
    </div>
    
  </div>
</div>


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>


</html>