<?php
extract($_POST);
include("config.php");
$sql=mysqli_query($conn,"SELECT * FROM accounts where email='$email'");
if(mysqli_num_rows($sql)>0)
{
    echo "Email Id Already Exists"; 
	exit;
}
elseif(isset($_POST['insertclient']))
{
     $query="INSERT INTO accounts(email, pwd, firstname, lastname, address, contact_number, account_type ) VALUES ('$email', 'md5($pword)', '$firstname', '$lastname', '$address','$contact_number', 'client')";
        $sql=mysqli_query($conn,$query)or die("Could Not Perform the Query");
        
    
    }else 
    {
		echo "Error.Please try again";
	}


?>