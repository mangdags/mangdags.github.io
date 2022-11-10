<?php 
include('asset/include/config.php');

if(isset($_FILES["fileImg"]["name"]))
{
	$totalfiles = count($_FILES["fileImg"]["name"]);
	$filesArray = array();

	for($i = 0; $i < $totalfiles; $i++)
	{
		$imageName = $_FILES["fileImg"]["name"][$i];
		$tmpname = $_FILES["fileImg"]["tmp_name"][$i];
		$imageExtension = explode('.', $imageName);

		$name = $imageExtension[0];
		$imageExtension = strtolower(end($imageExtension));

		$newImageName = $name."-".uniqid();
		$newImageName = '.'.$imageExtension;

		move_uploaded_file($tmpname, 'uploads/'. $newImageName);
		$filesArray[] = $newImageName;
	}
	$filesArray = json_encode($filesArray);
	$query = " "
}

 ?>
