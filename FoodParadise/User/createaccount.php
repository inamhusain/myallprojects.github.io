<?php error_reporting(0);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include '../Admin/links.php' ?>
    <link rel="stylesheet" href="css/login.css">
    <style>
        h1
        {	
            font-size: 20px;
	        FONT-WEIGHT: 600;
	        LETTER-SPACING: 6PX;
        }
        .inner{margin-top: 3%;}
    </style>
</head>
<body>
        <form method="POST">
                <div class="container" in="main">
                    <div class="row justify-content-center inner">
                    
                        <div class="col-md-5 inner2">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h1>CREATE ACCOUNT</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <p>Username</p>
                                    <input class="input" type="text" name="username" required>
                                    <p>Email</p>
                                    <input class="input" type="text" name="email" required>
                                    <p>Password</p>
                                    <input class="input" type="password" name="password" required>
                                    <p>Address</p>
                                    <input class="input" type="text" name="address" required>
                                    <p>Mobile no</p>
                                    <input class="input" type="text" name="mobileno" required>
                                    <input class="btn" type="submit" name="submit" value="Create Account">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <a href="login.php">L O G I N</a>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <?php 
        include 'conn.php';
        if(isset($_POST['submit']))
        {
            // $email = mysqli_real_escape_string($con, $_POST['email']) ;
            $email = $_POST['email'];
            $email_ver_query = "SELECT * FROM `user` WHERE `email`='$email' ";
            $result = mysqli_query($con,$email_ver_query);
            $email_count = mysqli_num_rows($result);
            if($email_count > 0)
            {
                ?>
                <script>
                swal("Oppps!", "Email already exist", "error");
                </script>
                <?php
            }
            else
            {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $address = $_POST['address'];
                $mobileno = $_POST['mobileno'];

                $insert = "INSERT INTO `user`(`user_name`, `email`, `password`, `address`, `mobile`) VALUES ('$username','$email','$password','$address','$mobileno')";
                $insert_query = mysqli_query($con,$insert);
                if($insert_query)
                {
                    ?>
                    <script>
                         swal("Good job!", "Account create successful", "success");
                    </script>
                    <?php
                }
            }
        }
        ?>
        </form>

        
</body>
</html>