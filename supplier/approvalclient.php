<?php 

use PHPMailer\PHPMailer\PHPMailer;

require_once "../sendphpmailer/PHPMailer.php";
require_once "../sendphpmailer/SMTP.php";
require_once "../sendphpmailer/Exception.php";

session_start();
include("asset/include/config.php");


  if (!isset($_SESSION['account_id'])) {
   header("location:../index.php.php");
   die();
  }
$statusMsg="";

$account_id = $_SESSION['account_id'];
        
$offer_id = $_POST['offer_id'];
   
            // Insert image file name into database
            $insert = "UPDATE customeravail SET status = 'Approved' WHERE offer_id = '$offer_id'";
            mysqli_query($conn,$insert);

            $query = "SELECT * FROM customeravail INNER JOIN accounts ON customeravail.account_id=accounts.account_id";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);
            $email = $row['email'];

              $mail = new PHPMailer();

            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "sorar384@gmail.com";
            $mail->Password = 'ukjqeppzrfugeqgx';
            $mail->Port = 587;
            $mail->SMTPSecure = "tls";

            $mail->isHTML(true);
            $mail->setFrom('sorar384@gmail.com', 'Approved');     
            $mail->addAddress($email);
            $mail->Subject = "Approved Reservation";
            $mail->Body    = '
                  <div style="text-align:center;font-size:24px;">
                  Good day!<br><br>
                 <div style="background-color:#222549;border-radius:20px;width:300px;margin:auto;color:#fff;font-size:24px;padding:20px 10px;">Your Reservation Has been Approved</div></div>';

            $mail->send();

            echo "<script>alert('Approved Successfully!'); 
                      window.location.href='reserved.php'
                      </script>";
    


// Display status message
echo $statusMsg;


     ?>