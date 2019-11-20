<?php
include 'connection.php';
include 'session1.php';

    if($_SERVER["REQUEST_METHOD"] == "POST") {
   $flightID = $_POST["flightID"];

   $query = "delete from flights where flightID = '$flightID'";
   $exec = mysqli_query($conn, $query);
   if ($exec) {
      $message = "Flight deleted";
    echo "<script type='text/javascript'>alert('$message');</script>"; 
   }
   else {
      echo "<script>alert('error!');</script>"; 
   }
 }
?>
<html>

<head>
   <title>Welcome Admin </title>
   <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

   <style>
      body {
         background-size: cover;
         background-repeat: no-repeat;
         background-attachment: fixed;
         background-image: linear-gradient(rgba(250, 250, 250, 0.45), rgba(250, 250, 250, 0.45)), url(images/878630.jpg);
         background-origin: all;
       
      }

      * {

         font-family: 'Lato', sans-serif;
         ;

      }

      input[type=text]{
      width: 250px;
      border: 1px solid black;
      border-radius: 3px;
      height: 40px;
      margin-top: 5px;
      background: none;
    }

      input[type=date] {
         width: 250px;
      border: 1px solid black;
      border-radius: 3px;
      height: 40px;
      margin-top: 5px;
      background: none;
      }

      input[type=time] {
         width: 250px;
      border: 1px solid black;
      border-radius: 3px;
      height: 40px;
      margin-top: 5px;
      background: none;
      }

     
     .btn {
        background: none;
        padding: 6px 10px 6px 10px;
      height: 35px;
      border: 1px solid black;
      font-size: 15px;
      font-weight: bold;

      }

      .abcd {
          width: 250px;
      border: 1px solid black;
      border-radius: 3px;
      height: 40px;
      margin-top: 5px;
      background: none;


      }


      .signup {

         font-family: Lato;
         font-size: 25px;

      }
       h1{
      text-align: center;
    }

      .myForm1 {
      border: 1px solid black;
      width: 42%;
      padding-bottom: 25px;
      margin-left: 310px;
      padding-left: 30px;
      }

      .para {
         font-size: 85px;
         margin-left: 30px;
         color: #D9D9D9;
      }

      li {
         display: inline-block;
         font-family: Lato;
         font-size: 20px;
         padding: 20px 8px 20px 8px;
         margin-top: 25px;
      }
      .sign_out{
      margin-top: 20px;
      margin-left: 900px;
      font-family: Lato;
      font-size: 20px;
    }
    label{
      font-weight: bold;
      font-family: Lato;
      font-size: 17px;
    }
   </style>
</head>

<body>
   <h1>Welcome <?php echo $login_session; ?></h1>
   <p class="sign_out"><a style="text-decoration: none; color: black;" href = "logout1.php">Sign Out</a></p>

   
   <form action="addflight.php" method="post" class="myForm1">
      <label style="font-family: Lato; font-size: 27px; margin-left: 140px; font-weight: bold;">ADD FLIGHT</label>
     
         <pre>
             <label> Flight ID:</label> <input type="text" name="flightID" required><br>
        <label> Departure: </label><select name="dep_place" class="abcd">
              <option value="--">--</option>
              <option value="Bangalore">Bangalore</option>
              <option value="Delhi">Delhi</option>
              <option value="Hyderabad">Hyderabad</option>
              <option value="Gujarat">Gujarat</option>
              <option value="Mumbai">Mumbai</option>
            </select><br>
     <label> Destination:</label> <select name="des_place" class="abcd">
              <option value="--">--</option>
              <option value="Bangalore">Bangalore</option>
              <option value="Delhi">Delhi</option>
              <option value="Hyderabad">Hyderabad</option>
              <option value="Gujarat">Gujarat</option>
              <option value="Mumbai">Mumbai</option>
            </select><br> 
                      <label> Date: </label><input type="date" name="date" required> <br>
                       <label>Time:</label> <input type="time" name="time" required> <br>
              <label>Capacity:</label> <input type="text" name="capacity" required> <br>
                    <label>   Price:</label> <input type="text" name="price" required><br>
        <button style="margin-left: 150px;" type="submit" name="submit" class="btn">ADD FLIGHT</button>
      </pre>
    </form>
   <br><br>
   <form method="post" action="details.php" class="myForm1">
  <label style="font-family: Lato; font-size: 27px; margin-left: 110px; font-weight: bold;">CHECK BOOKINGS</label><br><br>
  <label>Enter Flight ID: </label> <input type="text" name="flightID" required><br><br>
   <button style=" margin-left: 150px;" type="submit" name="checkbook" class="btn">CHECK BOOKING</button>
   </form>
   <br><br>

  <form action="" method="post" class="myForm1">
    <label style="font-family: Lato; font-size: 27px; margin-left: 110px; font-weight: bold;">CANCEL A FLIGHT</label><br><br>
    <label>Enter Flight ID: </label> <input type="text" name="flightID" required><br><br>
    <button style="margin-left: 180px;" class="btn" name="submit" type="submit">Confirm</button>
  </form>

</body>

</html>