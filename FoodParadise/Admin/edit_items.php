<!-- font-family: ProximaNova,Arial,Helvetica Neue,sans-serif; -->
<?php 
// error_reporting(0);
include 'conn.php';
$id = $_GET['id'];
// echo $id;

$select_item_query = mysqli_query($con,"SELECT * FROM `items_master` WHERE `id`='$id'");
$res = mysqli_fetch_array($select_item_query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Edit items</title>
    <?php 
    include 'links.php';
    ?>
    <link rel="stylesheet" href="css/additems.css">
</head>
<body style="background: #383A3F;">
    <?php include 'menu.php'; ?>
    <form  method="post"  enctype="multipart/form-data">
    <div class="container" id="add">
        <div class="row justify-content-center" id="inn-form">
            <div class="col-md-6 blue text-center">
               <div class="cardd">
                        <label>image</label>
                        <img src="<?php echo $res['item_photo'];?>" height="100px" width="154px">
                           
                        <label>Product name</label>
                        <input class="input" type="text" name="productname" placeholder="Product Name" value="<?php echo $res['item_name'];?>" required>
                
                        <label>select category</label>
                            <select  class="input" name="category" selected="<?php echo $res['category'];?>" required>
                                <option disabled selected>--CATEGORY--</option>
                                <option <?php if($res['category'] == "Offers"){echo 'selected="selected"';}?> value="Offers">| OFFERS |</option>
                                <option <?php if($res['category'] == "Chinese"){echo 'selected="selected"';}?> value="Chinese">Chinese</option>
                                <option <?php if($res['category'] == "South Indian"){echo 'selected="selected"';}?> value="South Indian">South Indian</option>
                                <option <?php if($res['category'] == "North Indian"){echo 'selected="selected"';}?> value="North Indian">North Indian</option>
                                <option <?php if($res['category'] == "Fast Food"){echo 'selected="selected"';}?> value="Fast Food">Fast Food</option>
                                <option <?php if($res['category'] == "Pizza"){echo 'selected="selected"';}?> value="Pizza">Pizza</option>
                                <option <?php if($res['category'] == "Sweets"){echo 'selected="selected"';}?> value="Sweets">Sweets</option>
                            </select>

                        <label>Address of shop</label>
                        <input class="input" type="text" name="address" placeholder="address of shop" value="<?php echo $res['address']?>" required>

                        <label>Rating</label>
                        <input class="input" type="text" name="rating" placeholder="Rating" value="<?php echo $res['rating']?>" required>

                        <label>Delevery Time</label>
                        <input class="input" type="text" name="deleverytime" placeholder="Delevery Time" value="<?php echo $res['miniutes']?>" required>

                        <label>Price</label>
                        <input class="input" type="text" name="price" placeholder="Price" value="<?php echo $res['price']?>" required>

                        
                        <label>Food Type</label>
                        <select  class="input" name="type" required>
                                <option disabled selected >--TYPE--</option>
                                <option <?php if($res['type'] == "Veg"){echo 'selected="selected"';}?> value="Veg">Veg</option>
                                <option <?php if($res['type'] == "Non-Veg"){echo 'selected="selected"';}?> value="Non-Veg">Non-Veg</option>
                            </select>

                            <input class="btnn" type="submit" value="Edit Items" name="submit">
               </div>
            </div>
        </div>
    </div>
    </form>
    <?php 
    include 'conn.php';
    if(isset($_POST['submit']))
    {
        $product_name=$_POST['productname'];
        $category = $_POST['category'];
        $address=$_POST['address'];
        $rating=$_POST['rating'];
        $deleverytime=$_POST['deleverytime'];
        $price=$_POST['price'];
        $type=$_POST['type'];
        $update = "UPDATE `items_master` SET `item_name`='$product_name',`category`='$category',`address`='$address',`rating`=$rating,`miniutes`=$deleverytime,`price`=$price,`type`='$type' WHERE `id`=$id";
        $update_query = mysqli_query($con,$update);
        if($update_query)
        {
           ?>
           <script>
               swal("", "Your Item has been updated!", "success");
               var timer = setTimeout(function()
                {
                    window.location.href="list_items.php"
                }, 2000);
           </script>
           <?php
        }
    }


    ?>
</body>
</html>