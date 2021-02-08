<?php
include 'conn.php';
$select_total_items = "SELECT * FROM `items_master`";
$select_total_items_query = mysqli_query($con,$select_total_items);
$total_items = mysqli_num_rows($select_total_items_query);

$select_pending_orders = "SELECT * FROM `orders` WHERE `status`='pending'";
$select_pending_orders_query = mysqli_query($con,$select_pending_orders);
$total_pending_orders = mysqli_num_rows($select_pending_orders_query);

$select_delivered_orders_query = mysqli_query($con,"SELECT * FROM `orders` WHERE `status`='delivered'");
$total_delivered_order = mysqli_num_rows($select_delivered_orders_query);
$total_estimate_cost = 0;
while($res = mysqli_fetch_array($select_delivered_orders_query))
{
    $total_estimate_cost = $total_estimate_cost + $res['total_price'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>- A | HOME -</title>
    <?PHP include 'links.php';?>
    <link rel="stylesheet" href="css/index.css">
</head>
<body style="background:#383A3F;">
    <?php include 'menu.php'; ?>
</body>
    <div class="container">
        <div class="row justify-content-center">
               
                <div class="col-lg-3 text-center">
                        <div class="cardd" onclick="f1()">
                            <p class="title">Total Items</p>
                            <P class="inr-p"><?php echo $total_items;?></P>
                        </div>
                </div>
                    <div class="col-lg-3 text-center">
                        <div class="cardd" onclick="f2()">
                            <p class="title">Pending Orders</p>
                            <P class="inr-p"><?php echo $total_pending_orders;?></P>
                        </div>
                    </div>
                    <div class="col-lg-3 text-center">
                        <div class="cardd" onclick="f2()">
                            <p class="title">Delivered orders</p>
                            <P class="inr-p"><?php echo $total_delivered_order;?></P>
                        </div>
                    </div>
                
                    
                
                   
            
        </div>

        <div class="row justify-content-center">
            
               <div class="col-lg-3 text-center">
                   <div class="cardd-2">
                        <p class="title">Total Employee</p>
                        <P class="inr-p">152</P>
                    </div>
                </div>
               <div class="col-lg-3 text-center">
                   <div class="cardd-2">
                        <p class="title">Estimated orders (&#8377;)</p>
                        <P class="inr-p"><?php echo $total_estimate_cost;?></P>
                    </div>
                </div>
                    
                
                    
               
          
        </div>

    </div>
</html>

<script>
    function f1()
    {
        window.location.href = "list_items.php";
    }
    function f2()
    {
        window.location.href = "orders_admin.php";
    }
</script>