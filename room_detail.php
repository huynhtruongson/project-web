<?php
    $price = $amount = $image = $description = $bed = $convenient ="";
    if (isset($_GET["id"])) {
        $_id = $_GET["id"];
        require_once("conn.php");
        $sql = "SELECT * FROM room WHERE id = '$_id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $price=$row["price"];
        $amount=$row["amount"];
        $image=$row["image"];
        $description=$row["description"];
        $bed = $row["bed"];
        $convenient = $row["convenient"];
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
    <link rel="stylesheet" type="text/css" type="text/css" href="css/room_detail.css"/>
    <link rel="stylesheet" type="text/css" type="text/css" href="css/room_detail_responsive.css"/>
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>ROOM-DETAIL</title>
    <link rel="shortcut icon" type="image/ico" href="imgs/5_STARS_HOTEL-512.ico"/>
</head>
<body>
    <div class="bodyContainer">
        <div class="header">
            <ul>
                <li class="fa fa-map-marker"> 19 Nguyễn Hữu Thọ,Phường Tân Phong,Q.7,TP.HCM </li>
                <li class="	fa fa-phone">+841234567</li>
                <?php
                    require_once("check-account.php");
                ?>
            </ul>
        </diV>
        <div class="menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                    <span><h1><a href="index.php"><span>S</span>HOTEL</a></h1></span>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse"  id="navbarSupportedContent">
                        <ul class="nav navbar-nav">
                            <li><a  href="index.php">HOME</a></li>
                            <li><a  href="about.php">ABOUT</a></li>
                            <li><a  href="room.php">ROOM</a></li>
                            <li><a  href="contact.php">CONTACT</a></li>
                            <?php
                                if (isset($_SESSION["username"])) {
                                    if($_SESSION["username"]==="admin") {
                                        echo "<li><a href='admin/index.php'>ADMIN</a></li>" ;
                                    }
                                }
                            ?>
                        </ul>
                    </div>
            </nav>
        </div>
        <div class="banner">
            <p>Detail</p>
        </div>
        <?php
            $userid = $userfirstname = $userlastname = $useremail = $userphone = $userarrivaldate  = $userdeparturedate = $useramount = $userservice = "" ;
            if(isset($_SESSION["username"])) {
                $username = $_SESSION["username"];
                require_once("conn.php");
                $sql = "SELECT * FROM user WHERE username = '$username'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $userfirstname = $row["firstname"];
                $userlastname = $row["lastname"];
                $useremail = $row["email"];
                $userphone = $row["phone"];
            }
            if (isset($_GET["userid"])) {
                $userid = $_GET["userid"];
                require_once("conn.php");
                $sql = "SELECT * FROM customer WHERE userid = '$userid'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $userfirstname=$row["userfirstname"];
                $userlastname=$row["userlastname"];
                $useremail=$row["useremail"];
                $userphone=$row["userphone"];
                $userarrivaldate=$row["userarrivaldate"];
                $userdeparturedate=$row["userdeparturedate"];
                $useramount=$row["useramount"];
                $userservice=$row["userservice"];
            }
        ?>
        <div class="row-content">
            <div class="left-sidebar">
                <div class="booking-form">
                    <h2>$<?php echo $price ?></h2>
                    <h3>Book Hotel</h3>
                    <form action="addcustomer.php" method="POST">
                        <div class="form-group">
                            <input type="hidden" name="userroomid" value="<?php echo $_id ?>" >
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="First Name" name="userfirstname" value="<?php echo $userfirstname ?>" required/>                                       
                        </div>
                        
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Last Name" name="userlastname" value="<?php echo $userlastname ?>" required/>                                       
                        </div>
                        
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email" name="useremail" value="<?php echo $useremail ?>" required/>                                       
                        </div>
                        
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Phone" name="userphone" value="<?php echo $userphone ?>" required/>                                       
                        </div>                        
                        <div class="form-group">
                            <label>Arrival Date</label>
                            <input type="date" class="form-control"  name="userarrivaldate" value="<?php echo $userarrivaldate ?>" required/>                                       		
                        </div>
                        <div class="form-group">
                                <label>Departure Date</label>
                            <input type="date" class="form-control"  name="userdeparturedate" value="<?php echo $userdeparturedate ?>" required/>                                       		
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="useramount" placeholder="Enter amount" min="1" max="<?php echo $amount ?>" value="<?php echo $useramount ?>">
                        </div>
                        <div class="form-group">
                            <label id="services">Services</label>
                            <select class="form-control" name="userservice" required>
                                <option selected>None</option>
                                <option value="car" <?php if ($userservice == "car") echo "selected" ?>>Car</option>
                                <option value="restaurant" <?php if ($userservice == "restaurant") echo "selected" ?>>Restaurant</option>
                                <option value="car & restaurant" <?php if ($userservice == "car & restaurant") echo "selected" ?>>Car & Restautant</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="userid" value="<?php echo $userid ?>" >
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="userprice" value="<?php echo $price ?>" >
                        </div>
                        <button type="submit" class="btn btn-block">CONFIRM BOOKING</button>
                    </form>
                </div>
                <div class="help-box">
                    <h3>Need Help</h3>
                    <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis. Est atqui timeam mnesarchum.</p>
                    <i class="fa fa-phone"></i>
                    <span>+84 12345678</span>
                </div>
            </div>
            <div class="right-sidebar">
                <div class="photo">
                    <img class="responsive" src="uploads/<?php echo $image ?>" alt="hotel-img"/>
                </div>
                <div class="description">
                    <h3>Description</h3>
                    <p><?php echo $description ?></p>
                    <h3>Bed</h3>
                    <p><?php echo $bed ?></p>
                    <h3>Convenient</h3>
                    <p><?php echo $convenient ?></p>
                </div>
            </div>
        </div>
        <div class="row row-footer">
                <div class="col-sm-6 col-md-3">
                    <h3>CONTACT US</h3>
                    <ul>
                        <li><i class="fa fa-map-marker"></i>19 Nguyễn Hữu Thọ Tân Phong,Q.7,TP.HCM </li>
                         <li><i class="fa fa-phone"></i>+84 123 4567</li>
                        <li><i class="fa fa-envelope"></i>51702168@tdtu.student.edu.vn</li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-3">
                    <h3>QUICK LINK</h3>
                    <ul>
                        <li><a href="#">HOME</a></li>
                         <li><a href="#">ABOUT</a></li>
                        <li><a href="#">ROOM</a></li>
                        <li><a href="#">CONTACT</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-3">
                    <h3>CONECT WITH US</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit.</p>
                    <ul class="social-media">
                        <li><a href="#"><span><i class="fa fa-facebook"></i></span></a></li>
                        <li><a href="#"><span><i class="fa fa-twitter"></i></span></a></li>
                        <li><a href="#"><span><i class="fa fa-google-plus"></i></span></a></li>
                        <li><a href="#"><span><i class="fa fa-instagram"></i></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="footer">
                <p>&copy 2019 S-hotel.All rights reserved | Design by Sơn</p>
            </div>
    </div>
    <button id="btnTop"><i class="fa fa-arrow-up"></i></button>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="js/btnTop.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>