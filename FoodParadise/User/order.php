<?php 
error_reporting(0);
session_start();
include 'conn.php';
$user_email = $_SESSION['user_email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>- ORDERS -</title>
    <?php 
        include '../Admin/links.php';
    ?>
    <link rel="stylesheet" href="css/orders.css">
</head>
<body>
    <?php include 'menu.php';?>
    <form method="POST">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <p class="title text-center">- PENDING ORDERS -</p>
                </div>
            </div>
            <div class="row">

                    <?php 
                        $selectquery = "SELECT * FROM `orders` WHERE `user_email`='$user_email' AND `status`='pending'";
                        $query = mysqli_query($con,$selectquery);
                        while($res = mysqli_fetch_array($query))
                        {
                            $p_id = $res['product_id'];
                            $order_id =$res['id'];
                            $sel_query = "SELECT * FROM `items_master` WHERE `id`=$p_id";
                            $query_sel = mysqli_query($con,$sel_query);
                            while($res_id = mysqli_fetch_array($query_sel))
                            {
                                ?>
                                    <div class="col-lg-3 text-center">
                                        <div class="card_crd">
                                            <div class="row justify-content-center">
                                                <div class="col-md-12 text-center">
                                                    <img src="../Admin/<?php echo $res_id['item_photo'];?>" height="100px" width="150px" ">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p>Item Name : <?php echo $res_id['item_name'];?></p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p>Price : ( <?php echo $res['quantity'];?> &#215; <?php echo $res_id['price'];?> ):<?php echo  $res['quantity']*$res_id['price'];?></p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p>Status : <?php echo $res['status'];?></p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input class="btnnn" type="submit" value="cancle order" name="submit"> 
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
        <?php 
            if(isset($_POST['submit']))
            {
                $delete = "DELETE FROM `orders` WHERE `id`='$order_id'";
                $delete_query = mysqli_query($con,$delete);
                
                if($delete_query)
                {
                    ?>
                    <script>
                       swal({
                            title: "Are you sure?",
                            text: "Once deleted, you will not be able to recover your order!",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                            })
                            .then((willDelete) => {
                                if (willDelete) 
                                {
                                    swal("Your Order has been deleted!", {
                                    icon: "success",
                                    });
                                    var timer = setTimeout(function()
                                    {
                                        window.location.href="order.php"
                                    }, 2000);
                                } 
                                else
                                {
                                    swal("Your imaginary file is safe!");
                                }
                            });
                    </script>
                    <?php
                }
            }
        ?>
    </form>



   
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <p class="title text-center">- DELIVERED ORDERS -</p>
                </div>
            </div>
            <div class="row">

                    <?php 
                        $selectquery = "SELECT * FROM `orders` WHERE `user_email`='$user_email' AND `status`='delivered'";
                        $query = mysqli_query($con,$selectquery);
                        while($res = mysqli_fetch_array($query))
                        {
                            $p_id = $res['product_id'];
                            $order_id =$res['id'];
                            $sel_query = "SELECT * FROM `items_master` WHERE `id`=$p_id";
                            $query_sel = mysqli_query($con,$sel_query);
                            while($res_id = mysqli_fetch_array($query_sel))
                            {
                                ?>
                                    <div class="col-lg-3 text-center">
                                        <div class="card_crd">
                                            <div class="row justify-content-center">
                                                <div class="col-md-12 text-center">
                                                    <img src="../Admin/<?php echo $res_id['item_photo'];?>" height="100px" width="150px" ">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p>Item Name : <?php echo $res_id['item_name'];?></p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p>Price : ( <?php echo $res['quantity'];?> &#215; <?php echo $res_id['price'];?> ):<?php echo  $res['quantity']*$res_id['price'];?></p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p>Status : <?php echo $res['status'];?></p>
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
        
</body>
</html>
