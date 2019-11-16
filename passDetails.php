 <?php
 session_start();
 if (!(isset($_SESSION["numOfPassengers"])))
{
		 die("There was an error");
}

if($_SESSION["numOfPassengers"] == 0)
{
	header("Location: finalprice.php");
}
   ?>
   <!DOCTYPE html>
   <html>
   <head>
   	<title>Enter Passenger Details</title>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

    <style>
       body{
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-image:linear-gradient(rgba(250,250,250,0.45),rgba(250,250,250,0.45)) ,url(images/878630.jpg);
    }
      input[type=text]{
      width: 250px;
      border: 1px solid black;
      border-radius: 3px;
      height: 40px;
      margin-top: 5px;
      background: none;
    }
    .btn{
      background: none;
      width: 125px;
      height: 35px;
      border: 1px solid black;
      font-size: 15px;
      font-weight: bold;
      margin-left: 130px;
     
    }
    label{
      font-weight: bold;
      font-family: Lato;
      font-size: 17px;
    }
    .pass{
      border: 1px solid black;
      width: 37%;
      padding-bottom: 25px;
      margin-left: 340px;
    }
    </style>
   </head>
   <body>

   	<form action="passenger.php" method="post" class="pass">
    <pre>
        <!-- Passenger <?php $counter ?> details: -->
                 <label style="text-align: center;">PASSENGER DETAILS</label><br>
       <label> Name:</label>  <input type="text" name="name" required><br>
         <label> Age:</label>  <input type="text" name="age" required><br><br>
      <label>Gender:</label>   <input type="radio" name="gender" value="male">Male    <input type="radio" name="gender" value="Female">Female<br><br>
     <label>Contact:</label>  <input type="text" name="contact" required> <br>
      </pre>
    <button type="submit" name="submit" class="btn">CONFIRM</button><br>
    
  </form>
   
   </body>
   </html>



 