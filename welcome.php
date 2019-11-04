<?php
   include('session.php');

    if($_SERVER["REQUEST_METHOD"] == "POST"){
    	$num_of_tickets = $_POST["num_of_tickets"];
    	for ($i=1; $i <= $num_of_tickets; $i++){
    		echo 'Passenger detail ';echo $i;
    		echo '<form method="post" action="passenger.php">
		<div class="pass"><pre>

        NAME:  <input type="text" name="name" required><br>
         AGE:  <input type="text" name="age" required><br>
 GENDER:  <input type="radio" name="gender" value="male">Male    <input type="radio" name="gender" value="Female">Female<br>
     CONTACT:  <input type="text" name="contact" required> <br>
   DEPARTURE:  <input type="text" name="dep" required> <br>
 DESTINATION:  <input type="text" name="dest" required> <br>
		DATE:  <input type="date" name="date" required><br>
		<button type="submit" name="submit" class="btn">CONFIRM</button>
			</pre>
		
		</div>
	</form>';
    	}
    }
?>
<html">
   
   <head>
      <title>Welcome </title>
      <style>
		.pass{
			width: 45%;
			text-align: center;
			border: 2px solid black;
			border-radius: 10px;
			font-size: 20px;
			margin-top: 20px;
			background-color: white;
			padding: 10px;
			margin-left: 300px;
		}
		.btn {
 			background-color: #4CAF50;
 			color: white;
  			padding: 12px 20px;
  			border: none;
  			border-radius: 8px;
  			cursor: pointer;
  			width: 45%;
		}
		input[type=text]{
			width: 50%;
			border: 0.5px solid black;
			border-radius: 10px;
			height: 40px;
		}
	</style>
   </head>
   
   <body>
      <h1>Welcome <?php echo $login_session; ?></h1>
      <form action="" method="post">
      Enter number of tickets :<input type="text" name="num_of_tickets" required>
      <button type="submit">Book Tickets</button>
      </form>
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>