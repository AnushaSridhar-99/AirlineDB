<?php

include 'connection.php';
 $username = $_POST["from"];
 $password = $_POST["to"];
 $firstname = $_POST["firstname"];
 $lastname = $_POST["lastname"];
 $contact = $_POST["contact"];

 $query = "select * from users where username ='$username'";
 $exec = mysqli_query($conn,$query);  //execute the query stored in variable $query and store result in variable $exec
 $result = mysqli_num_rows($exec); // return number of rows
 if($result == 1){
 	echo "user already exists";
 }
 else{
 	$query1 = "insert into users(username, password, Fname, Lname, Contact) values ('$username', '$password', '$firstname', '$lastname', '$contact')";
 	$exec1 = mysqli_query($conn,$query1);
 	echo "user created";
 }

?>