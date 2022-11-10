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

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<title>	ISESA</title>


<link rel="icon" type="image/x-icon" href="asset/images/icon1.png">
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
<!-- bg-light -->
<?php include("navigation.php"); ?>


<div class="container" style="background-color: rgba(255, 250, 240, 0.6);">

<div class="container-fluid p-5 my-5 border" style="background-color: floralwhite; padding-top: 20px; ">
    <div class="row">
      <div class="col-12" style="background-color: floralwhite; ">
        <div class="profile_image">
        <h2>Offer</h2>
        </div>
      </div>


      </div>
      <a href="offerform.php" class="btn btn-primary btn-sm rounded-0">Add Offer</a>

      <div class="mt-5 table-responsive">
        <table id="example" class="table border">
        <thead>
          <tr>
            <th>Title</th>
            <th>Price</th>
            <th>Image</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            <?php
           $sql =mysqli_query($conn,"SELECT * FROM offer where account_id = $account_id");
           while ($row=mysqli_fetch_array($sql)){ ?> 
          <tr>
            <td><?php echo $row['title'] ?></td>
            <td><?php echo $row['price'] ?></td>
            <td><img src="asset/images/<?php echo $row['file_name'] ?>" width="100"></td>
            <td><a href="offerform.php?offer_id=<?php echo $row['offer_id'] ?>" class="btn btn-success btn-sm">Edit</a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      </div>

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
  <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
 <script type="text/javascript">
   $(document).ready(function() {
    $('#example').dataTable();
} );

 </script>
</body>


</html>