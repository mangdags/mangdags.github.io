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
        #displayImg img
        {
          width: 150px;
          height: 150px;
        }
    </style>
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel = "icon" href ="asset/images/icon1.png"  type = "image/x-icon">
</head>
  <body>
    <body style="background-image: url('asset/images/bg.jpg'); background-repeat: no-repeat; background-size: cover; background-attachment: fixed; background-position: center; ">

      <?php include('asset/include/navigation.php') ?>

<section style="padding: 5% 5% 0% 5% " >
  <div class="row justify-content-between ">
    <h1 class="text-center pt-5" style="font-size: 4em; font-weight: bold;">FEATURE EVENTS</h1>
  </div>
</section>
<div class="container" style="background-color: rgba(255, 250, 240, 0.8);">
  <div class="row justify-content-between">
    <form action="" method="POST" enctype="multipart/form-data">
     <label for="exampleFormControlTextarea1" class="form-label pt-2 text-left">Post Description</label>
    <div class="col-12 pb-2">
      <textarea class="form-control" rows="3">
        
      </textarea>
      <div id="displayImg" class="pt-2">
        
      </div>

    </div>
    <div class="form-group pb-5" style="float: left;">
      <label for="fileImg"> <i class="fa fa-photo"></i> / <i class="fa fa-video"></i></label>
      <input type="file" name="fileImg[]" id="fileImg" onchange="preview();" multiple hidden>      
    </div>
    <div class="form-group pb-5" style="float: right;">
      <button type="submit" name="postfeatured" class="btn btn-primary">POST</button>
    </div>
  </form>

  </div>
  
</div>
<script type="text/javascript">
  function preview()
  {
    var totalfiles = $('#fileImg').get(0).files.length;
    for(var i=0; i < totalfiles; i++){
      $('#displayImg').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");
    }
    $.ajax({
      url:'function.php',
      type: 'post',
      data: formData,
      contentType: false,
      processData: false,
      success:function(response)
      {
        alert(respone);
      }
    });
  }
</script>    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>