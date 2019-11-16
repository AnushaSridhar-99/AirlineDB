<?php
 // session_start();
     include('session.php');
    if((empty($_SESSION["login_user"]))){
        echo "<script>alert('Please login to continue!'); window.location = './login.php';</script>";
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
      background-image:linear-gradient(rgba(250,250,250,0.45),rgba(250,250,250,0.45)) ,url(images/878630.jpg);
    }
    h1{
      text-align: center;
      font-family: Lato;
    }
    .sign_out{
      margin-top: 20px;
      margin-left: 900px;
      font-family: Lato;
      font-size: 20px;
    }
		input[type=text]{
			width: 250px;
			border: 1px solid black;
			border-radius: 3px;
			height: 40px;
      margin-top: 5px;
      background: none;
		}
    #city{
      width: 250px;
      border: 1px solid black;
      border-radius: 3px;
      height: 40px;
      margin-top: 5px;
      background: none;
    }
    input[type=date]{
      width: 250px;
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
      width: 250px;
      border: 1px solid black;
      margin-top: 5px;
      border-radius: 3px;
      height: 40px;
      background: none;
    }
    .book{
      background: none;
      width: 125px;
      height: 35px;
      border: 1px solid black;
      font-size: 15px;
      font-weight: bold;
     
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
    .my_form{
      border: 1px solid black;
      width: 45%;
      padding-bottom: 25px;
      margin-left: 310px;
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
        $dep_place = $_SESSION["departure"] = $_POST["dep_place"];
        $des_place = $_SESSION["destination"] = $_POST["des_place"];
        $date = $_SESSION["date"] = $_POST["date"];
        $time = $_SESSION["time"] = $_POST["Time"];
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
              <label>Departure:</label> <input type="text" name="dep_place" value = "<?php echo $_SESSION["dep_place"]; ?>" readonly><br>
             <label>Destination:</label> <input type="text" name="des_place" value = "<?php echo $_SESSION["des_place"]; ?>" readonly><br>
                    <label>Date:</label> <input type="date" name="date" value = "<?php echo $_SESSION["depdate"]; ?>" readonly><br></pre>
              <label style="margin-left: 100px;">Select time:</label> <?php 
              $depp = $_SESSION['dep_place'];
              $dess = $_SESSION['des_place'];
              $datee = $_SESSION['depdate'];
                  include 'connection.php' ;
               $sql = "select Time from flights where departure = '$depp' and destination = '$dess' and Date = '$datee'";
              $result=mysqli_query($conn, $sql);
              if($result == FALSE) {
              echo "error!";
              }
              ?>  
              <?php
              echo "<select id = 'city' name = 'Time'>";
              while ($row = mysqli_fetch_array($result)) {
              echo "<option value='" . $row['Time'] ."'>" . $row['Time']."</option>";
              }
              echo "</select>";
              ?><br><pre>
 <label>Enter number of tickets:</label> <input type="text" name="num_of_tickets" required><br>
      <label>Enter coupon code:</label> <input type="text" name="couponcode"><br><br>
                            <button class="book">Book Tickets</button>
    </pre>
      </form>
      <?php
        include 'connection.php';

         $query = "select * from booking where username = '$login_session'";
  $exec = mysqli_query($conn, $query);

  $num_of_rows = mysqli_num_rows($exec);
  if ($num_of_rows>=1) {
    echo "<p>BOOKING DETAILS</p>";
    echo '<table>';
    echo '<tr><th>Booking ID</th>';
    echo '<th>Username</th>';
    echo "<th>Flight ID</th>";
    echo '<th>Ticket count</th>';
    echo '<th>Price</th>';
    echo '<th>Status</th>';
    
    echo '</tr>';
    while($row=mysqli_fetch_assoc($exec))
      {
        echo '<tr>';
          echo '<td>'.$row['BookingID'].'</td>';
          echo '<td>'.$row['username'].'</td>';
          echo "<td>".$row['flightID']."</td>";
          echo '<td>'.$row['no_of_tickets'].'</td>';
          echo '<td>'.$row['price'].'</td>';
          echo '<td>'.$row['status'].'</td>';
          
          echo '</tr>';
      }
      
  }
  else{
    echo '<div>No bookings...</div>';
  
  }
      ?>
  </body>
   
</html>