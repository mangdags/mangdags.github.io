<?php 
include("asset/include/config.php");

             $sender_id = $_POST['sender_id'];
             $receiver_id = $_POST['receiver_id'];


            $sql = "SELECT * FROM chat_code WHERE sender_id = '".$sender_id."' AND receiver_id = '".$receiver_id."' OR sender_id = '".$receiver_id."' AND receiver_id = '".$sender_id."'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $code = $row['code'];

            if (mysqli_num_rows($result) > 0) {


            $sql = "SELECT * FROM chat  WHERE code = '".$row['code']."' ORDER BY time ASC";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {  ?>

                <?php if ($_POST['sender_id'] == $row['sender_id']) { ?>
              
        


    <div class="chat__message chat__message-own">
        <div>


                         

                                <?php if ($row['date'] == date('Y-m-d')) { ?>

                                    <div class="date small" style="float: left;margin-right: 50px;font-size: 1.5rem;"><?php echo date('h:i:s A', strtotime($row['time'])) ?></div>
                                <?php } else { ?>
                                    <div class="date small" style="float: left;margin-right: 50px;font-size: 1.5rem;"><?php echo $row['time'] ?></div>
                                <?php } ?>
                                
                            </div>
      <div class="text-right mt-4" style="word-break: break-all;font-size: 1.5rem;"><?php echo $row['message'] ?></div>
    </div>
                

                <?php }else if ($_POST['receiver_id'] == $row['sender_id']) { ?>
     

                        <div class="chat__message chat__message-sender">

                            
                            <div>
                               

                                <?php if ($row['date'] == date('Y-m-d')) { ?>

                                    <div class="date small" style="float: right;margin-left: 50px;font-size: 1.5rem;"><?php echo date('h:i:s A', strtotime($row['time'])) ?></div>
                                <?php } else { ?>
                                    <div class="date small" style="float: right;margin-left: 50px;font-size: 1.5rem;"><?php echo $row['time'] ?></div>
                                <?php } ?>
                                
                            </div>
      
      <div class="text-left mt-4" style="font-size: 1.5rem;"><?php echo $row['message'] ?></div>
    </div>


                <?php } ?>
                

  
                

           <?php }  }



?>
