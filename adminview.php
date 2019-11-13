

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Passanger details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

</head>

<body>
<table class="table table-bordered">
<tr>
<th>Name</th> 
<th>Age</th> 
<th>Gender</th> 
<th>Flight ID</th>
<th>PNR Number</th>
</tr>
<?php
    include 'connection.php';
    $sql = "SELECT * FROM passengers";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td> " . $row["name"]. "</td><td>" . $row["age"] . "</td><td>".$row["gender"]. "</td><td>".$row["flightID"]. "</td><td>". $row["PNRNumber"]. "</td>" ;
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>

    

</body>

</html>