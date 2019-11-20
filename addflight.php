<?php
	include 'connection.php';

	if($_SERVER["REQUEST_METHOD"] == "POST") {
	$flightID = $_POST["flightID"];
	$departure = $_POST["dep_place"];
	$destination = $_POST["des_place"];
	$date = $_POST["date"];
	$time = $_POST["time"];
	$capacity = $_POST["capacity"];
	$price = $_POST["price"];

	if($departure == $destination or $departure == "--" or $destination == "--")
	{
		echo "<script>alert('Invalid details'); window.location = './profile.php';</script>";
	}
	else{

	
	 $query = "select * from flights where flightID ='$flightID'";


  //execute the query stored in variable $query and store result in variable $exec
 $exec = mysqli_query($conn,$query); 

// return number of rows

 $result = mysqli_num_rows($exec); 

 if($result == 1){
		echo "<script>alert('Flight exists'); window.location = './profile.php';</script>";
 }
 else{
 	$query1 = "insert into flights(flightID, departure, destination, Date, Time, Capacity, Price) values ('$flightID', '$departure', '$destination', '$date', '$time', '$capacity', '$price')";
 	$exec1 = mysqli_query($conn,$query1);
 	$message = "Flight details added successfully";
		echo "<script>alert('Flight details added successfully!'); window.location = './profile.php';</script>";
 }	
}
}

?>


