<?php 
session_start();
include("asset/include/config.php");


  if (!isset($_SESSION['account_id'])) {
   header("location:../index.php");
   die();
  }
$connect = mysqli_connect("localhost", "root", "123", "isesadb");
function make_query($connect)
{
 $query = "SELECT * FROM feature_events ORDER BY f_events_id ASC";
 $result = mysqli_query($connect, $query);
 return $result;
}

function make_slide_indicators($connect)
{
 $output = ''; 
 $count = 0;
 $result = make_query($connect);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="'.$count.'" class="active"></li>
   ';
  }
  else
  {
   $output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="'.$count.'"></li>
   ';
  }
  $count = $count + 1;
 }
 return $output;
}

function make_slides($connect)
{
 $output = '';
 $count = 0;
 $result = make_query($connect);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '<div class="item active">';
  }
  else
  {
   $output .= '<div class="item">';
  }
  $output .= '
   <img src="../uploads/'.$row["f_images"].'" alt="'.$row["f_events_desc"].'" />
   <div class="carousel-caption">
    <h3 class="text-warning shadow-lg bg-white p-3">'.$row["f_events_desc"].'</h3>
   </div>
  </div>
  ';
  $count = $count + 1;
 }
 return $output;
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>	ISESA</title>
<link rel = "icon" href ="asset/images/icon1.png" type = "image/x-icon">
<link rel="stylesheet" type="text/css" href="asset/css/style.css">

</head>
<style>

.chat {
  width: 100%;
  max-width: 100%;
  height: 550px;

  padding: 15px 30px;
  margin: 0 auto;
  overflow-y: scroll;
  background-color: #fff;
  transform: rotate(180deg);
  direction: rtl;
  overflow-x: hidden;
}
.chat__wrapper {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column-reverse;
    flex-direction: column-reverse;
    -webkit-box-pack: end;
    -ms-flex-pack: end;
    justify-content: flex-end;
  }
.chat__message {
    font-size: 0.9rem;
    padding: 10px 20px;
    border-radius: 25px;
    color: #000;
    background-color: #e6e7ec;
    max-width: 600px;
    width: -webkit-fit-content;
    width: -moz-fit-content;
    width: fit-content;
    position: relative;
    margin: 15px 0;
    word-break: break-all;
    transform: rotate(180deg);
    direction: ltr;
  }
  .chat__message-own{
    border-bottom-right-radius: unset;
  }
  .chat__message-sender{
    border-bottom-left-radius: unset;
  }
  .name{
 /*   position: absolute;
    top: 0;
    left: 0;
    z-index: 1000;*/
    width: 100%;
  }
 .chat__message-own {
      color: #fff;
      margin-left: auto;
      background-color: #00a9de;
    }
    
  


.chat__form {
  padding: 10px;
  background-color: #e0e0e0;
}
  .container_chat form {
    width: 100%;
    height: 50px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
  }
  input {
    height: 40px;
    font-size: 16px;
    min-width: 90%;
    padding-left: 15px;
    background-color: #fff;
    border-radius: 15px;
    border: none;
  }

  .container_chat_show{
    height: 600px;
  }
  .payment{
    display: none;
  }
  .payment_show{
    display: unset;
  }
  .info_request_hide{
    display: none;
  }

</style>
<body style="background-image: url('asset/images/bg.jpg'); background-repeat: no-repeat; background-size: cover; background-attachment: fixed; background-position: center; ">

<?php include('asset/include/navbar.php'); ?>





<div class="container mt-5 pt-5">



      <div class="p-5 table-responsive rounded" style="background-color: rgba(255, 250, 240, 0.8);">

        <div class="row">
          <div class="col-lg-3" style="background-color: #fff;">
            <h4>Messages</h4>
            <?php
               // $query = "SELECT * FROM accounts INNER JOIN chat_code ON accounts.account_id=chat_code.sender_id WHERE chat_code.receiver_id = '".$_SESSION['account_id']."'";
            $query = "SELECT * FROM accounts WHERE accounts.account_type = 'client'";
            $result = mysqli_query($connect, $query);
            $id = 1;
            while($row = mysqli_fetch_array($result)){
            ?>
            <div>
              <a class="border-bottom" style="line-height: 40px;width: 100%;height: 100%;display: block;font-weight: bold;color: #000;" href="messages.php?account_id=<?php echo $row['account_id'] ?>"><?php echo $row['firstname']." ".$row['lastname'] ?></a>
            </div>
            <?php } ?>
          </div>
          <div class="col-lg-9">
            <div class="container_chat">
              <div class="name support bg-dark text-white p-2" style="font-weight: bold;font-size: 18px;"><i class="fas fa-circle text-success small"></i> Chat Supplier</div>
              <div>
                <div class="chat">
                  <div class="chat__wrapper box_data">                  
                  </div>
                </div>
                <div class="chat__form">
                  <form class="form_chat pl-0 ml-2">
                        <input type="hidden" id="sender_id" value="<?php echo $_SESSION['account_id'] ?>">
                        <input type="hidden" id="receiver_id" value="<?php echo $_GET['account_id'] ?>">
                        <input type="text" id="message" class="form-control mr-2 message border-0" placeholder="Message...">
                        <button type="button" id="chat" class="btn text-white form-control ml-2" style="background-color: #427b3d;width: 50px;"><i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
 <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
 <script type="text/javascript">
   $(document).ready(function() {
    $('#example').dataTable();
} );

 </script>

 <script type="text/javascript">

    // $('.support').click(function(){
    //   $('.container_chat').toggleClass('container_chat_show')
    // })

    function loadingdata(){
      $.ajax({
        url:'messages_data.php', 
        method:'POST',
        cache: false,
        data:{sender_id:$('#sender_id').val(),receiver_id:$('#receiver_id').val(),},
        success:function(data){
          $('.box_data').html(data)
        }
      })
    }

    setInterval(function(){
      loadingdata()
    },100)
        

    $('#chat').click(function(){
      $.ajax({
        url:'sendController.php',
        method:'POST',
        cache: false,
        data:{message:$('#message').val(),sender_id:$('#sender_id').val(),receiver_id:$('#receiver_id').val(),},
        success:function(data){

        }
      })
      $('#message').val('')
    })

    $('form input').keydown(function (e) {
      if (e.keyCode == 13) {
        e.preventDefault();
        $.ajax({
          url:'sendController.php',
          method:'POST',
          cache: false,
          data:{message:$('#message').val(),sender_id:$('#sender_id').val(),receiver_id:$('#receiver_id').val(),},
          success:function(data){

          }
        })
        $('#message').val('')
      }
    });
    </script>
</body>


</html>