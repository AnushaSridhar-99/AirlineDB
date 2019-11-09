<?php
   include('session1.php');
?>
<html">
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $login_session; ?></h1> 
      <h2><a href = "logout1.php">Sign Out</a></h2>


       <form action="addflight.php" method="post">
    <pre>

   FLIGHT ID:  <input type="text" name="flightID" required><br>
   DEPARTURE:  <select id="city" name="dep_place">
              <option value="">--</option>
              <option value="Bangalore">Bangalore</option>
              <option value="Delhi">Delhi</option>
              <option value="Hyderabad">Hyderabad</option>
              <option value="Gujarat">Gujarat</option>
              <option value="Mumbai">Mumbai</option>
            </select><br>
 DESTINATION:  <select id="city" name="des_place">
              <option value="">--</option>
              <option value="Bangalore">Bangalore</option>
              <option value="Delhi">Delhi</option>
              <option value="Hyderabad">Hyderabad</option>
              <option value="Gujarat">Gujarat</option>
              <option value="Mumbai">Mumbai</option>
            </select><br>  
        DATE:  <input type="date" name="date" required> <br>
        TIME:  <input type="time" name="time" required> <br>
    CAPACITY:  <input type="text" name="capacity" required> <br>
       PRICE:  <input type="text" name="price" required><br>
    
      </pre>
    <button type="submit" name="submit" class="btn">ADD FLIGHT</button>
    
  </form>
  <form method="post" action="details.php"> 
      <p>CHECK BOOKINGS FOR:</p><input type="text" name="flightID" required><br>
      <button type="submit">CHECK BOOKINGS</button>
  </form>
   </body>
   
</html>