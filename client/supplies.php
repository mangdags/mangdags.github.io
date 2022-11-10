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
    <h1 class="text-center pt-5" style="font-size: 4em;">CHOOSE & SELECT SUPPLY</h1>
<div class="table-responsive" >
<table class="table" style="background-color: rgba(255, 250, 240, 0.8);">
    <thead class="table-danger text-center">
      <tr>
      <th>Select</th>
      <th>Supplier</th>
      <th>Category</th>
      <th>Status</th>
      <th>Action</th>
    </thead>
    <tbody class="table-danger">
      <?php 

        $page = isset($_GET['page']);
         if($page == "" || $page == "1")
         {
          $page1 = 0;
         }
         else
         {
          $page1 = ($page * 25) -25;
         }
          $query =mysqli_query($conn, "SELECT accounts.account_id, accounts.supplier_title, supplies.supplies_category, supplies.description, supplies.sup_events, supplies.status, supplies.supplies_id FROM supplies INNER JOIN accounts ON supplies.account_id=accounts.account_id LIMIT $page1, 25;");
          while ($row=mysqli_fetch_array($query))
{

         ?>
         <tr>
         
          <form action="" method="POST">
          <td class="text-center">
            <input type="checkbox" class="form-check-input"  name="supplies_id[]" value="<?php echo $row['supplies_id'];?>">
            <input type="text" name="account_id[]" value=" <?php echo $row['account_id']; ?>" hidden  >
             
            
          </td>

          <td class="text-center"><?php echo $row['supplier_title']; ?>
            
          </td>
          <td class="text-center"><?php echo $row['supplies_category']; ?>
            
          </td>
          <td class="text-center"><?php echo $row['status']; ?>
            
          </td>
          <td class="text-center">
            <a data-bs-toggle="modal" data-bs-target="#viewsupply<?php echo $row['supplies_id'];?>" >
              <i class="fa fa-eye" style="color: green"></i>
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
          
         </tr>

         <tr>
<?php } 
  $query1 =mysqli_query($conn, "SELECT accounts.account_id, accounts.supplier_title, supplies.supplies_category, supplies.description, supplies.sup_events, supplies.status, supplies.supplies_id FROM supplies INNER JOIN accounts ON supplies.account_id=accounts.account_id;");
  $count = mysqli_num_rows($query1);
  $page = $count/10;
  $total = ceil($page);


  for ($i=1; $i <= $total ; $i++) { 

?>
         </tr>

      

    </tbody>

</table>
<div class="container">
  <div class="row">
    <div class="col-6">
<nav aria-label="...">
  <ul class="pagination">
    <li class="page-item disabled">
      <span class="page-link">Previous</span>
    </li>
    
    <li class="page-item active" aria-current="page"><a class="page-link" href="book_event.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
   
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
<?php  }
?>
</nav>
</div>
<div class="col-6">
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <button class="btn btn-warning" name="submit"> <i class="fa fa-chevron-circle-right"></i> Proceed for booking</button>
  <!-- <a class="btn btn-warning" href="book_events.php" role="button"><i class="  fa fa-chevron-circle-right"></i> </a> -->
</form>
<?php 
 if (isset($_POST['submit']))
 {
   
   $supplies_id = $_POST['supplies_id'];
   $account_id = $_POST['account_id'];
   $user_id = $_SESSION['account_id'];

// echo $account_id;
   if($supplies_id == 0)
      {

        echo "<script>
        alert('Please select supplies first!'); 
        window.location.href='supplies.php'
        </script>";
    }else
      {   

        $user_id=$_SESSION['account_id'];
        $event_query = "SELECT request_event, event_date FROM req_event WHERE user_id="
        // foreach($supplies_id as $getid)
        //   {
            $sql1 = mysqli_query($conn, "SELECT accounts.account_id, accounts.supplier_title, supplies.supplies_category, supplies.description, supplies.sup_events, supplies.status, supplies.supplies_id FROM supplies INNER JOIN accounts ON supplies.account_id=accounts.account_id WHERE supplies.supplies_id='$getid';");
            while($row=mysqli_fetch_array($sql1))
            {
              $account_id = $row['account_id'];

              $book_id=date('yms').$account_id;
              
            $sql="INSERT INTO book_supplies (book_id,supplies_id, account_id, user_id) 
            VALUES ('$book_id','$getid', '$account_id', '$user_id')";
              $res = mysqli_query($conn, $sql);


              if($res)
              {
                
                echo " <script> location.replace('book_events'); </script>";

              }else
              {
                echo "<script>
                      alert('Cannot Book Supplies, Try Again!'); 
                      window.location.href='book_event.php'
                      </script>";
              }
            // }
            
           } 

      }
 }



 ?>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>


</html>