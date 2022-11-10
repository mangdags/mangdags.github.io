<?php 
session_start();
include("asset/include/config.php");


  if (!isset($_SESSION['account_id'])) {
   header("location:../index.php");
   die();

  }

  if (isset($_POST['accept']))
  {
      $supplier_id1 = $_SESSION['account_id'];
      $event_id = $_POST['event_id'];
      $status = $_POST['status'];

     $update_event = mysqli_query($conn, "UPDATE rent SET status='$status' WHERE event_id='$event_id' AND account_id='$supplier_id1'");
     if ($update_event) {
        echo "okay";
     }else
     {
        echo "not okay";
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
    <link rel="stylesheet" type="text/css" href="asset/css/style.css">
	<title>	ISESA</title>
<link rel = "icon" href ="asset/images/icon1.png" type = "image/x-icon">


</head>
<body style="background-image: url('asset/images/bg.jpg'); background-repeat: no-repeat; background-size: cover; background-attachment: fixed; background-position: center; ">

<?php include('navigation.php') ?>

 <section style="padding: 5% 5% 0% 5% ">
        <div class="row justify-content-between">
        <h1 class="text-center pt-5" style="font-size: 4em;">APPROVED SUPPLIES</h1>
            <div class="table-responsive">
                <table  class="table" style="background-color: rgba(255, 250, 240, 0.8);">
                    <thead class="table-danger text-center">
                        <tr>
                            <th>Event</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>View</th>

                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php 

                            $user_id = $_SESSION['account_id'];
                            $view_rent= mysqli_query($conn, "SELECT req_event.event_id, req_event.request_event , req_event.event_date, rent.status, accounts.supplier_title FROM rent INNER JOIN req_event on rent.event_id=req_event.event_id INNER JOIN accounts ON rent.account_id=accounts.account_id WHERE rent.status='Rented' AND rent.account_id='$user_id' GROUP BY req_event.request_event, req_event.event_date;");
                   
                         while($view_rent_row = mysqli_fetch_array($view_rent))
                            {
                                $event = $view_rent_row['request_event'];
                                $date= $view_rent_row['event_date'];
                                $status = $view_rent_row['status'];
                                $event_id = $view_rent_row['event_id'];

                               

                        ?>

                        <tr>
                            
                            <td><?php echo $event ?></td>
                            <td><?php echo $date ?></td>
                            <td><?php echo $status ?></td>
                            <td><a data-bs-toggle="modal" data-bs-target="#viewsupply<?php echo $event_id;?>" ><i class="fa fa-eye" style="color:green;"></i></a></td>
                           
                        </tr>



                        <?php
                        $supplier_id = $_SESSION['account_id'];
                         $view_supply = mysqli_query($conn, "SELECT rent.rent_id , req_event.event_id, GROUP_CONCAT(supplies.supplies_category SEPARATOR '<br>') as supplies_category, supplies.supplies_id, req_event.request_event, req_event.event_date, supplies.status FROM rent INNER JOIN req_event on rent.event_id=req_event.event_id INNER JOIN supplies ON rent.supplies_id=supplies.supplies_id WHERE req_event.event_id='$event_id' AND rent.account_id='$supplier_id'; ");
                                    while($view_supply_row=mysqli_fetch_array($view_supply))
                                {
                                    $modal_event = $view_supply_row['request_event'];
                                    $modal_date = $view_supply_row['event_date'];
                                    $modal_supplies_category =$view_supply_row['supplies_category'];
                                    $modal_supplies_status =$view_supply_row['status'];


                        ?>
                                       <!-- Modal -->
              
                              <div class="modal fade" id="viewsupply<?php echo $event_id;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="staticBackdropLabel">View Supply</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="POST">
                                      <div class="mb-3">
                                  <fieldset disabled>
                                    <label class="fw-bold" for="supplier_title" class="form-label">Event</label> <br>

                                    <label class="form-control" > <?php echo $modal_event; ?> </label>

                                  </div>
                                  <div class="mb-3">
                                    <label class="fw-bold" for="description" class="form-label">Date</label>
                                    <label class="form-control" > <?php echo $modal_date; ?> </label>
                                  </div>
                                  <div class="mb-3">
                                    <label class="fw-bold" for="sup_events" class="form-label">Supplies</label>
                                    <label class="form-control" > <?php echo $modal_supplies_category; ?> </label>
                                  </div>
                                  </fieldset>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </form>
                        <!-- End Modal -->



              

                        
                        <?php
                                
                            }

                        




                 }

                         ?>
                    </tbody>
                </table>
            </div>
      
        </div>
    </section>




 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>


</html>