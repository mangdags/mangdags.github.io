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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

/* Approved Supplier Navbar */
div#approvedSupplier_filter,div#approvedSupplier_paginate{
  float: right;
}

div#approvedSupplier_filter label {
    display: flex;
    place-items: center;
    margin-bottom: 10px;
}

input.form-control.input-sm {
    border-radius: unset;
    padding: unset;
}

div#approvedSupplier_length label {
  display: flex !important;
}

li#approvedSupplier_previous,li#approvedSupplier_next{
  width: 80px;
  text-align: center;
}
/* END */

</style>
  <body>
    <body style="background-image: url('asset/images/bg.jpg'); background-repeat: no-repeat; background-size: cover; background-attachment: fixed; background-position: center; ">

      <?php include('asset/include/navigation.php') ?>


      <div class="p-5 container" style="margin-top: 10%; background-color: floralwhite;">
        <h3>Pending Suppliers</h3>
    <div class="p-5 table-responsive rounded" style="background-color: rgba(255, 250, 240, 0.8);">
        <table id="example" class="table bg-white table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Address</th>
                <th>Contact Number</th>
                <th>Supplier/Business Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php
            $query = "SELECT * FROM accounts WHERE account_type = 'supplier' AND account_status = 'Pending'";
            $result = mysqli_query($conn, $query);
            $id = 1;
            while($row = mysqli_fetch_array($result)){
          ?>
           
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $row['firstname'] ?></td>
                <td><?php echo $row['lastname'] ?></td>
                <td><?php echo $row['address'] ?></td>
                <td><?php echo $row['contact_number'] ?></td>
                <td><?php echo $row['supplier_title'] ?></td>
                <td><?php echo $row['account_status'] ?></td>
                <td>
                  <button class="btn btn-success btn-sm rounded-0 approval" value="<?php echo $row['account_id'] ?>" data-bs-toggle="modal" data-bs-target="#approvalclient">Approval</button>
                </td>
            </tr>
          <?php $id++; } ?>
        </tbody>
    </table>
      </div>
      
      <h3>Approved Suppliers</h3>
    <div class="p-5 table-responsive rounded" style="background-color: rgba(255, 250, 240, 0.8);">
      <form method="POST">
        <label>Select a Category</label>
        <select name="Category" id = "Category">
            <?php
              $notif_id = $_GET['id'];
              $notif_query = "UPDATE notifications SET status = 'read' WHERE notif_id = $notif_id";
              performQuery($notif_query);

              $query_category = "SELECT * FROM category";
              $result_category = mysqli_query($conn, $query_category);

              while ($category = mysqli_fetch_array($result_category,MYSQLI_ASSOC)):;
            ?>
                <option value="<?php echo $category["Category_ID"]; ?>">
                    <?php echo $category["Category_Name"]; ?>
                </option>
            <?php
                endwhile;
            ?>
        </select>
        <input type="submit" value="Submit" name="sort_category">
    </form>
    <br>

        <table id="approvedSupplier" class="table bg-white table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Address</th>
                <th>Contact Number</th>
                <th>Supplier/Business Name</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
          <?php
            if(isset($_POST['Category'])) {
              $index = $_POST['Category'];
            } else {
              $index = 1;
            }

            $qry = "SELECT Category_Name FROM category WHERE Category_ID = $index";
            $selected_category = mysqli_query($conn, $qry);
            if($index == 1) {
              $qry_selected_category = "SELECT * FROM accounts WHERE account_type = 'supplier' AND account_status = 'Approved'";
            } else {
              if($row = $selected_category->fetch_assoc()) {
                $category = $row['Category_Name'];
              }
              $qry_selected_category = "SELECT * FROM accounts WHERE account_type = 'supplier' AND category = '$category'";
            }

            if(isset($_POST['sort_category'])){
                $query_approved_suppliers = $qry_selected_category;
                $result = mysqli_query($conn, $query_approved_suppliers);
                $id = 1;
            }
            
            while($row = mysqli_fetch_array($result)){
          ?>
           
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $row['firstname'] ?></td>
                <td><?php echo $row['lastname'] ?></td>
                <td><?php echo $row['address'] ?></td>
                <td><?php echo $row['contact_number'] ?></td>
                <td><?php echo $row['supplier_title'] ?></td>
                <td><?php echo $row['category'] ?></td>
            </tr>
          <?php $id++; } ?>
        </tbody>
    </table>
      </div>
</div>

<div class="modal fade" id="approvalclient" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Approve Client </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form class="row g-3" action="approvalclient.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">          
          <div class="col-md-12 ">
            <input type="hidden" class="form-control" name="account_id" id="account_id" required>
            <h5>Are you sure you want to approve supplier?</h5>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
     <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
 <script type="text/javascript">
   $(document).ready(function() {
    $('#example').dataTable();
    $('#approvedSupplier').dataTable();
} );


$('.approval').click(function(){
  $('#account_id').val($(this).val())

})

 </script>
  </body>
</html>