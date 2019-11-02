<?php
	include 'connection.php';

	
	$name = $_POST["name"];
	$age = $_POST["age"];
	$gender = $_POST["gender"];
	$contact = $_POST["contact"];
	$departure = $_POST["dep"];
	$destination = $_POST["dest"];
	$date = $_POST["date"];

	
	$query = "select flightID from flights where departure ='$departure' and destination = '$destination' and Date = '$date' limit 1";
	$exec1= mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($exec1);
	$FlightID = $row["flightID"];

	$query1 = "insert into passengers (flightID, name, age, gender, contact) values('$FlightID', '$name', '$age', '$gender', '$contact')";
	$exec = mysqli_query($conn, $query1);
	if ($exec) {
		echo "record saved successfully";
	}
	else
		echo "record not saved";
	

?>
