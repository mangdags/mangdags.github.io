<?php 
session_start();
include("asset/include/config.php");


  if (!isset($_SESSION['account_id'])) {
   header("location:../index.php");
   die();
  }
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title> ISESA</title>
<link rel = "icon" href ="asset/images/icon1.png" type = "image/x-icon">
<link rel="stylesheet" type="text/css" href="asset/css/style.css">
  <style type="text/css">
  

      <style>
        #links:hover{
            background-color: whitesmoke;
            border-radius: 5px;
        }

            .outline {
    color: white; /* Unfortunately you can't use transparent here … */
    text-shadow:
     -1px -1px 0 #000,  
    1px -1px 0 #000,
    -1px 1px 0 #000,
     1px 1px 0 #000
}

/* Real outline for modern browsers */
@supports((text-stroke: 3px black) or (-webkit-text-stroke: 3px black)) {
    .outline {
        color: transparent;
        -webkit-text-stroke: 3px black;
    text-stroke: 3px black;
        text-shadow: none;
    }

        }
        #links:hover{
            background-color: whitesmoke;
            border-radius: 5px;
        }
    </style>
</style>
<link rel = "icon" href ="asset/images/icon1.png"  type = "image/x-icon">
</head>
  <body>
    <body style="background-image: url('asset/images/bg.jpg'); background-repeat: no-repeat; background-size: cover; background-attachment: fixed; background-position: center; ">

      <?php include('asset/include/navigation.php') ?>


      <div class="container" style="margin-top: 20%; background-color: floralwhite;">
    <div class="text-center">
        <p class="outline" style="font-size:4em" >
            WELCOME <?php echo $_SESSION['firstname']?>!
        </p>

    </div>
</div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>