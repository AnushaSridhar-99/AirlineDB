<?php

include 'connection.php';

//declare variables
 $username = $_POST["username"];
 $password = $_POST["password"];
 $firstname = $_POST["firstname"];
 $lastname = $_POST["lastname"];
 $contact = $_POST["contact"];

//store query in a variable
 $query = "select * from users where username ='$username'";


  //execute the query stored in variable $query and store result in variable $exec
 $exec = mysqli_query($conn,$query); 

// return number of rows

 $result = mysqli_num_rows($exec); 

 if($result == 1){
 	echo "user already exists";
 }
 else{
 	$query1 = "insert into users(username, password, Fname, Lname, Contact) values ('$username', '$password', '$firstname', '$lastname', '$contact')";
 	$exec1 = mysqli_query($conn,$query1);
 	echo "user created";
 }
?>