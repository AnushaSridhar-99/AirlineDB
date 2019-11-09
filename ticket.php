<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="ticket.css">


	<title>Ticket</title>
	<script>
		function checkbox(result) // this is to change the background color of the checked box
		{
			if(result.checked){
				result.parentNode.style.backgroundColor = "Red";
				result.parentNode.style.Color = "White";

			}
			else{
				result.parentNode.style.backgroundColor = " rgba(84, 148, 20, 0.842)";
				result.parentNode.style.Color = "";

			}
		}
	</script>
	<style>
	.input1{
		background-color:"white";
	}
	</style>
	
</head>
<body>

<?php
include('connection.php');
echo "<center>";
$date1 = $_POST["date1"];
$source = $_POST["source"];
$dest = $_POST["dest"];

$q1 = mysqli_query($conn,"select r_id from route where source = '$source' and dest = '$dest';");
$ex1 = mysqli_fetch_array($q1);
$num = mysqli_num_rows($q1);
if($num == 1){
	//print("there is a route");
	echo "<br>";
	echo "bus route";
	echo $ex1['r_id'];
	$route = $ex1['r_id'];
	echo "<br>";
	echo "travelling date";
	echo $date1;
}
else{ // alert if there is no route
	echo "<script>
	alert('no routes')
	window.location.href='home.php'
	</script>";
}
// SELECT s_id from seat WHERE s_id NOT IN (SELECT s_id from reserve and date='$date1');
// SELECT s_id from seat WHERE s_id NOT IN (SELECT s_id from reserve WHERE date='2019-10-31')
// SELECT s_id,'green' color from seat WHERE s_id NOT IN (SELECT s_id from reserve WHERE date='2019-10-31') UNION SELECT s_id,'red' FROM reserve WHERE  date='2019-10-31'


$q2 = mysqli_query($conn,"select s_id from reserve where r_id =$route and date = '$date1';"); // this will check which seat are reserved on a particular day


$q3 = mysqli_query($conn," SELECT s_id,'green' color from seat WHERE s_id NOT IN (SELECT s_id from reserve WHERE date='$date1') UNION SELECT s_id,'red' FROM reserve WHERE  date='$date1'"); //this will display which seats are vacant
$ex2 = mysqli_fetch_array($q2);

$ex3 = mysqli_fetch_array($q3);
$num1 =mysqli_num_rows($q2);
$num4 = mysqli_fetch_array($q3);
$q4 = mysqli_query($conn,"select s_id from seat;"); //selects all the seat from seat table
$dyn = '<table border="1" cellpadding ="20">';
$i = 0;

if($num4 == 0) // alert message is displayed if there is no seat
{
	echo "<script>
	alert('no seats available')
	window.location.href='home.php'
	</script>";
	
}

if($num1==0) // if no seat is reserved on particular date displays all seats 
{   
	echo "<form method='post' action='details.php'>";
	//print("all seats are availabe");
	while($row = mysqli_fetch_array($q4))
	{	
		$id = $row['s_id'];
		if($i%3==0){
		
		$dyn .='<tr><td><input type="checkbox" value='.$id.' onclick="checkbox(this)" name="seat[]" id="seat">'.$id.'</td>';
		$dyn .='<td><p></p></td>';


		}

		else{
			$dyn .='<td><input type="checkbox" value='.$id.' onclick="checkbox(this)" name="seat[]" id="seat">'.$id.'</td>';
		}
		$i++;
		
	}
	$dyn .= '</tr></table>';
	echo $dyn;
	echo "<br>";
	echo '<input type="hidden", name = "rot" value='.$route.'>';
	echo '<input type="hidden", name = "day" value='.$date1.'>';
	echo '<input type="hidden", name = "source" value='.$source.'>';
	echo '<input type="hidden", name = "dest" value='.$dest.'>';
	echo "<h5>click submit if you are sure about booking </h5>";
	echo "<input type= 'submit' class='btn btn-primary' value='submit' name='submit' id='submit'>";
	echo "</form>";
}
else // this will display only particular seats which are vacant
{	echo "<form method='post' action='details.php'>";
	//print("check the available");
	$ds = "<table border = '3' cellpadding='20'>";
	$j = 0;
	while($row1 = mysqli_fetch_array($q3))
	{
		$id1 = $row1['s_id'];
		if($j%3 == 0)
		{
		if($row1['color']=='green')
		{
		$ds .='<tr><td><input type="checkbox" value='.$id1.' onclick="checkbox(this)" name="seat[]" >'.$id1.'</td>';
		$ds .='<td><p>---</p></td>';
		}
		else if($row1['color']=='red'){
			$ds .='<tr><td><input type="checkbox" value='.$id1.' onclick="checkbox(this)" name="seat[]" disabled class="input1">'.$id1.'</td>';
			$ds .='<td><p>---</p></td>';
		}

		}
		else
		{
		if($row1['color']=='green')
		{
		$ds .='<td><input type="checkbox" value='.$id1.' onclick="checkbox(this)" name="seat[]">'.$id1.'</td>';
		}
	
	else if($row1['color']=='red')
	{
		$ds .='<td><input type="checkbox" value='.$id1.' onclick="checkbox(this)" name="seat[]" disabled class="input1">'.$id1.'</td>';
	}
}
		$j++;

	}

	$ds .= '</tr></table>';
	echo $ds;
	echo"<br>";
	echo '<input type="hidden", name = "rot" value='.$route.'>';
	echo '<input type="hidden", name = "day" value='.$date1.'>';
	echo '<input type="hidden", name = "source" value='.$source.'>';
	echo '<input type="hidden", name = "dest" value='.$dest.'>';
	
	echo "<input type= 'submit' class='btn btn-primary' name='submit' value='submit' id='submit'>";
	echo "</form>";
	
	}
echo "</center>";
?>

	
</body>
</html>
