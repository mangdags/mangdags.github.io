<?php 
session_start();
include("asset/include/config.php");


  if (!isset($_SESSION['account_id'])) {
   header("location:../index.php");
   die();
  }
$connect = mysqli_connect("localhost", "root", "123", "isesadb");
function make_query($connect)
{
 $query = "SELECT * FROM feature_events ORDER BY f_events_id ASC";
 $result = mysqli_query($connect, $query);
 return $result;
}

function make_slide_indicators($connect)
{
 $output = ''; 
 $count = 0;
 $result = make_query($connect);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="'.$count.'" class="active"></li>
   ';
  }
  else
  {
   $output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="'.$count.'"></li>
   ';
  }
  $count = $count + 1;
 }
 return $output;
}

function make_slides($connect)
{
 $output = '';
 $count = 0;
 $result = make_query($connect);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '<div class="item active">';
  }
  else
  {
   $output .= '<div class="item">';
  }
  $output .= '
   <img src="../uploads/'.$row["f_images"].'" alt="'.$row["f_events_desc"].'" />
   <div class="carousel-caption">
    <h3 class="text-warning shadow-lg bg-white p-3">'.$row["f_events_desc"].'</h3>
   </div>
  </div>
  ';
  $count = $count + 1;
 }
 return $output;
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
      <h3 class="text-center">Reserved</h3>
   <div class="p-4 table-responsive" >
        <table id="example" class="table bg-white table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Supplier</th>
                <th>Title</th>
                <th>Price</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php
            $query = "SELECT * FROM offer INNER JOIN customeravail ON offer.offer_id=customeravail.offer_id INNER JOIN accounts ON offer.account_id=accounts.account_id WHERE customeravail.account_id='".$_SESSION['account_id']."'";
            $result = mysqli_query($connect, $query);
            $id = 1;
            while($row = mysqli_fetch_array($result)){
          ?>
           
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $row['firstname']." ".$row['lastname'] ?></td>
                <td><?php echo $row['title'] ?></td>
                <td><?php echo $row['price'] ?></td>
                <td><?php echo $row['status'] ?></td>
                <td>
                  <?php
              if ($row['status'] == 'Approved') { ?>
                <a href="print_invoice.php?customeravail_id=<?php echo $row['customeravail_id'] ?>" target="_blank" class="btn btn-success btn-sm">Print</a>
              <?php }
              ?>
                </td>
            </tr>
          <?php $id++; } ?>
        </tbody>
    </table>
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