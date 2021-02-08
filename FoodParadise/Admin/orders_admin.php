<?php include 'conn.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>- orders | admin -</title>
    <?php include 'links.php';?>
    <link rel="stylesheet" href="css/list_items.css">
</head>
<body>
<?php include 'menu.php';?>
<div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 text-center">
                            <p class="h3"><b>Pending Orders</b></p>
                        </div>
                    </div>                  
                    <?php
                         $select_items_query = mysqli_query($con,"SELECT * FROM `orders` WHERE `status`='pending' ");              
                        
                        while($res = mysqli_fetch_array($select_items_query))
                        {
                            
                            $order_id = $res['id'];                                                
                             $product_id = $res['product_id'];
                             $select_product = mysqli_query($con,"SELECT * from `items_master` WHERE `id`='$product_id'  ");
                                while($res_product = mysqli_fetch_array($select_product))
                                {
                                        ?>
                                        <div class="cardd-cont">
                                            <div class="row justify-content-center">
                                                <div class="col-lg-2 text-center">
                                                    <img src="<?php echo $res_product['item_photo'];?>"height="100px" width="154px">
                                                </div>
                                                <div class="col-lg-2 text-center">
                                                    <p class="title">Item Name</p><br>
                                                    <P><?php echo $res_product['item_name'];?></P>
                                                </div>
                                                <div class="col-lg-2 text-center">
                                                    <p class="title">User Email</p><br>
                                                    <P><?php echo $res['user_email'];?></P>
                                                </div>
                                                <div class="col-lg-2 text-center">
                                                    <p class="title">Quantity</p><br>
                                                    <p><?php echo $res['quantity'];?></p>
                                                </div>
                                                <div class="col-lg-2 text-center">
                                                    <p class="title">Total Price</p><br>
                                                    <p><?php echo $res['total_price'];?></p>
                                                </div>
                                                <div class="col-lg-2 text-center">
                                                    <p class="title">Payment Method</p><br>
                                                    <p>COD</p>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-lg-3">
                                                    <div class="btnn">
                                                        <a href="ConformOrder.php?id=<?php echo $order_id;?>">Confirm Order</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>          
                                    <?php
                                }  
                            
                        }
                    ?>
                </div>
            </div>
        </div>
        <!--  -->
        <!-- ======================================== -->
        <!--  -->
        <!--  -->
        <!-- ========================================= -->
        <!--  -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 text-center">
                            <p class="h3"><b>Delivered Orders</b></p>
                        </div>
                    </div>                    
                    <?php
                         $select_items_query = mysqli_query($con,"SELECT * FROM `orders` WHERE `status`='delivered' ");              
                        
                        while($res = mysqli_fetch_array($select_items_query))
                        {
                            $order_id = $res['id'];                                                
                             $product_id = $res['product_id'];
                             $select_product = mysqli_query($con,"SELECT * from `items_master` WHERE `id`='$product_id'  ");
                                while($res_product = mysqli_fetch_array($select_product))
                                {
                                        ?>
                                        <div class="cardd-cont">
                                            <div class="row justify-content-center">
                                                <div class="col-lg-2 text-center">
                                                    <img src="<?php echo $res_product['item_photo'];?>"height="100px" width="154px">
                                                </div>
                                                <div class="col-lg-2 text-center">
                                                    <p class="title">Item Name</p><br>
                                                    <P><?php echo $res_product['item_name'];?></P>
                                                </div>
                                                <div class="col-lg-2 text-center">
                                                    <p class="title">User Email</p><br>
                                                    <P><?php echo $res['user_email'];?></P>
                                                </div>
                                                <div class="col-lg-2 text-center">
                                                    <p class="title">Quantity</p><br>
                                                    <p><?php echo $res['quantity'];?></p>
                                                </div>
                                                <div class="col-lg-2 text-center">
                                                    <p class="title">Total Price</p><br>
                                                    <p><?php echo $res['total_price'];?></p>
                                                </div>
                                                <div class="col-lg-2 text-center">
                                                    <p class="title">Payment Method</p><br>
                                                    <p>COD</p>
                                                </div>
                                            </div>
                                        </div>          
                                    <?php
                                }  
                            
                        }
                    ?>
                </div>
            </div>
        </div>
</body>
</html>