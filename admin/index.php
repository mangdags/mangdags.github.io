<?php   
include("asset/include/config.php");
session_start();


if (isset($_POST['login']))
{
    $email = $_POST['email'];
    $pwd = $_POST['pword'];
    $pword = md5($pwd);

    $select = mysqli_query($conn, "SELECT * FROM accounts WHERE email='$email' AND pwd='$pword'");
    $result = mysqli_num_rows($select);
    if($result > 0)
    {
        while($row=mysqli_fetch_array($select))
        {
            if($row['account_type']== "Admin")
            {
              $_SESSION['account_id'] = $row['account_id'];
              $_SESSION['firstname'] = $row['firstname'];
              $_SESSION['lastname'] = $row['lastname'];

              header("location:home.php");
            }
        }
    }
    else
    {
        echo "<script>
        alert('Please Enter Valid Credentials!');
        window.location.href='index.php'
        </script>
        ";
    }
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
    <title> ISESA</title>

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
<body style="background-image: url('asset/images/bg.jpg'); background-repeat: no-repeat; background-size: cover; background-attachment: fixed; background-position: center; ">

<?php include("asset/include/navbar.php"); ?>



<!-- Modal -->
<div class="modal fade" id="loginmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Log in your account </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

<form class="row g-3" action="" method="POST">
<div class="col-md-12 ">
  <label for="email" class="form-label">Email<label style="color:red;">*</label></label>
  <input type="email" class="form-control" name="email" id="email" required>
  
</div>
<div class="col-md-12">
  <label for="pword" class="form-label">Password<label style="color:red;">*</label></label>
  <input type="password" class="form-control" name="pword" id="pword" required>
</div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button name="login" class="btn btn-primary">Submit</button>
         
      </div>
</form>
    </div>
  </div>
</div>


<div class="container" style="margin-top: 20%;">
    <div class="text-center">
        <p class="outline" style="font-size:6em; font-weight:bold; background-color: floralwhite;" >
            WELCOME ADMIN
        </p>

        
    </div>
</div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>


</html>