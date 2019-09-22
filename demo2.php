<?php
	
	$username = filter_input(INPUT_POST, 'username');
	$password = filter_input(INPUT_POST, 'password');
	
	
	if(!empty($username)) // if username is not empty
	{
		if (!empty($password)) // password not empty
		{
			$host = "localhost";
			$dbusername = "root";
			$dbpassword = "";
			$dbname = "demo2";

			// create connection
			$conn = new mysqli($host,$dbusername,$dbpassword,$dbname);

			if (mysqli_connect_error()) // to check database exists and store value
			{

				die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
			}
			else
			{

				$sql = " INSERT INTO demo2 (username,password) values('$username','$password')";

				if ($conn->query($sql)) //to check where values are inserted or not
				{
					echo "NEW USER CREATED";
				}
				else
				{
					echo "ERROR :" .$sql."<br>".$conn->error;
				}

				$conn->close(); //to close connertion from database;
			}
		}
		else // alert password is empty and redirect to html page
		{
			$message = "PASSWORD CANNOT BE EMPTY";
			echo "<script type='text/javascript'>alert('$message');</script>";

			include 'demo2.html';// to go to html page
			
		}
	}
	else // alert username is empty and redirect to html page
	{
		$message = "USERNAME CANNOT BE EMPTY";
			echo "<script type='text/javascript'>alert('$message');</script>";

			include 'demo2.html';
		
	}

?>