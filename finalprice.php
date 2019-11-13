<?php
include 'connection.php';
session_start();
//web price is the price shown on website
// pass price a parameter from database
$departure = $_SESSION["departure"];
    $destination = $_SESSION["destination"];
    $date =  $_SESSION["date"];
    $time = $_SESSION["time"];

$query = "select Price from flights where departure ='$departure' and destination = '$destination' and Date = '$date' and Time = '$time' limit 1";
    $exec1= mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($exec1);
    $webprice = $row["Price"];

// create a coupon code variable in database

$coupon = $_SESSION["couponcode"];
// 18% gst on webprice
$newprice = $webprice * 1.05*$_SESSION["number"];
$_SESSION["finalprice"] = $newprice;

switch($coupon)
{
    case "STUD21":
        {
            $_SESSION["finalprice"] = $_SESSION["finalprice"] - ($_SESSION["finalprice"] * 3)/100;
            echo "You got additional 3% discount<br>";
            break;
        }
    case "FAM42":
        {
            $_SESSION["finalprice"] = $_SESSION["finalprice"] - ($_SESSION["finalprice"] *4)/100;
            echo "You got additional 4% discount<br>";
            break;
        }
    case "WED17":
        {
            $_SESSION["finalprice"] =$_SESSION["finalprice"] - ($_SESSION["finalprice"] * 3) /100;
            echo "you got additional 3% discount<br>";
            break;
        }
    case "NEWUSER57":
    {
        $_SESSION["finalprice"] = $_SESSION["finalprice"]- ($_SESSION["finalprice"] * 5)/100;
        echo "you got additional 5% discount<br>";
        break;
    }
    case "OLDGOLD60":
        {
            $_SESSION["finalprice"]=$_SESSION["finalprice"] - ($_SESSION["finalprice"] * 4) /100;
            echo "you got additional 3% discount<br>";
            break;
        }
    case "FEMALE20":
        {
            $_SESSION["finalprice"] = $_SESSION["finalprice"] - ($_SESSION["finalprice"] * 4.9)/100;
            echo "you got additional 5% discount <br>";
            break;
        }

    default:
    break;
    

}
//alert button to display final price
// final amount is stored in finalprice variable
echo $_SESSION["finalprice"];
?>
<form action="bookingConfirmed.php" method="post">
    <button type="submit">Confirm</button>
</form>
