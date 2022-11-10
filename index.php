<?php 

use PHPMailer\PHPMailer\PHPMailer;

require_once "sendphpmailer/PHPMailer.php";
require_once "sendphpmailer/SMTP.php";
require_once "sendphpmailer/Exception.php";



include("asset/include/config.php");
session_start();



  if (isset($_POST['insertclient']))
  {
    $email = $_POST['email'];
    $pword = $_POST['pword'];
    $cnfrm_pword = $_POST['cnfrm_pword'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $contact_number = $_POST['contact_number'];
    $account_type = "client";
    $pass = md5($pword);

    $query = mysqli_query($conn, "SELECT * FROM `accounts` where email='$email'");
    if (mysqli_num_rows($query) > 0) {
      echo '<script type="text/javascript">alert("Email already exist!");</script>';
    }
    elseif($pword==$cnfrm_pword)
    {
      $sql = "INSERT INTO  `accounts` (email, pwd, firstname, lastname, address, contact_number, account_type) VALUES ('$email', '$pass', '$firstname', '$lastname', '$address', '$contact_number', '$account_type')";
      if (mysqli_query($conn, $sql)) {
        echo '<script type="text/javascript">alert("New account created successfully");</script>';
      }else
      {
        echo '<script type="text/javascript">alert("Cannot create new account, Try again!");</script>';
      }
    }else
    {
      
       echo '<script type="text/javascript">alert("Password did not match!");</script>';
    }

  }


    if (isset($_POST['insertsupplier']))
  {
    $email = $_POST['email'];
    $pword = $_POST['pword'];
    $cnfrm_pword = $_POST['cnfrm_pword'];
    $supplier_title =$_POST['supplier_title'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $contact_number = $_POST['contact_number'];
    $account_type = "supplier";
    $pass = md5($pword);
    $category = $_POST['category'];
    

    $query = mysqli_query($conn, "SELECT * FROM `accounts` where email='$email'");
    if (mysqli_num_rows($query) > 0) {
      echo '<script type="text/javascript">alert("Email already exist!");</script>';
    }
    elseif($pword==$cnfrm_pword)
    {
      $sql = "INSERT INTO  `accounts` (email, pwd, supplier_title,  firstname, lastname, address, contact_number, account_type, category) VALUES ('$email', '$pass', '$supplier_title', '$firstname', '$lastname', '$address', '$contact_number', '$account_type', '$category')";
      if (mysqli_query($conn, $sql)) {
        echo '<script type="text/javascript">alert("New account created successfully");</script>';

        $query = "SELECT * FROM accounts WHERE account_type = 'supplier' AND account_status = 'Pending'";
        $result = mysqli_query($conn, $query);
        
        while($row = mysqli_fetch_array($result)){
          $insert = "INSERT INTO notifications (name, type, status, date) VALUES ($row[firstname], 'approval', 'unread', CURRENT_TIMESTAMP)";
        }
        
      }else
      {
        echo '<script type="text/javascript">alert("Cannot create new account, Try again!");</script>';
      }
    }else
    {
      
       echo '<script type="text/javascript">alert("Password did not match!");</script>';
    }

  }
    $msg="";
    if (isset($_POST['login'])) 
    {
        $email = $_POST['email'];
        $pword = $_POST['pword'];
        $pass=md5($pword);

        $query = mysqli_query($conn,"SELECT * FROM accounts where email='$email' and pwd='$pass'");
        // $res = ($conn, $query);
        $num_row = mysqli_num_rows($query);

        if($num_row > 0)
        {
          while($row =mysqli_fetch_assoc($query))
          {
            if($row['account_type'] == "client")
            {
              $_SESSION['account_id'] = $row['account_id'];
              $_SESSION['firstname'] = $row['firstname'];
              $_SESSION['lastname'] = $row['lastname'];
              header("location:client/index.php");

            }elseif($row['account_type'] == "supplier" && $row['account_status'] == 'Approved')
            {
              $_SESSION['account_id'] = $row['account_id'];
              $_SESSION['firstname'] = $row['firstname'];
              $_SESSION['lastname'] = $row['lastname'];
              header("location:supplier/index.php");
            }else
            {
              echo "Pls enter valid credentials";
            }
          }
        }
      
      }

      if (isset($_POST['sendemailcode'])) 
    {
        $email = $_POST['email'];

        $query = mysqli_query($conn,"SELECT * FROM accounts where email='$email'");
        // $res = ($conn, $query);
        $num_row = mysqli_num_rows($query);

        if($num_row > 0)
        {

          $code = rand(00000000,99999999);

          $query = mysqli_query($conn,"UPDATE accounts SET code = '$code' where email='$email'");
        
          mysqli_num_rows($query);




  $mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->Username = "sorar384@gmail.com";
$mail->Password = 'ukjqeppzrfugeqgx';
$mail->Port = 587;
$mail->SMTPSecure = "tls";

$mail->isHTML(true);
$mail->setFrom('sorar384@gmail.com', 'Change Password');     
$mail->addAddress($email);
$mail->Subject = "Change Password";
$mail->Body    = '
      <div style="text-align:center;font-size:24px;">
      Good day!<br><br>
     <div style="background-color:#222549;border-radius:20px;width:500px;margin:auto;color:#fff;font-size:24px;padding:20px 10px;">Your Click <a href="http://localhost/finalisesa/index.php?code='.$code.'">here</a> To Chage Your Passowrd</div></div>';
$mail->send();

          echo "<script>
                      alert('Send Email Code Successfully!'); 
                      window.location.href='index.php'
                      </script>";
          
        }else{
          echo "<script>
                      alert('Invalid Email!'); 
                      window.location.href='index.php'
                      </script>";
        }
      
      }


        if (isset($_POST['changepassword'])) 
    {
    $code = $_GET['code'];   
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];

        if ($password != $confirmpassword) {
          echo "<script>
                      alert('Password Not Match!'); 
                      window.location.href='index.php?code=".$code."'
                      </script>";
        }else{

         
          $password = md5($_POST['password']);
          $query = mysqli_query($conn,"UPDATE accounts SET pwd = '$password' where code='$code'");
        
          mysqli_num_rows($query);

          echo "<script>
                      alert('Change Password Successfully!'); 
                      window.location.href='index.php'
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
	<title>	ISESA</title>

<style type="text/css">
  
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
<link rel = "icon" href ="asset/images/icon1.png"  type = "image/x-icon">
</head>
<body style="background-image: url('asset/images/bg.jpg'); background-repeat: no-repeat; background-size: cover; background-attachment: fixed; background-position: center; ">

<?php include("navbar.php"); ?>


<!-- Modal -->
<div class="modal fade" id="insertclient" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Client Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

<form class="row g-3" action="" method="POST">
<div class="col-md-12 ">
  <label for="email" class="form-label">Email<label style="color:red;">*</label></label>
  <input type="email" class="form-control" name="email" id="email" required>
  
</div>
<div class="col-md-6">
  <label for="pword" class="form-label">Password<label style="color:red;">*</label></label>
  <input type="password" class="form-control" name="pword" id="pword" required>
</div>
<div class="col-md-6">
  <label for="cnfrm_pword" class="form-label">Confirm Password<label style="color:red;">*</label></label>
  <input type="password" class="form-control" name="cnfrm_pword" id="cnfrm_pword" required>
</div>

<div class="col-md-6">
  <label for="firstname" class="form-label">Firstname<label style="color:red;">*</label></label>
  <input type="text" class="form-control" name="firstname" id="firstname" required>
</div>
<div class="col-md-6">
  <label for="lastname" class="form-label">Lastname<label style="color:red;">*</label></label>
  <input type="text" class="form-control" name="lastname" id="lastname" required>
</div>
<div class="col-md-12">
  <label for="address" class="form-label">Address<label style="color:red;">*</label></label>
  <input type="text" class="form-control" name="address" id="address" required>
</div>
<div class="col-md-12">
  <label for="contact_number" class="form-label">Contact Number<label style="color:red;">*</label></label>
  <input type="text" class="form-control" name="contact_number" id="contact_number" required>
</div>


      </div>
      <div class="modal-footer">
        <div class="error">
          <?php echo $msg?>
        </div>
        <div class="col-md-12">
  <label for="" class="form-label" style="font-size:12px"><label style="color:red;">*</label> mark means input is required </label>
 
</div>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button name="insertclient" class="btn btn-primary">Submit</button>
         
      </div>
</form>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="insertsupplier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Supplier Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

<form class="row g-3" action="" method="POST">
<div class="col-md-12 ">
  <label for="email" class="form-label">Email<label style="color:red;">*</label></label>
  <input type="email" class="form-control" name="email" id="email" required>
</div>

<div class="col-md-6">
  <label for="pword" class="form-label">Password<label style="color:red;">*</label></label>
  <input type="password" class="form-control" name="pword" id="pword" required>
</div>

<div class="col-md-6">
  <label for="cnfrm_pword" class="form-label">Confirm Password<label style="color:red;">*</label></label>
  <input type="password" class="form-control" name="cnfrm_pword" id="cnfrm_pword" required>
</div>

<div class="col-md-12 ">
  <label for="supplier_title" class="form-label">Supplier or Business Title<label style="color:red;">*</label></label>
  <input type="text" class="form-control" name="supplier_title" id="supplier_title" required>
</div>

<div class="col-md-12 ">
  <label for="category" class="form-label">Category<label style="color:red;">*</label></label>
  <select name="category" id="category">
    <?php 
        $query_category = "SELECT * FROM category";
        $result_category = mysqli_query($conn, $query_category);

        while ($category = mysqli_fetch_array($result_category,MYSQLI_ASSOC)):;
    ?>
          <option value="<?php echo $category["Category_Name"]; ?>">
              <?php echo $category["Category_Name"]; ?>
          </option>
      <?php endwhile; 
      ?>
  </select>
</div>

<div class="col-md-6">
  <label for="firstname" class="form-label">Firstname<label style="color:red;">*</label></label>
  <input type="text" class="form-control" name="firstname" id="firstname" required>
</div>

<div class="col-md-6">
  <label for="lastname" class="form-label">Lastname<label style="color:red;">*</label></label>
  <input type="text" class="form-control" name="lastname" id="lastname" required>
</div>

<div class="col-md-12">
  <label for="address" class="form-label">Address<label style="color:red;">*</label></label>
  <input type="text" class="form-control" name="address" id="address" required>
</div>

<div class="col-md-12">
  <label for="contact_number" class="form-label">Contact Number<label style="color:red;">*</label></label>
  <input type="text" class="form-control" name="contact_number" id="contact_number" required>
</div>

<div class="modal-footer">
  <div class="col-md-12">
    <label for="" class="form-label" style="font-size:12px"><label style="color:red;">*</label> mark means input is required </label>
  </div>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button name="insertsupplier" class="btn btn-primary">Submit</button>
</div>
  </form>
      </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="loginmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Log In you Account </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

<form class="row g-3" action="" method="POST">
<div class="col-md-12 ">
  <label for="email" class="form-label">Email<label style="color:red;">*</label></label>
  <input type="email" class="form-control" name="email" id="email" required>
  
</div>
<div class="col-md-12">
  <label for="pword" class="form-label">Password<label style="color:red;">*</label></label>
  <input type="password" class="form-control" name="pword" id="pword" required>
</div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button name="login" class="btn btn-primary">Submit</button>
         
      </div>
</form>
    </div>
  </div>
</div>


<div class="modal fade" id="forgotpassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Send Email Code </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

<form class="row g-3" action="" method="POST">
<div class="col-md-12 ">
  <label for="email" class="form-label">Email<label style="color:red;">*</label></label>
  <input type="email" class="form-control" name="email" id="email" required>
  
</div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button name="sendemailcode" class="btn btn-primary">Submit</button>
         
      </div>
</form>
    </div>
  </div>
</div>

<div class="modal fade" id="changepassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

<form class="row g-3" action="" method="POST">
<div class="col-md-12 ">
  <label for="password" class="form-label">Password<label style="color:red;">*</label></label>
  <input type="password" class="form-control" name="password" id="password" required>
  
</div>
<div class="col-md-12 ">
  <label for="password" class="form-label">Confirm Password<label style="color:red;">*</label></label>
  <input type="password" class="form-control" name="confirmpassword" id="password" required>
  
</div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button name="changepassword" class="btn btn-primary">Submit</button>
         
      </div>
</form>
    </div>
  </div>
</div>


<div class="container" style="margin-top: 20%;">
    <div class="text-center">
        <p class="outline" style="font-size:4em; font-weight:bold" >
            MEMORABLE EVENTS <br> DONT JUST HAPPEN.
        </p>

        <div>
            <h2 style="background-color: rgb(231,231,231); border-radius: 5px; padding-top: 5px; padding-bottom: 5px;" >They happen to be our business</h2>
        </div>
    </div>
</div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

 <script>
  <?php if (isset($_GET['code'])) { ?>
   var myModal = new bootstrap.Modal(document.getElementById("changepassword"));
myModal.show();
<?php } ?>
 </script>
</body>


</html>