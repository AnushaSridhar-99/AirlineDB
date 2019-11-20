<?php
	include 'session.php';
 include 'connection.php';

 	$departure = $_SESSION["departure"];
	$destination = $_SESSION["destination"];
	$date =  $_SESSION["date"];
	$time = $_SESSION["time"];
	$num = $_SESSION["number"];
	$price =  $_SESSION["finalprice"];
	$payment = $_POST["payment"];

	
	$query = "select flightID from flights where departure ='$departure' and destination = '$destination' and Date = '$date' and Time = '$time' limit 1";
	$exec1= mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($exec1);
	$FlightID = $row["flightID"];
	$status = "confirmed";

	$query1 = "CALL BOOKING('$login_session', '$FlightID', '$num', '$price', '$status', '$payment')";
	$exec2 = mysqli_query($conn, $query1);
	$query2 = "update flights set Capacity = Capacity-$num where flightID = '$FlightID'";
		$exec3 = mysqli_query($conn, $query2); 
	if ($exec2 and $exec3) {

		$sql1 = "select * from passengers where username = '$login_session' and flightID = '$FlightID'";
		$exec5 = mysqli_query($conn, $sql1);


         $sql = "select email from users where username = '$login_session'";
         $exec4 = mysqli_query($conn, $sql);
         $row1 = mysqli_fetch_assoc($exec4);
         

	    require("PHPMailer-master\src\PHPMailer.php");
	    require("PHPMailer-master\src\SMTP.php");
	    require("PHPMailer-master\src\Exception.php");

	    $mail = new PHPMailer\PHPMailer\PHPMailer();
	    $mail->IsSMTP(); 

	    $mail->CharSet="UTF-8";
	    $mail->Host = "smtp.gmail.com";
	    $mail->SMTPDebug = 1; 
	    $mail->Port = 465; //465 or 587

	     $mail->SMTPSecure = 'ssl';  
	    $mail->SMTPAuth = true; 
	    $mail->IsHTML(true);
	    //Authentication
	    $mail->Username = "airlinedbsjbit@gmail.com";
		$mail->Password = "avion123";

	    //Set Params
	    $mail->SetFrom("airlinedbsjbit@gmail.com");
	    $mail->AddAddress($row1['email']);
	    $mail->Subject = "Booking Confirmation";
	    $mail->Body = "Your booking has been confirmed.<br>Here are your booking details:<br> Flight ID: ".$FlightID."<br>Date: ".$date."<br>Time: ".$time."<br>Departure: ".$departure."<br>Destination: ".$destination."<br> Number of tickets: ".$num."<br>Price: ₹". $price ."<br>Passenger details:
			<table>
			<tr><th>PNR Number</th>
			<th>Passenger name</th>
			<th>Age</th>
			<th>Gender</th>
			</tr>";
			while($row2=mysqli_fetch_assoc($exec5))
	    	{
	    		$mail->Body .= "<tr><td>".$row2['PNRNumber']."</td><td>".$row2['name']."</td><td>".$row2['age']."</td><td>".$row2['gender']."</td></tr>";
	    	}
	    	$mail->Body .= "</table><br>";


	     if(!$mail->Send()) {
	        echo "Mailer Error: " . $mail->ErrorInfo;
	     } else {
	       echo "<script>alert('Booking Confirmed'); window.location = './welcome.php';</script>";
	     }
			


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
		td{
			border:0.2px solid black;
			padding: 5px;
		}
		table{
			padding: 5px;
			width: 70%;
			text-align: center;

		}
	</style>
</head>
<body>
</body>
</html>

