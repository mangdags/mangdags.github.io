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
        <img src="asset/images/default_img.png" class="img-fluid rounded-circle" >
        <div class="image">
                <label for="file" id="file">
          <i class="fa fa-camera" style="cursor: pointer; "></i>
          <input type="file" id="file" hidden>
        </label>
        </div>
        </div>


      </div>
  </div>
  
  <div class="row">
      <div class="col-12" style="background-color: floralwhite; ">
      <h1 class="text-center text-capitalize"><?php echo $_SESSION['firstname'] ?> <?php echo $_SESSION['lastname'] ?></h1>        
      </div>
  </div>

  <div class="row bg-light rounded" >
    <div class="col-4 " >
          
<?php 

           $sql =mysqli_query($conn,"SELECT * FROM accounts where account_id = $account_id");

           while ($row=mysqli_fetch_array($sql))
           {
              $email = $row['email'];
              $contact_number = $row['contact_number'];

              ?>
              <div class="form-group">
              <label for="exampleFormControlTextarea1" style="font-weight: bold; padding-top: 10px;">Details</label> <br> <br>
              <label for="exampleFormControlTextarea1" style="font-family: Arial, Helvetica, sans-serif;"><a href="tel:<?php echo $contact_number ?>"><i class="fa fa-phone"></i><?php echo $row['contact_number'];?></a></label> <br>
              <label for="exampleFormControlTextarea1" style="font-family: Arial, Helvetica, sans-serif;"><a href="mailto:<?php echo $email ?>"><i class="fa fa-envelope"></i><?php echo $row['email'];?></a></label> <br>
              <label for="exampleFormControlTextarea1" style="font-family: Arial, Helvetica, sans-serif;"><i class="fas fa-map-marker-alt"></i> <?php echo $row['address'];?></label> <br><br>


              <label for="exampleFormControlTextarea1" style="font-weight: bold; padding-top: 10px;">Galleries</label>
              </div>

               <?php      }



           ?>




      </div>
      
      <div class="col-8 " >
        <form action="test.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
              <label for="exampleFormControlTextarea1" style="font-weight: bold; padding-top: 10px;">Post</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" name="post_description"></textarea>
              <!-- <img src=""  id="profileDisplay" onclick="triggerClick()" onchange="displayImage(this)"> -->
              
          </div>
         
              <div class="col-4">
               
                <label for="file_post" ><i class="fa fa-photo">Photo</i> / <i class="fa fa-video">Video</i></label>
                <input type="file" id="file_post" name="file_post" hidden>
              </div>
              <div class="col-4 ">
                <button name="save_post" class="btn btn-primary btn-sm" style="margin-left: 170%;">POST</button>
              </div>
               <br><br>
            
          </div>
            </form>
      </div>
  

<!-- post_events php code -->



<!-- end of posting events php code -->

  </div>

  </div>
   
</div>  

 


</div>


<div class="modal fade" id="approvalclient" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Event </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">          
          <div class="col-md-12 ">
            <?php 

           $sql =mysqli_query($conn,"SELECT * FROM manage_events");
           $row=mysqli_fetch_array($sql);
              ?>
              <img src="<?php echo $row['f_images'] ?>" width="100%">
              <div style="margin-top: 20px;"><?php echo $row['f_events_desc'] ?></div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

 <script type="text/javascript">
   var myModal = new bootstrap.Modal(document.getElementById("approvalclient"));
  myModal.show();

 </script>>
</body>


</html>