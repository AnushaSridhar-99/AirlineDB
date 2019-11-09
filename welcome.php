<?php
   include('session.php');
    function show_form(){
      ?>
      <form action="passenger.php" method="post" class="pass">
    <pre>

        NAME:  <input type="text" name="name" required><br>
         AGE:  <input type="text" name="age" required><br>
 GENDER:  <input type="radio" name="gender" value="male">Male    <input type="radio" name="gender" value="Female">Female<br>
     CONTACT:  <input type="text" name="contact" required> <br>
   DEPARTURE:  <input type="text" name="dep" required> <br>
 DESTINATION:  <input type="text" name="dest" required> <br>
    DATE:  <input type="date" name="date" required><br>
    
      </pre>
    <button type="submit" name="submit" class="btn">CONFIRM</button>
    
  </form>
  
<?php

}
if($_SERVER["REQUEST_METHOD"] == "POST") {
    echo show_form();
  }

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
		input[type=text]{
			width: 50%;
			border: 0.5px solid black;
			border-radius: 10px;
			height: 40px;
      background: none;
		}
    input[type=date]{
      width: 50%;
      border: 0.5px solid black;
      border-radius: 10px;
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
    }
    p{
      font-weight: bold;
    }
	</style>
  </head>
   
  <body>
      <h1>Welcome <?php echo $login_session; ?></h1>
      <p class="sign_out"><a style="text-decoration: none; color: black;" href = "logout.php">Sign Out</a></p>
            <form style="font-weight: bold;" action="" method="post">
      Enter number of tickets :<input style="width: 25%; border-radius: 3px; border:1px solid black" type="text" name="num_of_tickets" required>
      <button class="book">Book Tickets</button>
      </form>
      
  </body>
   
</html>