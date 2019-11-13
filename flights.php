<?php

	include 'connection.php';

	$dep_place = $_POST['from'];
	$des_place = $_POST['to'];
	$date = $_POST['depdate'];

	$query = "select * from flights where departure = '$dep_place' and destination = '$des_place' and Date = '$date' order by Price asc";
	$result= mysqli_query($conn, $query);


	$num_of_rows = mysqli_num_rows($result);
	if ($num_of_rows >= 1)
	{
		echo "<p>FLIGHT DETAILS</p>";
		echo '<table>';
		echo '<tr><th>Flight ID</th>';
		echo '<th>Departure</th>';
		echo '<th>Destination</th>';
		echo '<th>Date</th>';
		echo '<th>Time</th>';
		echo '<th>Price</th>';
		echo '</tr>';
		while($row=mysqli_fetch_assoc($result))
    	{
    		echo '<tr>';
        	echo '<td>'.$row['flightID'].'</td>';
        	echo '<td>'.$row['departure'].'</td>';
        	echo '<td>'.$row['destination'].'</td>';
        	echo '<td>'.$row['Date'].'</td>';
        	echo '<td>'.$row['Time'].'</td>';
        	echo '<td>'.$row['Price'].'</td>';
        	echo '<td><a href="login.php">BOOK TICKETS</a></td>';
        	echo '</tr>';
    	}
    	
	}
	else{
		echo '<div class="flight">Sorry! No Flights available...</div>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
 
	<style>
		*{
			font-family: Lato;
		}
		body{
			background-size: cover;
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-image:linear-gradient(rgba(250,250,250,0.6),rgba(250,250,250,0.6)) ,url(images/408134.jpg);
		}
		.flight{
			text-align: center;
	
		}
		td{
			border:0.2px solid black;
			padding: 10px;
		}
		table{
			padding: 5px;
			width: 70%;
			text-align: center;
			

		}
		input[type=text]{
			font-size: 20px;
			width: 250px;
			height: 30px;
			border: 0.5px solid black;
			border-radius: 2px;
		}
		a{
			text-decoration:none;
			font-size: 20px;
			color: black;
			border:2px solid #16404F;
			border-radius: 2px;
			padding:5px 10px;
			
		}
		p{
			width: 100%;
			text-align: center;
			font-size: 30px;
			font-weight: bold;

		}
		
	</style>
</head>
<body>

</body>
</html>