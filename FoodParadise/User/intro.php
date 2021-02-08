<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/intro.css">
    <?php include '../Admin/links.php'?>
</head>
<body>
<div id="loading">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
            <video autoplay muted loop id="myVideo">
                <source src="video/1594647 beefSteak HD Footage.mp4" type="video/mp4">
            </video>
            <div class="layer"></div>
                <div class="con">
                    <p class="c3">Welcome to</p>
                    <h1 class="c1">F <span>o-o</span> D</h1>
                    <p class="c2">P A R A D I S E</p>
                </div>
            </div>
        </div>
    </div>
 </div>
 <script>
     var timer = setTimeout(function()
    {
        window.location.href="home.php"
    }, 10100);
 </script>
</body>
</html>