<?php
  include("asset/include/config.php");


$query = "SELECT *,customeravail.address AS customeravail_address, customeravail.code AS c_code FROM offer INNER JOIN customeravail ON offer.offer_id=customeravail.offer_id INNER JOIN accounts ON customeravail.account_id=accounts.account_id WHERE customeravail.customeravail_id='".$_GET['customeravail_id']."'";
            $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_array($result);

?>




    <!-- Content Header (Page header) -->
    <section style="width: 500px;">
      <h1 style="text-align: center"> <img src="asset/images/logo.png" style="width:40px; height: 40px;"> ISESA </h1>
      <h4 style="text-align: center">#10 Eisenhower Street, Greenhills, 1503 Metro Manila</h4>
      <h4 style="text-align: center">+639-1234-567-89</h4>
      <h4 style="text-align: center">msc@email.com</h4>

      <br>
      <div>
        <h4 style="float: ;">Transaction No.: <?php echo $row['c_code'] ?></h4>
        <h4 style="float: right;">Date: <?php echo date('F j, Y') ?></h4>
      </div>
      
      <div style="text-align: left;">
        <h4>Customer: <?php echo $row['firstname']." ".$row['lastname'] ?></h4>
        <h4>Contact: <?php echo $row['contact_number'] ?></h4>
        <h4>Address: <?php echo $row['address'] ?></h4>
      </div>

    </section>

 
              <table style="width: 500px;">
                <thead>
                  <th style="text-align: left;">Title</th>
                  <th style="text-align: right;">Price</th>
                </thead>
                <tbody>


        <?php

        ?>
        
                          <tr>
                            <td style="padding: 10px 0px;"><?php echo $row['title'] ?></td>
                            <td style="padding: 10px 0px;text-align: right;"><?php echo $row['price'] ?></td>
                          </tr>
    


                </tbody>
              </table>
              <div style="text-align: right;margin-top: 50px;width: 500px;"><h4>Total: PHP <?php echo number_format($row['price'],2); ?></h4></div>


<script>



     window.print();
    
  window.onafterprint = window.close; 

</script>


