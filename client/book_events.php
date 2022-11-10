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
    <link rel="stylesheet" type="text/css" href="asset/css/style.css">
	<title>	ISESA</title>
<link rel = "icon" href ="asset/images/icon1.png" type = "image/x-icon">


</head>
<body style="background-image: url('asset/images/bg.jpg'); background-repeat: no-repeat; background-size: cover; background-attachment: fixed; background-position: center; ">

<?php include('asset/include/navbar.php') ?>

<section style="padding: 5% 5% 0% 5% " >
  <div class="row justify-content-between">
    <h1 class="text-center pt-5" style="font-size: 4em;">BOOK SUPPLIES FOR YOUR EVENT</h1>
  </div>
<div class="container" >   
  <div class="row justify-content-between">
    <div class="col-5" style="background-color: rgba(255, 250, 240, 0.8);">
      <div class="table-responsive">
      <form action="" method="POST">
      <table class="table caption-top">
        <caption class="text-center" style="font-weight: bold;">Supplies on your List</caption>
        <thead>
          <tr>
            <th scope="col">Supplier</th>
            <th scope="col">Category</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        
        <tbody>
          <?php 
          $user_id = $_SESSION['account_id'];
          $sql =mysqli_query($conn, "SELECT accounts.account_id, accounts.supplier_title, supplies.supplies_category, supplies.description, supplies.sup_events, supplies.status, supplies.supplies_id FROM book_supplies INNER JOIN supplies ON book_supplies.supplies_id=supplies.supplies_id INNER JOIN accounts ON book_supplies.account_id=accounts.account_id WHERE book_supplies.user_id='$user_id'");
            while ($row=mysqli_fetch_array($sql))
            {
              

          ?>
         <tr>
          <td><?php echo $row['supplier_title']; ?></td>
          <td><?php echo $row['supplies_category']; ?></td>
          <td class="text-center">
            <a  data-bs-toggle="modal" data-bs-target="#viewsupply<?php echo $row['supplies_id'];?>">
              <i class="fa fa-eye" style="color: green"></i>
            </a>
            <a ><i class="fa fa-trash" style="color:red"></i>
      
            </a>
          </td>
                   <!-- Modal -->
          <div class="modal fade" style="text-align: left;" id="viewsupply<?php echo $row['supplies_id'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">View Supply</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
              <fieldset disabled>
                <label class="fw-bold" for="supplies_category" class="form-label">Category</label> <br>
                <label class="form-control" > <?php echo $row['supplies_category']; ?> </label>
              </div>
              <div class="mb-3">
                <label class="fw-bold" for="description" class="form-label">Description</label>
                <textarea class="form-control" rows="10" > <?php echo $row['description']; ?> </textarea>
              </div>
              <div class="mb-3">
                <label class="fw-bold" for="sup_events" class="form-label">Events</label>
                <label class="form-control" > <?php echo $row['sup_events']; ?> </label>
              </div>
              
              </fieldset>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  
                </div>
              </div>
            </div>
          </div>
           
         </tr>
         <tr>
<?php 
         }
           ?>
         </tr>
          
        </tbody>
      </table>
      
      </form>

    </div>

    </div>
    <div class="col-1" >
      
    </div>
    <div class="col-6 pt-2" style="background-color: rgba(255, 250, 240, 0.8);">
      <form action="" method="POST">
      <div class="mb-3">
        
        <label for="event" class="form-label" style="text-align:left; font-weight: bold;">Event</label>
        <input type="text" class="form-control" name="booked_event" id="event" required>
      </div>
      <div class="mb-3">
        <label for="event_date" class="form-label" style="text-align:left; font-weight: bold;">Event Date</label>
        <input type="date" class="form-control" name="event_date" id="event" required>
      </div>
    </div>
    
  </div>
</section>
           
<div class="container-fluid">
  
<div class="row justify-content-evenly">
    <div class="col-6 p-5">
     <div class="d-grid gap-2 d-md-block">
      <a class="btn btn-danger" type="button" href="supplies.php"><i class="fa fa-chevron-circle-left"></i> Back</a>
      <!-- <button class="btn btn-danger" type="button" href="supplies.php"> <i class="fa fa-chevron-circle-left"></i> Back</button>   -->
     </div>
    </div>
    <div class="col-6 p-5">
      <div class="d-grid gap-2  justify-content-md-end">
        <button class="btn btn-success" name="submit">  Book Supplies <i class="fa fa-chevron-circle-right"></i></button>
      </div>
    </form>
    </div>
    <?php 

    $user_id= $_SESSION['account_id'];
    $status = "Pending";
    if (isset($_POST['submit']))
    {
      $event = $_POST['booked_event'];
      $event_date = $_POST['event_date'];

      $sql = "SELECT book_id,account_id, supplies_id FROM `book_supplies` WHERE user_id='$user_id' ";
      $res = mysqli_query($conn, $sql);
      $check_res = mysqli_num_rows($res);

      if ($check_res > 0)
      {
        while($row=mysqli_fetch_array($res))
        {
          $book_id = $row['book_id'];
          $account_id = $row['account_id'];
          $supplies_id = $row['supplies_id'];






                  $sql = "INSERT INTO booked_supplies (`booked_event`, `event_date`, `book_id`, `user_id`, `account_id`, `supplies_id`,`status`,`res_id`) VALUES ('$event', '$event_date', '$book_id', '$user_id', '$account_id', '$supplies_id', '$status', $book_id )";

                  $result = mysqli_query($conn,$sql);
                  if ($result)
                  {
                    
                   echo "<script>
                              alert('Successfully Booked Supplies, Please wait for confirmation.'); 
                              window.location.href='book_event.php'
                              </script>";
                  }
                  echo "<script>
                            alert('We cannot book the supply for the moments, Try again later!'); 
                            window.location.href='supplies.php'
                        </script>";
                  
                  } 
          
        
      }





    }



     ?>

</div>

</div>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>


</html>