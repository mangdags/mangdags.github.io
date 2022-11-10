<?php 
include("asset/include/config.php");


            date_default_timezone_set('Asia/Manila');
            $message = $_POST['message'];
            $time = date('F j, Y h:i:s A');
            $sender_id = $_POST['sender_id'];
            $receiver_id = $_POST['receiver_id'];


            $sql = "SELECT * FROM chat_code WHERE sender_id = '$sender_id' AND receiver_id = '$receiver_id' OR sender_id = '$receiver_id' AND receiver_id = '$sender_id'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $code = $row['code'];


            if (mysqli_num_rows($result) > 0) {

                $update = "INSERT INTO chat (sender_id,receiver_id,message,time,code) VALUES ('$sender_id','$receiver_id','$message','$time','$code')";
                mysqli_query($conn,$update);

            }else{
                $code = rand(00000,99999);

                $update = "INSERT INTO chat (sender_id,receiver_id,message,time,code) VALUES ('$sender_id','$receiver_id','$message','$time','$code')";
                mysqli_query($conn,$update);

                $update = "INSERT INTO chat_code (sender_id,receiver_id,code) VALUES ('$sender_id','$receiver_id','$code')";
                mysqli_query($conn,$update);


            }

            


?>
