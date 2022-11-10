<?php 
session_start();
include("asset/include/config.php");


  if (!isset($_SESSION['account_id'])) {
   header("location:../index.php");
   die();
  }
$account_id = $_SESSION['account_id'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="asset/css/style.css">


        <script src="ckeditor/ckeditor.js"></script>
    <script src="ckeditor/samples/js/sample.js"></script>
    <link rel="stylesheet" href="ckeditor/samples/css/samples.css">
    <link rel="stylesheet" href="ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
	<title>	ISESA</title>


<link rel="icon" type="image/x-icon" href="asset/images/icon1.png">
</head>
<body style="background-image: url('asset/images/bg.jpg'); background-repeat: no-repeat; background-size: cover; background-attachment: fixed; background-position: center; ">
<!-- bg-light -->
<?php include("navigation.php"); ?>


<div class="container" style="background-color: rgba(255, 250, 240, 0.6);">

<div class="container-fluid p-5 my-5 border" style="background-color: floralwhite; padding-top: 20px; ">
    <div class="row">
      <div class="col-12" style="background-color: floralwhite; ">
        <div class="profile_image">
        <h2>Services</h2>
        </div>
      </div>

      <div class="col-12">
        <form class="row g-3" action="servicesedit.php" method="POST" enctype="multipart/form-data">
        <div class="col-md-12">
          <textarea id="editor" name="services"></textarea>
        </div>
        <div class="col-md-12 ">
            <label for="file_post" class="form-label">Image<label style="color:red;">*</label></label>
            <input type="file" class="form-control" name="file_post" id="file_post">
          </div>
          <div>
            <button name="save_post" class="btn btn-primary" style="float: right;">Submit</button>
          </div>
        </form>
      </div>
      <?php

           $sql =mysqli_query($conn,"SELECT * FROM works where account_id = $account_id");

           while ($row=mysqli_fetch_array($sql)){ ?> 

            <div class="col-md-3" style="height: 250px;">
              <img src="asset/images/<?php echo $row['file_name'] ?>" width="100%" height="250px">
            </div>

           <?php }
      ?>
      </div>
  


  

<!-- post_events php code -->



<!-- end of posting events php code -->

  </div>

  </div>
   
</div>  

 


</div>





<script>

function displayImage(e) {
  if(e.files[0])
  {
    var reader = new FileReader();
    reader.onload = function(e){
      document.querySelector('#profileDisplay').setAttribute('asset/images',e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}
</script>

<script>
    initSample();
</script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>


</html>