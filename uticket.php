<?php

include 'connection.php';
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$contact = $_POST['contact'];
$sql = mysqli_query($conn,"select PNRNumber from passengers where name = "$name" and age= "$age"and gender ="$gender" and contact = "$contact";");

if($sql)
{
	echo "query exec";
	$row = mysqli_fetch_array($sql);
	$num = mysqli_num_rows($sql);
	if($num == 1)
	{
		$Pnr = $row['PNRNumber'];

	}
	
}

 ?>
}
