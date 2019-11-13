<?php
// session_start();
    include('session.php');
?>
  
    
<html>
   
   <head>
      <title>Welcome </title>
      <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

      <style>
        body{
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-image:linear-gradient(rgba(250,250,250,0.35),rgba(250,250,250,0.35)) ,url(images/878630.jpg);
    }
		.pass{
			width: 45%;
			text-align: center;
			border: 2px solid black;
			border-radius: 10px;
			font-size: 20px;
			margin-top: 20px;
			padding: 10px;
			margin-left: 300px;
      font-weight: bold;
		}
    h1{
      text-align: center;
    }
		.btn {
 			background-color: #4CAF50;
 			color: white;
  		padding: 12px 20px;
  		border: none;
  		border-radius: 8px;
			cursor: pointer;
 			width: 25%;
		}
    .sign_out{
      margin-top: 20px;
      margin-left: 900px;
      font-family: Lato;
      font-size: 20px;
    }
    .city{
      width: 25%;
      border: 1px solid black;
      border-radius: 3px;
      height: 40px;
      margin-top: 5px;
      background: none;
    }
		input[type=text]{
			width: 25%;
			border: 1px solid black;
			border-radius: 3px;
			height: 40px;
      margin-top: 5px;
      background: none;
		}
    input[type=date]{
      width: 25%;
      border: 1px solid black;
      margin-top: 5px;
      border-radius: 3px;
      height: 40px;
      background: none;
    }
    label{
      font-weight: bold;
      font-family: Lato;
      font-size: 17px;
    }
    input[type=time]{
      width: 25%;
      border: 1px solid black;
      margin-top: 5px;
      border-radius: 3px;
      height: 40px;
      background: none;
    }
    .num{
      margin-left: 350px;
    }
    .book{
      background: none;
      width: 125px;
      height: 35px;
      border: 1px solid black;
      font-size: 15px;
      font-weight: bold;
     
    }
    p{
      font-weight: bold;
    }
	</style>
  </head>
   
  <body>


    <?php 
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      if(!empty($_POST["num_of_tickets"]))
      {
        $_SESSION["departure"] = $_POST["dep_place"];
        $dep_place = $_SESSION["departure"];
        $_SESSION["destination"] = $_POST["des_place"];
        $des_place = $_SESSION["destination"];
        $_SESSION["date"] = $_POST["date"];
        $date = $_SESSION["date"];
        $_SESSION["time"] = $_POST["time"];
        $time = $_SESSION["time"];
        $_SESSION["numOfPassengers"] = $_SESSION["number"] = (int)$_POST["num_of_tickets"];
        $_SESSION["couponcode"] = $_POST["couponcode"];
        $query = "select Capacity from flights where departure = '$dep_place' and destination = '$des_place' and Date = '$date' and Time = '$time' limit 1";
        $exec1= mysqli_query($conn, $query);
        $num_of_rows = mysqli_num_rows($exec1);

        if ($num_of_rows == 0) {
        $message = "No flight available";
          echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else{
           $row = mysqli_fetch_assoc($exec1);
        
           $capacity = $row["Capacity"];

            if($capacity >= $_SESSION["number"])
           {
               header("Location: passDetails.php");
           }
           else{
              $message = "Booking full";
              echo "<script type='text/javascript'>alert('$message');</script>";
           } 
         }
      }
    }

     ?>
      <h1>Welcome <?php echo $login_session; ?></h1>
      <p class="sign_out"><a style="text-decoration: none; color: black;" href = "logout.php">Sign Out</a></p>
            <form class="my_form" action="" method="post">
            <pre>  
        <label>Enter departure:</label> <select id="city" name="dep_place" class="city">
                  <option value="">--</option>
                  <option value="Bangalore">Bangalore</option>
                  <option value="Delhi">Delhi</option>
                  <option value="Hyderabad">Hyderabad</option>
                  <option value="Gujarat">Gujarat</option>
                  <option value="Mumbai">Mumbai</option>
            </select> <br>
       <label>Enter destination:</label> <select id="city" name="des_place" class="city">
              <option value="">--</option>
              <option value="Bangalore">Bangalore</option>
              <option value="Delhi">Delhi</option>
              <option value="Hyderabad">Hyderabad</option>
              <option value="Gujarat">Gujarat</option>
              <option value="Mumbai">Mumbai</option>
            </select><br>
              <label>Enter date:</label> <input type="date" name="date"><br>
              <label>Enter time:</label> <input type="time" name="time"><br>
 <label>Enter number of tickets:</label> <input type="text" name="num_of_tickets" required><br>
      <label>Enter coupon code:</label> <input type="text" name="couponcode"><br><br>
                            <button class="book">Book Tickets</button>
    </pre>
      </form>
  </body>
   
</html>