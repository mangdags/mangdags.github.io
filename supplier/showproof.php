<?php
include("asset/include/config.php");

   $query = "SELECT * FROM customeravail WHERE customeravail_id='".$_POST['customeravail_id']."'";
            $result = mysqli_query($conn, $query);

$row = mysqli_fetch_array($result);
?>

<img src="../client/asset/images/<?php echo $row['file_name'] ?>" width="100%">