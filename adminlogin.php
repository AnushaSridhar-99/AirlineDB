<?php
   include("connection.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myadminname = $_POST["adminname"];
      $mypassword = $_POST["password"];
      
      $sql = "SELECT AdminName FROM admin WHERE AdminName = '$myadminname' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         
         header("location: profile.php");
      }else {
         $error = "Your Admin Name or Password is invalid";
         echo "<script type='text/javascript'>alert('$error');</script>"; 
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body>
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "adminname" /><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
   
      
   </body>
</html>