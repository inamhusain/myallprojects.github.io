<?php 
error_reporting(0);
session_start();
$user = $_SESSION['user_email'];
include 'conn.php';
$ID = $_GET['id']; //product id
$select_Query = "SELECT * FROM `items_master` WHERE `id`='$ID'";
$query = mysqli_query($con,$select_Query);
$res = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>- VIEW DETAILS -</title>
    <?php include '../Admin/links.php'; ?>
    <link rel="stylesheet" href="css/viewdetails.css">
</head>
<body>
    <?php include 'menu.php'; ?>
<?php 
if(isset($_POST['add_to_cart']))
{
    unset($_POST['add_to_cart']);   
    $qty =$_POST['quant'];
    // echo $qty;
    $total = $qty*$res['price'];
    $cart_insert = "INSERT INTO `cart`(`user_email`, `product_id`, `quantity`, `total`) VALUES ('$user',$ID,$qty,$total)";
    $query_cart = mysqli_query($con,$cart_insert);
    if($query_cart)
    {
        ?>
        <script>swal("", "Your item has been added to cart!", "success");
        var timer = setTimeout(function()
        {
            window.location.href="home.php"
        }, 1500);
        </script>
        <?php
    }
}
?>
    <form action="viewdetails.php?id=<?php echo $ID;?>" method="POST">
        <div class="container-fluid" id="main">
            <div class="row justify-content-center">
                <div class="col-md-4 text-center">
                    <div class="row">
                        <div class="col-md-12" id="row-img">
                            <img src="../Admin/<?php echo $res['item_photo'];?>" height="160px" width=254px>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="row" id="row-name">
                        <div class="col-md-12 text-center">
                            <p><?php echo $res['item_name'] ;?></p>
                        </div>
                    </div>
                    <div class="row" id="row-cate">
                        <div class="col-md-12 text-center">
                            <span><?php echo $res['category'];?></span>
                        </div>
                    </div>
                    <!-- address -->
                    <div class="row" id="row-cate">
                        <div class="col-md-12 text-center">
                            <span><?php echo $res['address'];?></span>
                        </div>
                    </div>
                    <!-- rating -->
                    <div class="row" id="row-rate">
                        <div class="col-md-12 text-center">
                            <span><i class="fa fa-star"> </i><?php echo " ".$res['rating'];?></span>
                            <span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                            <span><?php echo $res['miniutes'];?> Mins</span>
                            <span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                            <span><?php echo $res['price'];?> &#8377;</i></span>
                        </div>
                    </div>
                    <!-- type -->
                    <div class="row" id="row-type">
                        <div class="col-md-12 text-center">
                            <span><?php echo $res['type'];?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" id="buttons">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    <div class="row">
                        <div class="col-md-12">
                        <label>select Quantity</label>
                            <select  class="input" name="quant">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-3 text-center">
                            <input class="btn" type="submit" value=" &#128722; CART" name="add_to_cart">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
</body>
</html>
