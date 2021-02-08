<?php error_reporting(0);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
   <?php 
   include 'links.php';
   ?> 
  <link rel="stylesheet" href="css/menu.css">
  <!-- <link rel="stylesheet" href="css/additems.css"> -->
</head>
<body>
     <!-- logo -->
     <div class="container-fluid sticky-top" id="logo">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <p>F O O D  P A R A D I S E</p>
            </div>
        </div>
    
        <hr>
    <!-- menu -->
   
        <div class="row justify-content-center" id="main">
            <div class="col-md-2 mar-pad-0">
                <div class="cont text-center">
                    <!-- <i class="fa fa-shopping-cart"></i> -->
                    <a href="index.php">Home</a>
                </div>
            </div>
            <div class="col-md-2 mar-pad-0">
                <div class="cont text-center">
                    <!-- <i class="fa fa-shopping-cart"></i> -->
                    <a href="additems.php">Add Items</a>
                </div>
            </div>
            <div class="col-md-2 mar-pad-0">
                <div class="cont text-center">
                    <!-- <i class="fa fa-shopping-cart"></i> -->
                    <a href="list_items.php">Edit Items</a>
                </div>
            </div>
            <div class="col-md-2 mar-pad-0">
                <div class="cont text-center">
                    <!-- <i class="fa fa-shopping-cart"></i> -->
                    <a href="orders_admin.php">Orders</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>