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
  <div class="row justify-content-between ">
    <h1 class="text-center pt-5" style="font-size: 4em; font-weight: bold;">BOOK YOUR EVENT</h1>
  </div>

<div class="container"  >
<div class="row">
    <div class="col-5" style="background-color: rgba(255, 250, 240, 0.8);">
      <form action="" method="POST">  
        <div class="mb-3 pt-5">
          <label for="request_event" class="form-label">Event</label>
          <input type="text" class="form-control" id="request_event" name="request_event" required>
        </div>
        <div class="mb-3 pb-5">
          <label for="event_date" class="form-label">Event Date</label>
          <input type="date" class="form-control" name="event_date" id="event_date" required>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-center pb-5">
        <button class="btn btn-warning" name="submit"> <i class="fa fa-calendar"></i> Create Event</button>
        </form>
        </div>
      </div>
       
      <div class="col-1">



      </div>

      <div class="col-6" style="background-color: rgba(255, 250, 240, 0.8);">
        <div class="table-responsive">
        <table class="table table-hover">
          <thead>


            <tr>
              <th>Select</th>
              <th>Category</th>
              <th>Supported Events</th>
              <th>View</th>
              
            </tr>
          </thead>
          <tbody class="table table-hover">
                       <?php 
                       $current_date = date("Y-m-d");
                if(isset($_POST['submit']))
                    {
                      $lower_event = strtolower($_POST['request_event']);
                      $request_event = ucfirst($lower_event);
                      $event_date = $_POST['event_date'];
                      $user_id = $_SESSION['account_id'];


                      $event_exist = mysqli_query($conn, "SELECT * FROM req_event WHERE request_event = '$request_event' AND event_date='$event_date' AND account_id='$user_id' ");
                      $event_exist_row = mysqli_num_rows($event_exist);

                      if($event_exist_row)
                          {
                            echo "<script> 
                                      alert('Your event trying to create is already existed with the same date, Please create another!');
                                      window.location.href='book_event.php'

                                  </script>";
                          }elseif($event_date <= $current_date)
                          {
                            echo "<script>
                                      alert ('The event date your trying to create is today or already passed, Please make it sure that you book your event ahead of time. Thank you!');
                                  </script";
                          }
                          else
                          {
                            $insert_new_event = mysqli_query($conn,"INSERT INTO req_event (request_event, event_date, account_id) VALUES ('$request_event', '$event_date', '$user_id')");

                            if($insert_new_event)
                                {
                                  echo "<script>
                                              alert('Event Succesfully Created, Please select your suppplies now');
                                        </script>";


                                    $display_event = mysqli_query($conn, "SELECT * FROM req_event WHERE request_event='$request_event' AND event_date='$event_date' AND account_id='$user_id'");
                                    while($display_event_row=mysqli_fetch_array($display_event))
                                    {
                                      
                                      $ds_event = $display_event_row['request_event'];
                                      $ds_supply = mysqli_query($conn, "SELECT accounts.account_id, accounts.supplier_title, supplies.sup_events, supplies.supplies_id, supplies.supplies_category, supplies.description, supplies.status FROM supplies INNER JOIN accounts ON supplies.account_id=accounts.account_id WHERE supplies.status='Available' AND Supplies.sup_events LIKE '%$ds_event%'");

                                        while($ds_supply_row = mysqli_fetch_array($ds_supply))
                                        {

                                          ?>
                                           <form action="" method="POST">
                                          <tr>
                                           
                                            <td>
                                              <input type="checkbox" name="supplies_id[]" value="<?php echo $ds_supply_row['supplies_id']; ?>" >
                                              <input type="text" name="" value="<?php echo $ds_supply_row['supplies_id']; ?>" hidden>
                                              <input type="text" name="event_id" value="<?php echo $display_event_row['event_id']; ?>" hidden>
                                              <input type="text" name="account_id[]" value="<?php echo $ds_supply_row['account_id']; ?>" hidden>
                                            </td>

                                            

                                            <td><?php echo $ds_supply_row['supplies_category']; ?></td>
                                            <td><?php echo $ds_supply_row['sup_events']; ?></td>
                                            <td><a data-bs-toggle="modal" data-bs-target="#viewsupply<?php echo $ds_supply_row['supplies_id'];?>" ><i class="fa fa-eye" style="color:green;"></i></a></td>
                                          </tr>

                        <!-- Modal -->
                              
                              <div class="modal fade" id="viewsupply<?php echo $ds_supply_row['supplies_id'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="staticBackdropLabel">View Supply</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="mb-3">
                                  <fieldset disabled>
                                    <label class="fw-bold" for="supplier_title" class="form-label">Category</label> <br>
                                    <input type="text" name="supplies_id" value="<?php echo $ds_supply_row['supplies_id']; ?>" hidden>

                                    <label class="form-control" > <?php echo $ds_supply_row['supplies_category']; ?> </label>
                                    

                                  </div>
                                  <div class="mb-3">
                                    <label class="fw-bold" for="description" class="form-label">Description</label>
                                    <textarea class="form-control" rows="5" > <?php echo $ds_supply_row['description']; ?> </textarea>
                                  </div>
                                  <div class="mb-3">
                                    <label class="fw-bold" for="status" class="form-label">Status</label>
                                    <label class="form-control" > <?php echo $ds_supply_row['status']; ?> </label>
                                  </div>
                                  <div class="mb-3">
                                    <label class="fw-bold" for="terms_condition" class="form-label">Terms and Conditions</label>
                                    <label class="form-control" > here is the data from database </label>
                                  </div>
                                
                                  </fieldset>
                                    </div>
                                    <div class="modal-footer">
                                      <div class="d-grid gap-2 d-md-block">
                                        <a class="btn btn-primary" href="view_supplier.php?id=<?php echo  $ds_supply_row['account_id']; ?>" role="button">View Supplier</a>
                                      </div>
                                   
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              
                        <!-- End Modal -->

                                          <?php
                                        }

                                    }
                                }

                          }
                    }



             ?>
              <tr>
                <td class="pt-5">    
                    <button class="btn btn-warning" name="rent" style="font-weight: bold;"> Rent Supplies</button>
                </td>
              </tr>
            </form>


          </tbody> 
        </table>
    </div>
    </div>

  </div>

</div>

</section>
<?php 

    if(isset($_POST['rent']))

      {
        $new_supplies_id= $_POST['supplies_id'];
        $new_event_id = $_POST['event_id'];
        $new_account_id = $_POST['account_id'];
        $user_id = $_SESSION['account_id'];

        foreach($new_supplies_id as $get_suppplies_id)
        {


          $choose_account = mysqli_query($conn, "SELECT accounts.account_id, supplies.supplies_id FROM supplies INNER JOIN accounts ON supplies.account_id=accounts.account_id WHERE supplies.supplies_id='$get_suppplies_id'");
          while($choose_account_row=mysqli_fetch_array($choose_account))
          {
                $get_account_id = $choose_account_row['account_id'];

              $insert_rented_supplies = mysqli_query($conn, "INSERT INTO rent (event_id, supplies_id, account_id, user_id, status) VALUES ('$new_event_id', '$get_suppplies_id', '$get_account_id', '$user_id', 'Pending')");
              if($insert_rented_supplies)
              {
                echo "<script> 
                          alert('Succesfully Rented Supplies, Please wait for confirmation.');
                          window.location.href='my_event.php'
                      </script>";
              }
              else
              {
                echo "<script> 
                          alert('There is an error in renting supplies, Please try again');
                          window.location.href='book_event.php'
                      </script>";

              }
          }

        }
      }
 ?>



 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>


</html>