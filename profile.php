<?php
//this is the main login page add css file here
include('session.php');
if(!isset($_SESSION['login_user']))
{
    header("location: index.php"); // Redirecting To Home Page
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Your Home Page</title>
</head>
<body>
<div id="profile">
    <b id="welcome">Welcome : <i><?php echo $login_session; ?></i> </b>
    <b id="logout"><a href="logout.php">Log Out</a></b>
</div>
</body>
</html>