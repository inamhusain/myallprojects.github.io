<!-- uesr menu -->
<?php

    // session_start();
    error_reporting(0);
    $user = $_SESSION['user_email'];
    include 'conn.php';
    $select_cart = "SELECT * FROM `cart` WHERE `user_email`='$user'";
    $select_cart_query = mysqli_query($con,$select_cart);
    $count_items_cart = mysqli_num_rows($select_cart_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <?php include '../Admin/links.php' ?>
    <link rel="stylesheet" href="css/menu.css">

</head>
<body>
    <div class="container-fluid" id="menu-1">
        <div class="row" id="logo">
            <div class="col-md-12">
                <h1 class="text-center">- F O O D &nbsp; P A R A D I S E -</h1>
            </div>
        </div>
    </div>    
    <div class="media_menu_icon row m-0 p-0 sticky-top" id="menu_icon" onclick="menuopen()">
        <div class="col-lg-12 text-center">
            <i class="fa fa-list"></i>
        </div>
    </div>
    <div class="media_menu sticky-top" id="menu">
        <div class="row justify-content-center m-0">
            <div class="col-md-2 text-center" id="dis-none-css-in-home">
                <p>
                    <a href="home.php"><i class="fa fa-home"></i> Home</a>
                </p>
            </div>
            <div class="col-md-2 text-center" id="dis-none-css">
                <p id="category" onclick="OpenNav()">
                <i class="fa fa-list"></i> Category
                </p>
            </div>
            <div class="col-md-2 text-center" id="dis-none-css">
                <p>
                    <a href="#offers"><i class="fa fa-percent"></i> Offers </a>
                </p>
            </div>
            <!-- <div class="col-md-2 text-center">
                <p>
                    <a href="contactUs.php">Contact Us</a> 
                </p>
            </div> -->
            <div class="col-md-2 text-center">
                <p>
                    <a href="order.php"><i class="fa fa-truck"></i> Orders</a> 
                </p>
            </div>
            <div class="col-md-2 text-center">
                <p>
                    <a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart <span class="span text-center">(<?php echo $count_items_cart;?>)</span> </a> 
                </p>
            </div>
            <div class="col-md-2 text-center">
                <p>
                    <a href="user.php"><i class="fa fa-user"></i> User</a> 
                </p>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center close-icon" onclick="closemenu()" id="close_btn">
                    <span>
                        <i class="fa fa-window-close"></i> close 
                    </span>
                </div>
            </div>
            
        </div>
        <div class="innermenu " id="inner-menu">
            <div class="row justify-content-center" >
                <div class="col-md-2 text-center">
                    <p onclick="closenav()">
                        <a href="#chinese">Chinese</a>
                    </p>
                </div>
                <div class="col-md-2 text-center">
                    <p onclick="closenav()">
                        <a href="#south-indian">South Indian</a>
                    </p>
                </div>
                <div class="col-md-2 text-center" >
                    <p onclick="closenav()">
                        <a href="#north-indian">North Indian</a>
                    </p>
                </div>
                <div class="col-md-2 text-center" >
                    <p onclick="closenav()">
                        <a href="#fast-food">Fast Food</a>
                    </p>
                </div>
                <div class="col-md-2 text-center" >
                    <p onclick="closenav()">
                        <a href="#pizza">Pizza</a>
                    </p>
                </div>
                <div class="col-md-2 text-center" >
                    <p onclick="closenav()">
                        <a href="#sweets">Sweets</a>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center" onclick="closenav()">
                    <div class="col-md-12 text-center ">
                        <p><i id="CloseNav-Btn" class="fa fa-angle-double-up" aria-hidden="true"></i></p>
                    </div>
            </div>
        </div>
    </div>
</body>

<script>
    var count = 0;
    function OpenNav() 
    {
            if(count==0)
            {
                document.getElementById("inner-menu").style.display = 'revert';
                count++;
            }
            else
            {
                document.getElementById("inner-menu").style.display = 'none';
                count--;
            }
    }
    
        function closenav() 
        {
            document.getElementById("inner-menu").style.display = 'none';
            count--;
        }
        

        // for menu open in mobile view

        function menuopen()
        {
            document.getElementById('menu_icon').style.display="none";
            document.getElementById('menu').style.display="revert";
        }
        function closemenu()
        {
            document.getElementById('menu_icon').style.display="revert";
            document.getElementById('menu').style.display="none";
        }
        
</script>
</html>