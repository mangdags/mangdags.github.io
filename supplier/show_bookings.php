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
        
        <thead>
          <tr>
            <th class="text-center">Supplies</th>
            
          </tr>
        </thead>
        
        <tbody>
          <?php 
          $user_id = $_SESSION['account_id'];
          $sql =mysqli_query($conn, "SELECT booked_supplies.booked_event, booked_supplies.event_date, booked_supplies.status FROM booked_supplies INNER JOIN supplies ON booked_supplies.supplies_id=supplies.supplies_id WHERE booked_supplies.account_id='$user_id' GROUP BY booked_supplies.event_date, booked_supplies.booked_event");
            while ($row=mysqli_fetch_array($sql))
            {
              
              $event = $row['booked_event'];
              $date = $row['event_date'];

              $sql1 = mysqli_query($conn, "SELECT supplies.supplies_category as category FROM booked_supplies INNER JOIN supplies ON booked_supplies.supplies_id=supplies.supplies_id WHERE booked_supplies.booked_event='$event' AND booked_supplies.event_date='$date' AND 
                booked_supplies.account_id='$user_id';");

             
              while($row_event=mysqli_fetch_array($sql1))
              {

          ?>
         <tr>
          
          <td><?php echo $row_event['category']; ?></td>
           
         </tr>
         <tr>
<?php 
         }
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
      <?php 

      $get_id = $_SESSION['account_id'];
      $sql = mysqli_query($conn, "SELECT * FROM booked_supplies WHERE account_id='$user_id'");
      while($row= mysqli_fetch_array($sql))




      {
         $query = mysqli_query($conn, "SELECT booked_supplies.booked_event, booked_supplies.event_date, booked_supplies.status FROM ")

       ?>
      <form action="" method="POST">
      <div class="mb-3">
        <label for="event" class="form-label" style="text-align:left; font-weight: bold;">Event</label>
        <input type="text" class="form-control" name="booked_event" id="event" value=" <?php echo $row['booked_event']; ?>"required>
      </div>
      <div class="mb-3">
        <label for="event_date" class="form-label" style="text-align:left; font-weight: bold;">Event Date</label>
        <input type="date" class="form-control" name="event_date" id="event" value="<?php echo $row['event_date']; ?>" required>
      </div>
      <div class="mb-3">
        <label for="status" class="form-label" style="text-align:left; font-weight: bold;">Status Date</label>
        <input type="date" class="form-control" name="status" id="status" value="<?php echo $row['status']; ?>" required>

      </div>
    </div>
    <?php } ?>
  </div>
</section>
           
<div class="container-fluid">
  
<div class="row justify-content-evenly">
    <div class="col-5 p-5">
     <div class="d-grid gap-2 d-md-block">
      <a class="btn btn-danger" type="button" href="pending_bookings.php"><i class="fa fa-chevron-circle-left"></i> Back</a>
      <!-- <button class="btn btn-danger" type="button" href="supplies.php"> <i class="fa fa-chevron-circle-left"></i> Back</button>   -->
     </div>
    </div>
    <div class="col-6 p-5">
      <div class="d-grid gap-2  justify-content-md-end">
        
      </div>
    </form>
    </div>
    

</div>

</div>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>


</html>