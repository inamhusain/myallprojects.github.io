<?php
include 'conn.php';
$orderID = $_GET['id'];
$update_rec = mysqli_query($con,"UPDATE `orders` SET `status`= 'delivered' WHERE `id`='$orderID'");
if($update_rec)
{
    header('location:orders_admin.php');
}
?>