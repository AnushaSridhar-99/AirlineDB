<?php
   include 'connection.php';
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = $_POST['username'];
      $mypassword = $_POST['password']; 
      
      $sql = "SELECT username FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $message = "Invalid username or password!";
         echo "<script type='text/javascript'>alert('$message');</script>"; 
        }
   }
?>
<html>
   
   <head>

    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
      <title>Login Page</title>
      
      <style>
         body{
            background-size: cover;
            background-repeat: no-repeat;
            background-origin: all;
            font-family: sans-serif;
            background-image:linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)) ,url(images/408200.jpg);
         }

         *{

          font-family: 'Lato', sans-serif;;

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
.signup{
  
  font-family: Lato;
  font-size: 25px;
  
}
.form-container .btn:hover{
  color: black;
}
#myForm1{
  margin-left: 250px;
  text-align: center;
}
.para{
  font-size: 85px;
  margin-left: 30px;
  color: #D9D9D9;
}
    li{
  display: inline-block;
  font-family: Roboto;
  font-size: 20px;
  padding: 20px 8px 20px 8px;
  margin-top: 25px;
}
a{
  color: #D9D9D9;
}
b{
  font-family: Lato;
}

      </style>
      
   </head>
   
   <body>
    <div class="col-md-6" align="margin-left">
  <p class="para">AVION</p></div>
  <div class="col-md-6" align="margin-left">
    <ul>
      <li><a href="homepage.html">Home</a></li>
      <li><a href="offers.html">Offers</a></li>
      <li><a href="contact.html">Contact</a></li>
      <li><a href="services.html">Services</a></li>
      <li style="color: #D0D3D4; font-family: Lato;">Login</li>
     
     </ul>
  </div>
  <div id="myForm1">
  <form class="form-container" action="" method="post">

    <label style="font-size: 20px; color: #D0D3D4;" for="username"><b>Username</b></label>
    <input type="text" placeholder="Username" name="username" required><br>

    <label style="font-size: 20px; color: #D0D3D4;" for="password"><b>Password</b></label>
    <input type="password" placeholder="Password" name="password" required>

    <button type="submit" class="btn">Login</button>
   
    <br><br>
    <div class="signup">
   <a style="color: #D0D3D4; font-size: 15px;text-decoration: none" href="demo2.html">Sign up?</a><br>
      </div>
  
    <!--signup page -->
  </form>
</div>
               

   </body>
</html>