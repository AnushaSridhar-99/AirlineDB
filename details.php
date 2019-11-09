<?php

 include 'connection.php';

 $flightID = $_POST['flightID'];

  $query = "select * from booking where flightID='$flightID'";
  $exec = mysqli_query($conn, $query);

  $num_of_rows = mysqli_num_rows($exec);
  if ($num_of_rows>=1) {
  	echo "<p>BOOKING DETAILS</p>";
		echo '<table>';
		echo '<tr><th>Booking ID</th>';
		echo '<th>Username</th>';
		echo '<th>Ticket count</th>';
		echo '<th>Price</th>';
		echo '<th>Seat numbers</th>';
		echo '</tr>';
		while($row=mysqli_fetch_assoc($exec))
    	{
    		echo '<tr>';
        	echo '<td>'.$row['BookingID'].'</td>';
        	echo '<td>'.$row['username'].'</td>';
        	echo '<td>'.$row['no_of_tickets'].'</td>';
        	echo '<td>'.$row['price'].'</td>';
        	echo '<td>'.$row['seatnumbers'].'</td>';
        	echo '</tr>';
    	}
    	
	}
	else{
		echo '<div>No bookings...</div>';
	
  }
?>