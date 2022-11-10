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
	<title>	ISESA</title>
<link rel = "icon" href ="asset/images/icon1.png" type = "image/x-icon">
<link rel="stylesheet" type="text/css" href="asset/css/style.css">

</head>
<body style="background-image: url('asset/images/bg.jpg'); background-repeat: no-repeat; background-size: cover; background-attachment: fixed; background-position: center; ">

<?php include('asset/include/navbar.php'); ?>

    <section style="padding: 5% 5% 0% 5% ">
        <div class="row justify-content-between">
        <h1 class="text-center pt-5" style="font-size: 4em;">MY EVENTS</h1>
            <div class="table-responsive">
                <table  class="table" style="background-color: rgba(255, 250, 240, 0.8);">
                    <thead class="table-danger text-center">
                        <tr>
                            <th>Event</th>
                            <th>Date</th>
                            <th>View</th>

                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php 

                            $view_rent= mysqli_query($conn, "SELECT req_event.event_id, req_event.request_event , req_event.event_date, rent.status FROM rent INNER JOIN req_event on rent.event_id=req_event.event_id GROUP BY req_event.request_event, req_event.event_date");
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
                            <td><a data-bs-toggle="modal" data-bs-target="#viewsupply<?php echo $event_id;?>" ><i class="fa fa-eye" style="color:green;"></i></a></td>
                        </tr>



                        <?php
                         $view_supply = mysqli_query($conn, "SELECT rent.rent_id , req_event.event_id, GROUP_CONCAT(supplies.supplies_category SEPARATOR '<br>') as supplies_category, req_event.request_event, req_event.event_date, GROUP_CONCAT(rent.status SEPARATOR '<br>') as status FROM rent INNER JOIN req_event on rent.event_id=req_event.event_id INNER JOIN supplies ON rent.supplies_id=supplies.supplies_id WHERE req_event.event_id='$event_id' ");
                                    while($view_supply_row=mysqli_fetch_array($view_supply))
                                {
                                    $event_id = $view_supply_row['event_id'];
                                    $modal_event = $view_supply_row['request_event'];
                                    $modal_date = $view_supply_row['event_date'];
                                    $modal_supplies_category =$view_supply_row['supplies_category'];
                                    $modal_status = $view_supply_row['status'];

                                    $view_status = mysqli_query($conn, "SELECT GROUP_CONCAT(supplies.supplies_category SEPARATOR '<br>') as supplies_category FROM rent INNER JOIN supplies ON rent.supplies_id=supplies.supplies_id WHERE rent.event_id='$event_id' AND rent.status='Rented';");
                                    while($status_row = mysqli_fetch_array($view_status))
                                    {
                                        $rented_category = $status_row['supplies_category'];

                                    $view_status1 = mysqli_query($conn, "SELECT GROUP_CONCAT(supplies.supplies_category SEPARATOR '<br>') as supplies_category FROM rent INNER JOIN supplies ON rent.supplies_id=supplies.supplies_id WHERE rent.event_id='$event_id' AND rent.status='Pending';");
                                    while($status_row1 = mysqli_fetch_array($view_status1))
                                    {
                                        $available_category = $status_row1['supplies_category'];


                                    $view_status2 = mysqli_query($conn, "SELECT GROUP_CONCAT(supplies.supplies_category SEPARATOR '<br>') as supplies_category FROM rent INNER JOIN supplies ON rent.supplies_id=supplies.supplies_id WHERE rent.event_id='$event_id' AND rent.status='Rejected';");
                                    while($status_row2 = mysqli_fetch_array($view_status2))
                                    {
                                        $rejected_category = $status_row2['supplies_category'];




                                    


                                    


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
                                    <label class="fw-bold" for="status" class="form-label">Supplier</label>
                                     <label class="form-control" >

                                        <p><?php echo  $available_category ?></p>
                                        <p style="color:green;"><?php echo  $rented_category ?></p>
                                        <p style="color:red;"><?php echo  $rejected_category ?></p>
                                     </label>

                                    
                                  </div>
                                  <div class="mb-3">
                                    <label style="font-size:12px; font-weight: bold;">Color Indicators:</label>
                                    <p style="font-size:12px;">Pending <label style="color:green;">Confirmed</label> <label style="color:red;">Rejected</label></p>
                                    


                                    
                                  </div>
                                  
                                  </fieldset>
                                    </div>
                                    <div class="modal-footer">
                                      
                                      
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
                    </tbody>
                </table>
            </div>
      
        </div>
    </section>




 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>


</html>