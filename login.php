<?php
   include 'connection.php';
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT username FROM users WHERE username = '$myusername' and passcode = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         echo "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style>
         body{
            background-size: cover;
            background-repeat: no-repeat;
            background-origin: all;
         }
        
         .form1 {
 
  background-color: white;
  display: none;
  position: fixed;
  bottom: 100px;
  left: 32%;
  border: 3px solid #B9B9BA;
  border-radius: 5px;
<!-- dc dx-->
}
.form-container {
  max-width: 500px;
  padding: 70px;
  
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
#n1{
  background-color: #444444;
}
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  width: 38%;
  
}
.form-container .btn:hover{
  color: black;
}
a{
   color: white;
}
b{
   color: white;
}

      </style>
      
   </head>
   
   <body background="images/408200.jpg">
	
      
               
               <div id="myForm1">
  <form class="form-container" action="" method="post">

    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="User name" name="username" required><br>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Password" name="password" required>

    <button type="submit" class="btn">Login</button>
   
    <br><br>
    <a href="demo2.html">Sign up?</a><br>
    <!--signup page -->
    <a href="">Forgot Password</a>
  </form>
</div>
               

   </body>
</html>