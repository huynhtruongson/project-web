<?php
// Start the session
session_start();

    if (isset($_SESSION["username"]) && !isset($_GET["id"])) {
	    header("Location: index.php");
    }
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" type="text/css" href="css/sign-up.css"/>
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>SIGN UP/PROFILE</title>
    <link rel="shortcut icon" type="image/ico" href="imgs/5_STARS_HOTEL-512.ico"/>
</head>
<body>
    <div class="bodyContainer">
        <div class="header">
            <ul>
                <li class="fa fa-map-marker"> 19 Nguyễn Hữu Thọ,Phường Tân Phong,Q.7,TP.HCM </li>
                <li class="	fa fa-phone">+841234567</li>
                <?php
                    if(!isset($_SESSION["username"]) && !isset($_GET["id"])) {
                        echo "<li class='	fa fa-lock'><a href='sign-in.php' style='margin-left: 12px;color:white;'>Loggin</a></li>";
                    }
                    else {
                        echo "<li class=' fa fa-sign-out'><a href='sign-out.php' style='margin-left: 12px;color:white;'>Logout</a></li>";
                    }
                ?>
            </ul>
        </diV>
        <div class="menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                    <span><h1><a href="#"><span>S</span>HOTEL</a></h1></span>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse"  id="navbarSupportedContent">
                        <ul class="nav navbar-nav">
                            <li><a  href="index.php">HOME</a></li>
                            <li><a  href="about.php">ABOUT</a></li>
                            <li><a  href="room.php">ROOM</a></li>
                            <li><a  href="contact.php">CONTACT</a></li>
                        </ul>
                    </div>
            </nav>
        </div>
        <div class="banner">
            <p>
                <?php
                    if(isset($_SESSION["username"]) && isset($_GET["id"])) {
                        echo "PROFILE";
                    }
                    else {
                        echo "SIGN UP";
                    }
                ?>
            </p>
        </div>
        <div class="main-content">
            <form action="create-account.php" method="POST">
                <h3>Please fill in this form to create an account</h3>
                <?php
                    $id = $firstname = $lastname = $email = $phone = $username = $password = "";			
                    if (isset($_GET["id"])) {
                        $id = $_GET["id"];
                        require_once("conn.php");
                        $sql = "SELECT * FROM user WHERE id = '$id'";
                        $result = $conn->query($sql);
                        if ($result->num_rows == 1) {
                            $row = $result->fetch_assoc();
                            $firstname = $row["firstname"];
                            $lastname = $row["lastname"];
                            $email = $row["email"];
                            $phone = $row["phone"];
                            $username = $row["username"];
                            $password = $row["password"];
                        }
                    }
                ?>
                <div class="form-group">
                    <input type="text" class="form-control" name="firstname" placeholder="Enter First Name" required autofocus value="<?php echo $firstname ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="lastname" placeholder="Enter Last Name" required value="<?php echo $lastname ?>">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Enter Email" required value="<?php echo $email ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="phone" placeholder="Enter Phone Number" required value="<?php echo $phone ?>">
                </div>
                <div class="form-group">
                    
                    <input type="text" class="form-control" name="username" placeholder="Enter Username" required value="<?php echo $username ?>"
                    <?php
                        if(isset($_SESSION["username"]) && isset($_GET["id"])) {
                            echo "readonly";
                        }
                    ?>>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="mPassword" name="password" placeholder="Enter Passwords" required value="<?php echo $password ?>">
                    <input type="checkbox" onclick="showPassword()">Show Password
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $id ?>">
                </div>
                <?php
                    if(isset($_SESSION["username"]) && isset($_GET["id"])) {
                        echo "<button class='btn btn-lg btn-primary btn-block' type='submit'>Update</button>";
                    }
                    else {
                        echo "<button class='btn btn-lg btn-primary btn-block' type='submit'>Register</button>";
                    }
                ?>
            </form>
        </div>
        <div class="footer">
            <p>&copy 2019 S-hotel.All rights reserved | Design by Sơn</p>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/show-password.js"></script>
</body>
</html>