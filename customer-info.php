<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" type="text/css" href="css/customer-info.css"/>
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>CUSTOMER-INFO</title>
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
            <p>CUSTOMER-INFORMATION</p>
        </div>
        <div class="main-content">
            <?php
                if (isset($_POST["userphone"])) {
                    $userphone = $_POST["userphone"];
                    require_once("conn.php");
                    $sql = "SELECT userdate FROM customer WHERE userphone = '$userphone'";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    $userdate = $row["userdate"];
                }
                else if (isset($_GET["userphone"])) {
                    $userphone = $_GET["userphone"];
                    require_once("conn.php");
                    $sql = "SELECT userdate FROM customer WHERE userphone = '$userphone'";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    $userdate = $row["userdate"];
                }
            ?>
            <h3>Booking Date : <?php echo $userdate ?></h3>
            <form>
                <div class="form-row">
                    <?php
                        $userid = $userroomid = $roomname = $userfirstname = $userlastname = $useremail = $userphone = $userarrivaldate  = $userdeparturedate = $useramount = $userservice =  "" ;			
                        if (isset($_POST["userphone"])) {
                            $userphone = $_POST["userphone"];
                            require_once("conn.php");
                            $sql = "SELECT * FROM customer WHERE userphone = '$userphone'";
                            $result = $conn->query($sql);
                            if ($result->num_rows == 1) {
                                $row = $result->fetch_assoc();
                                $userid = $row["userid"];
                                $userroomid = $row["userroomid"];
                                $userfirstname = $row["userfirstname"];
                                $userlastname = $row["userlastname"];
                                $useremail = $row["useremail"];
                                $userarrivaldate = $row["userarrivaldate"];
                                $userdeparturedate = $row["userdeparturedate"];
                                $useramount = $row["useramount"];
                                $userservice = $row["userservice"];
                                $userdate = $row["userdate"];
                            }
                            else {
                                header("Location: index.php");
                            }
                        }
                        else if (isset($_GET["userphone"])) {
                            $userphone = $_GET["userphone"];
                            require_once("conn.php");
                            $sql = "SELECT * FROM customer WHERE userphone = '$userphone'";
                            $result = $conn->query($sql);
                            if ($result->num_rows == 1) {
                                $row = $result->fetch_assoc();
                                $userid = $row["userid"];
                                $userroomid = $row["userroomid"];
                                $userfirstname = $row["userfirstname"];
                                $userlastname = $row["userlastname"];
                                $useremail = $row["useremail"];
                                $userarrivaldate = $row["userarrivaldate"];
                                $userdeparturedate = $row["userdeparturedate"];
                                $useramount = $row["useramount"];
                                $userservice = $row["userservice"];
                                $userdate = $row["userdate"];
                            }
                            else {
                                header("Location: index.php");
                            }
                        }
                        
                        $sql1 = "SELECT * FROM room WHERE id = '$userroomid'";
                        $result1 = $conn->query($sql1);
                        if ($result1->num_rows == 1) {
                            $row = $result1->fetch_assoc();
                            $roomname=$row["name"];
                            $roombed = $row["bed"];
                        }
                    ?>
                    
                        <input type="hidden" class="form-control"  value="<?php echo $userid ?>" readonly>
                    <div class="form-group col-md-6">
                        <label >Room ID</label>
                        <input type="text" class="form-control"  value="<?php echo $userroomid ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label >Room Name</label>
                        <input type="text" class="form-control"  value="<?php echo $roomname ." ($roombed)"?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label >First Name</label>
                        <input type="text" class="form-control"  value="<?php echo $userfirstname ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label >Last Name</label>
                        <input type="text" class="form-control"  value="<?php echo $userlastname ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label >Email</label>
                        <input type="text" class="form-control"  value="<?php echo $useremail ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label >Phone</label>
                        <input type="text" class="form-control"  value="<?php echo $userphone ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label >Arrival Date</label>
                        <input type="text" class="form-control"  value="<?php echo $userarrivaldate ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label >Departure Date</label>
                        <input type="text" class="form-control"  value="<?php echo $userdeparturedate ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label >Room Amount Booked</label>
                        <input type="text" class="form-control"  value="<?php echo $useramount ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label >Service</label>
                        <input type="text" class="form-control"  value="<?php echo $userservice ?>" readonly>
                    </div>
                </div>
                <button type="submit" class="btn "><a href="room_detail.php?userid=<?php echo $userid ?>&id=<?php echo $userroomid ?>">Edit</a></button>
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
</body>
</html>