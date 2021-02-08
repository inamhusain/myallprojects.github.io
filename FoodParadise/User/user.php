<?php 
error_reporting(0);
session_start();
$user_email = $_SESSION['user_email'];
if(!isset( $_SESSION['user_email']))
 {
        header('location:login.php');
 }
include 'conn.php';

$select = "SELECT * FROM `user` WHERE `email`='$user_email'";
$select_query=mysqli_query($con,$select);
$res = mysqli_fetch_array($select_query);
$user_name = $res['user_name'];
$address = $res['address'];
$mobile = $res['mobile'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>- User -</title>
    <?php include '../Admin/links.php'; ?>

    <link rel="stylesheet" href="css/user.css">
</head>
<body>
    <?php
    include 'menu.php';
    ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                   <div class="cardd">
                        <div class="row justify-content-center" id="img">
                                <div class="col-12 text-center">
                                    <img src="images/avatar7.png" height="100px" width="100px">
                                </div>
                        </div>

                        <div class="row justify-content-center" id="name">
                                <div class="col-12 text-center">
                                    <p>User Name : <?php echo $user_name;?></p>
                                </div>
                        </div>

                        <div class="row justify-content-center" id="email">
                                <div class="col-12 text-center">
                                    <p>User Email : <?php echo $user_email;?></p>
                                </div>
                        </div>
                        <div class="row justify-content-center" id="address">
                                <div class="col-12 text-center">
                                    <p>Delivery Address : <?php echo $address;?></p>
                                </div>
                        </div>
                        <div class="row justify-content-center" id="mobile">
                                <div class="col-12 text-center">
                                    <p>Mobile No : <?php echo $mobile;?></p>
                                </div>
                        </div>
                        <div class="row justify-content-center" id="name">
                                <div class="col-12 text-center">
                                    <a class="aaa" href="logout.php">LOG OUT</a>
                                </div>
                        </div>
                   </div>
            </div>
        </div>
    </div>
</body>
</html>