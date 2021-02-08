<?php 
error_reporting(0);
session_start();

$user = $_SESSION['user_email'];
include 'conn.php';
$grand_total=0;
// 
// 
if(isset($_GET['removeid']))
{
    $p_id_del = $_GET['removeid'];
    // echo $p_id_del;
    $del_cart = "DELETE FROM `cart` WHERE  `product_id`=$p_id_del";
    $del_query = mysqli_query($con,$del_cart);
    unset($_GET['removeid']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>- CART -</title>
    <?php
        include '../Admin/links.php';
    ?>
    <link rel="stylesheet" href="css/cart.css">
</head>
<body>
    <?php include 'menu.php'; ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <?php 
                    $select_cart = "SELECT * FROM `cart` WHERE `user_email`='$user'";
                    $select_query =  mysqli_query($con,$select_cart);
                    while($res = mysqli_fetch_array($select_query))
                    {
                        $product_id = $res['product_id'];
                        $select_product = "SELECT * FROM `items_master` WHERE `id`='$product_id'";
                        $product_query = mysqli_query($con,$select_product);
                        $res_p = mysqli_fetch_array($product_query);
                        ?>
                            <div class="cardd">
                                <div class="row justify-content-center">
                                    <div class="col-lg-2 text-center">
                                        <img class="imgss" src="../Admin/<?php echo $res_p['item_photo'];?>" height="100px" width="152px">
                                    </div>
                                    <div class="col-lg-2">
                                        <p class="title">PRICE</p>
                                        <p><?php echo $res_p['price'];?></p>
                                    </div>
                                    <div class="col-lg-2">
                                        <p class="title">QTY</p>
                                        <p><?php echo $res['quantity'];?></p>
                                    </div>
                                    <div class="col-lg-2">
                                        <p class="title">TOTAL</p>
                                        <p><?php echo $res['total'];?></p>
                                        <?php $grand_total=$grand_total+$res['total'];?>
                                    </div>
                                    <div class="col-lg-2">
                                        <p class="remove"><a href="cart.php?removeid=<?php echo $product_id;?>">Remove</a></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        
                    }
                ?>

            </div>
        </div>
        <?php
            $count=mysqli_num_rows($select_query);
            if($count > 0)
            {
                ?>
                    <div class="cardd-2">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 text-center">
                                <p>Grand Total : <?php echo $grand_total;?>	&#8377;</p>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-10 text-center">
                                <P class="btnn"><a href="checkout.php?grandtotal=<?php echo $grand_total;?>">CHECK OUT</a></P>
                            </div>
                        </div>
                    </div>
                <?php
            }
            else
            {
                ?>
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-center">
                        <h1 class="a1">No Items In Cart</h1>
                    </div>
                </div>
                <?php
            }
        ?>
           
    </div>
</body>
</html>