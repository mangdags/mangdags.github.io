<?php 
session_start();
include("asset/include/config.php");
include("asset/include/session.php");
$account_id= $_SESSION['account_id'];

if (isset($_POST['save']))
{

	$supplies_category = $_POST['supplies_category'];
	$description = $_POST['description'];
	$sup_events = $_POST['sup_events'];
	$sup_events1 = implode(	",", $sup_events);


	$sql="INSERT INTO supplies (supplies_category, description,sup_events, status, account_id) VALUES ('$supplies_category', '$description', '$sup_events1', 'Available', '$account_id')";
	if(mysqli_query($conn, $sql))
	{
		
		echo "<script>
				alert('New Supply Added Succesfully!'); 
				window.location.href='supplies.php'
			  </script>";
			 
	}else
	{
		
		echo "<script>
				alert('Cannot Add Supply, Try Again!'); 
				window.location.href='supplies.php'
			  </script>";
	

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


<link rel="icon" type="image/x-icon" href="asset/images/icon1.png">
</head>
<body style="background-image: url('asset/images/bg.jpg'); background-repeat: no-repeat; background-size: cover; background-attachment: fixed; background-position: center; ">
<!-- bg-light -->
<?php include("navigation.php") ?>

<div style="padding-top: 10%;">

<section class="p-5" >
	 <div class="row justify-content-between">
    	<div class="col-10">
     	<h1 class="pb-2">SUPPLIES</h1>
    	</div>
	    <div class="col-2">
	      <div class="modal-dialog modal-dialog-centered">
 		  </div>

		<!-- Button trigger modal -->
		<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#add_supply">
		<i class="fa fa-plus"> </i>
		  Add Supply
		</button>

		<!-- Modal -->
		<form action="" method="POST">
		<div class="modal fade" id="add_supply" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="staticBackdropLabel" style="text-align: center;">Add Supply</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		        <label for="category" style="font-weight:bold;"> Supplies Category</label>
				<input class="form-control" type="text" name="supplies_category" required>
				<label for="description	" style="font-weight:bold;"> Description</label>
				 <textarea class="form-control" id="exampleFormControlTextarea1" name="description"rows="3" required></textarea>
				<label for="sup_events" style="font-weight:bold;"> Events</label> <br>
				<input  type="checkbox" name="sup_events[]" value="Birthday"> Birthday &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input  type="checkbox" name="sup_events[]" value="Wedding"> Wedding &nbsp;&nbsp;
				<input  type="checkbox" name="sup_events[]" value="Seminars"> Seminars <br>
				<input  type="checkbox" name="sup_events[]" value="Christmas Party"> Christmas Party &nbsp;
				<input  type="checkbox" name="sup_events[]" value="Reunions"> Reunions &nbsp;&nbsp;
				<input  type="checkbox" name="sup_events[]" value="Corporate Parties"> Corporate Parties <br>
				<input  type="checkbox" name="sup_events[]" value="Anniversaries"> Anniversaries &nbsp; &nbsp;&nbsp;
				<input  type="checkbox" name="sup_events[]" value="Graduation"> Graduation

				

		      </div>
		      <div class="modal-footer">
		        
		        <button name="save" class="btn btn-primary">Save</button>
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>
		</form>
	    </div>
  	</div>
	<div class="table-responsive">
		<table class="table" style="background-color: rgba(255, 250, 240, 0.8);">
			<thead class="bg-dark text-light text-center">
				<tr>
					
					<th>Supplies</th>
					<th>Status</th>
					<th>Action</th>

				</tr>
			</thead>
			<tbody>
				<?php 
				
					$query =mysqli_query($conn, "SELECT * FROM supplies WHERE account_id= $account_id LIMIT 0, 25");
					while ($row=mysqli_fetch_array($query))
{

				 ?>
				 <tr>
				 	
				 	<td class="text-center"><?php echo $row['supplies_category']; ?></td>
				 	<td class="text-center"><?php echo $row['status']; ?></td>
				 	<td class="text-center">
				 		<a data-bs-toggle="modal" data-bs-target="#viewsupply<?php echo $row['supplies_id'];?>" >
				 			<i class="fa fa-eye" style="color: green"></i>
				 		</a>

				 		<a data-bs-toggle="modal" data-bs-target="#editsupply<?php echo $row['supplies_id'];?>">
				 			<i class="fa fa-pencil" style="color:blue"></i>
				 		</a>
				 		<a data-bs-toggle="modal" data-bs-target="#deletesupply<?php echo $row['supplies_id'];?>"><i class="fa fa-trash" style="color:red"></i>
		 	
				 		</a>
				 	</td>
				 	
				 	<!-- Modal -->
					<div class="modal fade" id="viewsupply<?php echo $row['supplies_id'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="staticBackdropLabel">View Supply</h5>
					        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					      </div>
					      <div class="modal-body">
					        <div class="mb-3 bo">
							<fieldset disabled>
		 						<label class="fw-bold" for="supplies_category" class="form-label">Category</label> <br>
		 						<label class="form-control" > <?php echo $row['supplies_category']; ?> </label>
		 					</div>
		 					<div class="mb-3">
		 						<label class="fw-bold" for="description" class="form-label">Description</label>
		 						<textarea class="form-control" > <?php echo $row['description']; ?> </textarea>
		 					</div>
		 					<div class="mb-3">
		 						<label class="fw-bold" for="sup_events" class="form-label">Events</label>
		 						<label class="form-control" > <?php echo $row['sup_events']; ?> </label>
		 					</div>
		 					<div class="mb-3">
		 						<label class="fw-bold" for="sup_events" class="form-label">Status</label>
		 						<label class="form-control" > <?php echo $row['status']; ?> </label>
		 					</div>
		 					</fieldset>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					        
					      </div>
					    </div>
					  </div>
					</div>


					<!-- Modal -->
					<div class="modal fade" id="editsupply<?php echo $row['supplies_id'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="staticBackdropLabel">Update Supply</h5>
					        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					      </div>
					      <form action="" method="POST">
					      <div class="modal-body">
					        <div class="mb-3 bo">
							
		 						<label class="fw-bold" for="supplies_category" class="form-label">Category</label> <br>
		 						<input type="text" class="form-control" name="supplies_category" value="<?php echo $row['supplies_category']; ?>">
		 					</div>
		 					<div class="mb-3">
		 						<label class="fw-bold" for="description" class="form-label">Description</label>
		 						<textarea class="form-control" name="description"><?php echo $row['description']; ?></textarea> 
		 					</div>
		 					<div class="mb-3">
		 						<label class="fw-bold" for="sup_events" class="form-label">Events</label>
		 						<input type="text" class="form-control" name="sup_events" value="<?php echo $row['sup_events']; ?>">
		 					</div>
		 					<div class="mb-3">
		 						<label class="fw-bold" for="status" class="form-label">Status</label>
		 						<select class="form-select" name="status">
		 							<option value="<?php echo $row['status']; ?>" selected><?php echo $row['status']; ?></option>
		 							<option style="font-weight: bold;">--Status--</option>
		 							<option value="Availablle">Available</option>
		 							<option value="Unavailablle">Unavailable</option>
		 						</select>
		 					</div>
		 					
					      </div>
					      <div class="modal-footer">
					      	<input type="hidden" name="supplies_id" value="<?php echo $row['supplies_id']; ?>">
					      	<button name="update" class="btn btn-primary">Save Changes</button>
					        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					        
					      </div>
					    </div>
					  </div>
					</div>
				 	</form>
				 	<?php 

				 		if (isset($_POST['update']))
				 		{
				 			$supplies_id = $_POST['supplies_id'];
				 			$supplies_category = $_POST['supplies_category'];
				 			$description = $_POST['description'];
				 			$sup_events = $_POST['sup_events'];
				 			$status = $_POST['status'];

				 			$sql ="UPDATE supplies SET supplies_category='$supplies_category', description='$description', sup_events='$sup_events', status='$status' WHERE supplies_id='$supplies_id'";
				 			if(mysqli_query($conn,$sql))
				 			{
				 				echo "<script>
									alert('Supplies Succesfully Updated!'); 
									window.location.href='supplies.php'
									</script>";
								
				 			}else
				 			{
				 				echo "<script>
									alert('Supplies Cannot Update, Try Again!'); 
									window.location.href='supplies.php'
									</script>";
								
				 			}


				 		}



				 	 ?>

				 	 <!-- Modal -->
					<div class="modal fade" id="deletesupply<?php echo $row['supplies_id'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title text-danger" id="staticBackdropLabel">Delete Supply</h5>
					        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					      </div>
					      <form action="" method="POST">
					      <div class="modal-body">
					        Do you really want to delete the supply?
		 					
					      </div>
					      <div class="modal-footer">
					      	<input type="hidden" name="supplies_id" value="<?php echo $row['supplies_id']; ?>">

					      	<button name="delete" class="btn btn-primary">Yes</button>
					        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					        
					      </div>
					    </div>
					  </div>
					</div>
				 	</form>
				 	<?php 

				 	if (isset($_POST['delete']))
				 	{

				 		$supplies_id = $_POST['supplies_id'];


				 		$sql = "DELETE FROM supplies WHERE supplies_id=$supplies_id";
				 		if(mysqli_query($conn,$sql))
				 		{
				 			echo "<script>
									alert('Supplies Succesfully Deleted!'); 
									window.location.href='supplies.php'
									</script>";

				 		}else
				 		{
				 			
				 			echo "<script>
									alert('Cannot Delete Supply, Try Again!'); 
									window.location.href='supplies.php'
									</script>";

				 		}
				 	}



				 	 ?>
				 </tr>

				 <tr>
<?php }

$query1 =mysqli_query($conn, "SELECT * FROM supplies WHERE account_id= $account_id ");
$count = mysqli_num_rows($query1);
$page = $count/10;
$total = ceil($page);

for ($i=1; $i <= $total ; $i++) { 
 ?>
				 </tr>
			</tbody>
		</table>
	</div>

<nav aria-label="...">
  <ul class="pagination justify-content-end">
    <li class="page-item">
      <a class="page-link">Previous</a>
    </li>
    
    <li class="page-item active" aria-current="page"><a class="page-link" href="book_event.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
   
    <li class="page-item">
      <a class="page-link" href="">Next</a>
    </li>
  </ul>
<?php  }
?>
</nav>
</section>


</div>



</div>
</div>
  	
<script src="asset/include/app.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>


</html>