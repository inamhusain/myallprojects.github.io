<?php
include 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>- EDIT ITEMS -</title>
    <?php include 'links.php'?>
    <link rel="stylesheet" href="css/list_items.css">
</head>
<body style="background:#383A3F">
    <form  method="POST">    
        <?php include 'menu.php';?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="row justify-content-center">
                        <div class="col-lg-2 text-center">
                            <div class="btnn csm"><a href="list_items.php?search=ALL">All</a></div>
                        </div>
                        <div class="col-lg-2 text-center">
                            <div class="btnn csm"><a href="list_items.php?search=Offers">Offers</a></div>
                        </div>
                        <div class="col-lg-2 text-center">
                            <div class="btnn csm"> <a href="list_items.php?search=Chinese">Chinese</a></div>
                        </div>
                        <div class="col-lg-2 text-center">
                            <div class="btnn csm"><a href="list_items.php?search=South Indian">South Indian</a></div>
                        </div>
                        <div class="col-lg-2 text-center">
                            <div class="btnn csm"><a href="list_items.php?search=North Indian">North Indian</a></div>
                        </div>
                        <div class="col-lg-2 text-center">
                            <div class="btnn csm"><a href="list_items.php?search=Fast Food">Fast Food</a></div>
                        </div>
                        <div class="col-lg-2 text-center">
                            <div class="btnn csm"><a href="list_items.php?search=Pizza">Pizza</a></div>
                        </div>
                        <div class="col-lg-2 text-center">
                            <div class="btnn csm"><a href="list_items.php?search=Sweets">Sweets</a></div>
                        </div>

                    </div>
                    
                    <?php
                        $search_value = $_GET['search'];
                        if($search_value == 'ALL')
                        {
                            $select_items_query = mysqli_query($con,"SELECT * FROM `items_master` ");
                        }
                        else {
                            $select_items_query = mysqli_query($con,"SELECT * FROM `items_master` WHERE `category`='$search_value'");
                        }
                                      
                        while($res = mysqli_fetch_array($select_items_query))
                        {
                        ?>
                                <div class="cardd-cont">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-2 text-center">
                                            <img src="<?php echo $res['item_photo'];?>"height="100px" width="154px">
                                        </div>
                                        <div class="col-lg-2 text-center">
                                            <p class="title">Item Name</p><br>
                                            <P><?php echo $res['item_name'];?></P>
                                        </div>
                                        <div class="col-lg-2 text-center">
                                            <p class="title">Category</p><br>
                                            <p><?php echo $res['category'];?></p>
                                        </div>
                                        <div class="col-lg-2 text-center">
                                            <p class="title">Rating</p><br>
                                            <p><?php if($res['rating']==0){echo "-";}else{echo $res['rating'];}?></p>
                                        </div>
                                        <!-- <div class="col-lg-2 text-center">
                                            <p class="title">Total Price</p><br>
                                            <p><?php echo  $res['miniutes'];?></p>
                                        </div> -->
                                        <div class="col-lg-2 text-center">
                                            <p class="title">Price</p><br>
                                            <p><?php if($res['price']==0){echo "-";}else{echo $res['price'];}?></p>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-lg-3">
                                            <div class="btnn">
                                                <a href="edit_items.php?id=<?php echo $res['id'];?>">Edit</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                        <div class="btnn">
                                                <a href="delete_items.php?id=<?php echo $res['id'];?>">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </form>    
</body>
</html>