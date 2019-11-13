<?php
   include('session1.php');
?>
<html>

<head>
   <title>Welcome Admin </title>
   <style>
      body {
         background-size: cover;
         background-repeat: no-repeat;
         background-attachment: fixed;
         background-image: linear-gradient(rgba(250, 250, 250, 0.35), rgba(250, 250, 250, 0.35)), url(images/878630.jpg);
         background-origin: all;
       
      }

      * {

         font-family: 'Lato', sans-serif;
         ;

      }

      .form-container {
         max-width: 500px;
         padding: 70px;
         margin-top: 20px;

      }

      .form-container input[type=text] {
         width: 100%;
         padding: 15px;
         margin: 5px 0 22px 0;
         border: none;
         background: #f1f1f1;
         border-radius: 5px;
      }

      .form-container input[type=date] {
         width: 100%;
         padding: 15px;
         margin: 5px 0 22px 0;
         border: none;
         background: #f1f1f1;
         border-radius: 5px;
      }

      .form-container input[type=time] {
         width: 100%;
         padding: 15px;
         margin: 5px 0 22px 0;
         border: none;
         background: #f1f1f1;
         border-radius: 5px;
      }

      .form-container input[type=password] {
         width: 100%;
         padding: 15px;
         margin: 5px 0 22px 0;
         border: none;
         background: #f1f1f1;
         border-radius: 5px;
      }

      .form-container .btn {
         background-color: #2ECC71;
         color: white;
         padding: 12px 20px;
         border: none;
         border-radius: 5px;
         cursor: pointer;
         width: 38%;
         font-size: 15px;
      }

      .abcd {
         width: 100%;
         padding: 15px;
         margin: 5px 0 22px 0;
         border: none;
         background: #f1f1f1;
         border-radius: 5px;
         height: 30px;


      }


      .signup {

         font-family: Lato;
         font-size: 25px;

      }

      .form-container .btn:hover {
         color: black;
      }

      #myForm1 {
         margin-left: 500px;
         text-align: center;

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

      a {
         color: #D9D9D9;
      }

      b {
         font-family: Lato;
      }

      .myForm1 {
         align-self: center;
      }
   </style>
</head>

<body>
   <h1> <?php echo $login_session; ?></h1>
   <h2 style="float:right;"><a href="logout1.php">Sign Out</a></h2>
 <div class="myForm1">

   <form action="addflight.php" method="post" class="form-container">

     
         <pre>
   FLIGHT ID: 
   <input type="text" name="flightID" required><br>
   DEPARTURE: 
   <select id="city" name="dep_place" class="abcd">
              <option value="">--</option>
              <option value="Bangalore">Bangalore</option>
              <option value="Delhi">Delhi</option>
              <option value="Hyderabad">Hyderabad</option>
              <option value="Gujarat">Gujarat</option>
              <option value="Mumbai">Mumbai</option>
            </select><br>
   DESTINATION: 
   <select id="city" name="des_place" class="abcd">
              <option value="">--</option>
              <option value="Bangalore">Bangalore</option>
              <option value="Delhi">Delhi</option>
              <option value="Hyderabad">Hyderabad</option>
              <option value="Gujarat">Gujarat</option>
              <option value="Mumbai">Mumbai</option>
            </select><br>  
   DATE:  
   <input type="date" name="date" required> <br>
   TIME:  
   <input type="time" name="time" required> <br>
   CAPACITY:  
   <input type="text" name="capacity" required> <br>
   PRICE:  
   <input type="text" name="price" required><br>
   <button type="submit" name="submit" class="btn">ADD FLIGHT</button>
      </pre>
   
   </form>
   
   <form method="post" action="details.php" class="form-container">
   <h1>CHECK BOOKINGS FOR:</h1><input type="text" name="flightID" required><br>
   <button type="submit" name="checkbook" class="btn">CHECK BOOKING</button>
   </form>
   
</div>

</body>

</html>