<?php
include 'connection.php';
//web price is the price shown on website
// pass price a parameter from database
$webprice = $_POST["price"];
// create a coupon code variable in database

$coupon = $_POST["couponcode"];
// 18% gst on webprice
$newprice = $webprice + ($webprice * 0.18);
$finalprice = $newprice;

switch($coupon)
{
    case "STUD21":
        {
            $finalprice = ($finalprice * 3)%100;
            echo "You got additional 3% discount";
            break;
        }
    case "FAM42":
        {
            $finalprice = ($finalprice *4)%100;
            echo "You got additional 4% discount";
            break;
        }
    case "WED17":
        {
            $finalprice = ($finalprice * 3) %100;
            echo "you got additional 3% discount";
            break;
        }
    case "NEWUSER57":
    {
        $finalprice = ($finalprice * 5)%100;
        echo "you got additional 5% discount";
    }
    case "OLDGOLD69":
        {
            $finalprice = ($finalprice * 4) %100;
            echo "you got additional 3% discount";
            break;
        }
    case "CUNN60":
        {
            $finalprice = ($finalprice * 4.5)%100;
            echo "you got additional 5% discount";
        }

    default:
    break;
    

}
//alert button to display final price
// final amount is stored in finalprice variable
echo"the final price for you booking is"+$finalprice;
?>