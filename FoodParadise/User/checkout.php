<?php
error_reporting(0);
    session_start();
    $user = $_SESSION['user_email'];
    include 'conn.php';
    $grandtotal=$_GET['grandtotal'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>- CHECK OUT -</title>
    <?php include '../Admin/links.php'?>
    <link rel="stylesheet" href="css/checkout.css">
</head>
<body>
    <?php
        if(isset($_GET['placeorder']))
        {
            // echo $_GET['placeorder'];
            $select_user_cart = "SELECT * FROM `cart` WHERE `user_email`='$user'";
            $select_user_cart_query = mysqli_query($con,$select_user_cart);
            while($res_cart_items = mysqli_fetch_array($select_user_cart_query))
            {
                $product_id=$res_cart_items['product_id'];
                $qty = $res_cart_items['quantity'];
                $status = 'pending';
                $p_total=$res_cart_items['total'];
                $insert_order = "INSERT INTO `orders`(`user_email`, `product_id`, `quantity`, `status`, `total_price`) VALUES ('$user',$product_id,$qty,'$status',$p_total)";
                $insert_order_query = mysqli_query($con,$insert_order);
                // 
                if($insert_order_query)
                {
                    $delete_cart_item = "DELETE FROM `cart` WHERE `product_id`=$product_id AND `user_email`='$user'";
                    $delete_cart_item_query = mysqli_query($con,$delete_cart_item);
                    if($insert_order_query)
                    {
                        ?>
                        <script>
                            swal("Are you sure want to placed an order?")
                            .then((value) => {
                                swal({title: "",text: "Your order has been placed",icon: "success"});
                                var timer = setTimeout(function()
                                        {
                                            window.location.href="home.php"
                                        }, 2000);
                            });
                                
                        </script>
                        <?PHP
                    }
                }
            }
            unset($_GET['placeorder']);
        }
    ?>
    <?php include 'menu.php';
    $select_user = "SELECT * FROM `user` WHERE `email`='$user'";
    $select_query = mysqli_query($con,$select_user);
    $res_user = mysqli_fetch_array($select_query);
    $address= $res_user['address'];
    $mobile = $res_user['mobile'];
    // echo $address;
    
    ?>
    <div class="container">
        <div class="row">
                <div class="col-lg-8" id="address">
                    <div class="div">
                        <p class="title">Delivery Address</p>
                        <div class="ad1" id="ad1">
                            <p class="inner_fonts"><?php echo $res_user['address'];?></p>
                        </div>
                        <form method="POST">
                            <div class="ad2" id="ad2">
                                <p class="note">This changes will be saved as permanently.</p>
                                <input class="inp" type="text" name="new_address" placeholder="Address" value="<?php echo $res_user['address'];?>" required>
                                <input class="inp" type="text" name="new_mobile" placeholder="Mobile No" value="<?php echo $res_user['mobile'];?>" required>
                                <input class="btnn" type="submit" value="Save" name="save_address">
                            </div>
                        </form>
                        <input id="ChangeAddress" class="btnn" type="button" value="Change Address" onclick="changeaddress()">
                    </div>
                    <div class="div">
                        <p class="title">Payment Method</p>
                        <input type="radio" checked><label class="inner_fonts">&nbsp;Cash On Delivery</label><br>
                        <input type="radio" disabled><label class="inner_fonts">&nbsp;Net Banking</label>
                    </div>
                </div>

                <div class="col-lg-4" id="detail">
                        <div class="div">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <P class="title">Bill Details</P>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="col-lg-6"><P class="title">Grand total</P></div>
                                            <div class="col-lg-6 text-right"><span class="inner_fonts">&#8377;<?php echo $grandtotal;?></span></div>
                                        </div>
                                    
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="col-lg-6"><P class="title">Delivery Charge</P></div>
                                            <div class="col-lg-6 text-right"> <span class="inner_fonts">Free</span></div>
                                        </div>
                                    
                                    </div>
                                </div>

                            <hr>

                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="col-lg-6"><P class="title">To Pay</P></div>
                                            <div class="col-lg-6 text-right"><P class="inner_fonts">&#8377;<?php echo $grandtotal?></P></div>
                                        </div>

                                    </div>
                                </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-12 text-center">
                                   <div class="btn_placeorder">
                                   <a href="checkout.php?placeorder=true&grandtotal=<?php echo $grandtotal;?>">Place order</a>
                                   </div>
                                </div>
                            </div>
                        </div>
                </div>
    </div>
    <script>
        function changeaddress()
        {
            document.getElementById('ad1').style.display="none";
            document.getElementById('ad2').style.display="revert";
            document.getElementById('ChangeAddress').style.display="none";

        }
        function redirect()
        {
            window.location.href="cart.php";
        }
    </script>
    <?php
        if(isset($_POST['save_address']))
        {
           $new_address = $_POST['new_address'];
           $new_mobile = $_POST['new_mobile'];
           $insert_new_user_detail = mysqli_query($con,"UPDATE `user` SET `address`='$new_address',`mobile`= '$new_mobile' WHERE `email`='$user'");
           if($insert_new_user_detail)
           { 
               ?>
               <script>
                   redirect();
               </script>
               <?php
           }
        }
    ?>
    </body>
</html>