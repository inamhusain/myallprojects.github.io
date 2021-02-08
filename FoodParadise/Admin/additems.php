<!-- font-family: ProximaNova,Arial,Helvetica Neue,sans-serif; -->
<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Add items</title>
    <?php 
    include 'links.php';
    ?>
    <link rel="stylesheet" href="css/additems.css">
</head>
<body style="background: #383A3F;">
    <?php include 'menu.php'; ?>
    <form  method="post"  enctype="multipart/form-data">
    <div class="container" id="add">
        <div class="row justify-content-center">
            <div class="col-md-6 blue">
                <!-- <h1 class="text-center">ADD ITEMS | OFFERS</h1> -->
            </div>
        </div>
        <div class="row justify-content-center" id="inn-form">
            <div class="col-md-6 blue text-center">
               <div class="cardd">
                        <label>select image</label>
                        <input class="input-file" type="file" name="images" requiredd><br>
                        
                        <label>Product name</label>
                        <input class="input" type="text" name="productname" placeholder="Product Name" required>
                
                        <label>select category</label>
                            <select  class="input" name="category" required>
                                <option disabled selected>--CATEGORY--</option>
                                <option value="Offers">| OFFERS |</option>
                                <option value="Chinese">Chinese</option>
                                <option value="South Indian">South Indian</option>
                                <option value="North Indian">North Indian</option>
                                <option value="Fast Food">Fast Food</option>
                                <option value="Pizza">Pizza</option>
                                <option value="Sweets">Sweets</option>
                            </select>

                            <label>Address of shop</label>
                        <input class="input" type="text" name="address" placeholder="address of shop" required>

                        <label>Rating</label>
                        <input class="input" type="text" name="rating" placeholder="Rating" required>

                        <label>Delevery Time</label>
                        <input class="input" type="text" name="deleverytime" placeholder="Delevery Time" required>

                        <label>Price</label>
                        <input class="input" type="text" name="price" placeholder="Price" required>

                        
                        <label>Food Type</label>
                        <select  class="input" name="type" required>
                                <option disabled selected >--TYPE--</option>
                                <option value="Veg">Veg</option>
                                <option value="Non-Veg">Non-Veg</option>
                            </select>

                            <input class="btnn" type="submit" value="Add Items" name="submit">
               </div>
            </div>
        </div>
    </div>
    </form>
    <?php 
    include 'conn.php';
    if(isset($_POST['submit']))
    {
        $files = $_FILES['images'];
        $filename = $files['name'];
        $filetemp = $files['tmp_name'];
        // echo $filename." ".$filetemp;
        $destinationfile = 'uploded/'.$filename;
        move_uploaded_file($filetemp,$destinationfile);

        $productname = $_POST['productname'];
        $category = $_POST['category'];
        $address = $_POST['address'];
        $rating = $_POST['rating'];
        $deleverytime = $_POST['deleverytime'];
        $price = $_POST['price'];
        $type = $_POST['type'];

        $q = "INSERT INTO `items_master`(`item_photo`,`item_name`,`category`,`address`,`rating`,`miniutes`,`price`,`type`) VALUES ('$destinationfile','$productname','$category','$address','$rating','$deleverytime','$price','$type')";
        $query = mysqli_query($con,$q);

        if(isset($query))
        {
            ?>
            <script>
            swal("Good job!", "Item Added", "success");
            </script>
            <?php
        }
    }


    ?>
</body>
</html>