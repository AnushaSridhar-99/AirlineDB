<?php
	include 'session.php';
 include 'connection.php';

 	$departure = $_SESSION["departure"];
	$destination = $_SESSION["destination"];
	$date =  $_SESSION["date"];
	$time = $_SESSION["time"];
	$num = $_SESSION["number"];
	$price =  $_SESSION["finalprice"];

	
	$query = "select flightID from flights where departure ='$departure' and destination = '$destination' and Date = '$date' and Time = '$time' limit 1";
	$exec1= mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($exec1);
	$FlightID = $row["flightID"];

	$query1 = "insert into booking (username, flightID, no_of_tickets, price) values('$login_session', '$FlightID', '$num', '$price') ";
	$exec2 = mysqli_query($conn, $query1);
	$query2 = "update flights set Capacity = Capacity-$num where flightID = '$FlightID'";
		$exec3 = mysqli_query($conn, $query2); 
	if ($exec2 and $exec3) {

		  echo "<p>Booking confirmed</p>";  
         echo "<a href='welcome.php'>Click here to go back</a>";

     }
	else {
		$message = "There is an error";
         echo "<script type='text/javascript'>alert('$message');</script>";
         header("Location:welcome.php");  
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Booking confirmed</title>
	<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

	<style>
		p{
			font-size: 20px;
			font-family: Lato;
			text-align: center;
			width: 100%;
		}
		a{
			color: black;
			text-align: center;
			width: 100%;
		}
	</style>
</head>
<body>
</body>
</html>

