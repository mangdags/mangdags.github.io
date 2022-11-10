<?php 
session_start();
include("asset/include/config.php");


  if (!isset($_SESSION['account_id'])) {
   header("location:../index.php");
   die();
  }
 ?>
<!DOCTYPE html>
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
     <script src="ckeditor/ckeditor.js"></script>
    <script src="ckeditor/samples/js/sample.js"></script>
    <link rel="stylesheet" href="ckeditor/samples/css/samples.css">
    <link rel="stylesheet" href="ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
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
<!-- bg-light -->
<br>
    <div class="container" style="margin-top: 6%;">
      <div class="row justify-content-center mb-2">
        <div class="col-lg-10">
            
    <div id="demo" class="carousel slide p-5" data-ride="carousel" style="background-color: rgba(255, 250, 240, 0.6);">
                 <h1 class="pb- text-center" >MANAGE EVENTS</h1>
 

       
      <div  class="row justify-content-center">
        <div class="col-lg-12 rounded px-4">
                <?php
            $query = "SELECT * FROM manage_events";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);
          ?>
          <div class="row">
            <div class="col-lg-6">
              <div class="card bg-transparent border-0">
                <img src="<?php echo $row['f_images'] ?>">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card p-4 border-0 rounded-0 h-100">
                <?php echo $row['f_events_desc'] ?>
              </div>
            </div>
          </div>
          <form action="manageeventsadd.php" method="POST" enctype="multipart/form-data">
            
             <div class="form-group">
              <label>Image</label>
              <input type="file" class="form-control" name="feature_image" >
            </div>
            <div class="form-group">
              <label>Description</label>
              <textarea id="editor" name="description" required><?php if (isset($_GET['offer_id'])) { echo $row['description'];  } ?></textarea>
            </div>
            
            <div class="form-group mt-4" style="text-align:right;">
              <input type="submit" class="btn btn-warning rounded-0 btn-block" name="upload" value="Submit">
            </div>

          </form>
        </div>
      </div>
     </div>
        </div>
      </div>

    </div>
</body>
<!-- Latest compiled and minified CSS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script>
    initSample();
</script>
</html>