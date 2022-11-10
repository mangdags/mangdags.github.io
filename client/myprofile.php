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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>	ISESA</title>
<link rel = "icon" href ="asset/images/icon1.png" type = "image/x-icon">
<link rel="stylesheet" type="text/css" href="asset/css/style.css">

</head>
<style>
  div#example_filter,div#example_paginate{
    float: right;
  }
  .pagination{
    margin: unset !important;
  }
  select.input-sm{
    line-height: unset !important;
  }
  li#example_previous,li#example_next,li.paginate_button{
    border: 1px solid rgba(0,0,0,0.2);
    
  }
  li#example_previous a,li#example_next a,li.paginate_button a{
    text-decoration: none !important;
    color: #000;
  }
  div#example_filter label {
    display: flex;
    place-items: center;
    margin-bottom: 10px;
}
input.form-control.input-sm {
    border-radius: unset;
    padding: unset;
}
  div#example_length label {
    display: flex !important;
}
select.form-control.input-sm {
    width: 50px;
    padding: unset;
    text-align: center;
    border-radius: unset;
    margin: 0px 5px;
}

  li#example_previous,li#example_next{
    width: 80px;
    text-align: center;
  }
  li.paginate_button{
    width: 30px;
    text-align: center;
  }
</style>
<body style="background-image: url('asset/images/bg.jpg'); background-repeat: no-repeat; background-size: cover; background-attachment: fixed; background-position: center; ">

<?php include('asset/include/navbar.php'); ?>





<div class="container mt-5 pt-5">

    <div class="p-5 rounded" style="background-color: rgba(255, 250, 240, 0.8);">
      <h3 class="text-center">My Profile</h3>
   <div class="p-4">
         <?php
         if (isset($_SESSION['account_id'])) {
          $query = "SELECT * FROM accounts WHERE account_id='".$_SESSION['account_id']."'";
          $result = mysqli_query($conn, $query);
          $row = mysqli_fetch_array($result);
         }
          ?>

          <form method="POST" action="profileedit.php">
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label>Firstname</label>
  <input type="text" name="firstname" class="form-control" value="<?php if (isset($_SESSION['account_id'])) { echo $row['firstname']; } ?>">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label>Lastname</label>
              <input type="text" name="lastname" class="form-control" value="<?php if (isset($_SESSION['account_id'])) { echo $row['lastname']; } ?>">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label>Contact</label>
              <input type="text" name="contact_number" class="form-control" value="<?php if (isset($_SESSION['account_id'])) { echo $row['contact_number']; } ?>">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" class="form-control" value="<?php if (isset($_SESSION['account_id'])) { echo $row['email']; } ?>">
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group">
              <label>Address</label>
              <input type="text" name="address" class="form-control" value="<?php if (isset($_SESSION['account_id'])) { echo $row['address']; } ?>">
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group">
              <label>Category</label>
              <select type="text" name="category" class="btn w-100 border bg-white" style="text-align: left;" required>

                <?php if (isset($_SESSION['account_id'])) { ?>
                  <option value="<?php echo $row['category'] ?>"><?php echo $row['category'] ?></option>
                <?php }else{ ?>
                  <option value="">Select</option>
                <?php } ?>"

                <option value="Wedding">Wedding</option>
                <option value="Birthday">Birthday</option>
                <option value="Party">Party</option>
              </select>
            </div>
          </div>
          <div class="col-lg-12 mt-3" style="text-align: right;">
            <div class="form-group">
              <button type="submit" class="btn btn-dark">Submit</button>
            </div>
          </div>
        </div>
      </form>

    </div>
      
</div>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
 <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
 <script type="text/javascript">
   $(document).ready(function() {
    $('#example').dataTable();
} );

 </script>
</body>


</html>