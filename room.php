<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" type="text/css" href="css/room.css"/>
    <link rel="stylesheet" type="text/css" type="text/css" href="css/room_responsive.css"/>
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>ROOM</title>
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
            <p>Choose Your Room</p>
        </div>
        <div class="row-content">
            <div class="left-sidebar">
                <div class="sort-box">
                    <h3>Sort By Filter</h3>
                    <p><a href="room.php?name=Standard Room">Standard Room</a></p>
                    <p><a href="room.php?name=Superior Room">Superior Room</a></p>
                    <p><a href="room.php?name=Deluxe Room">Deluxe Room</a></p>
                    <p><a href="room.php?name=Suit Room">Suit Room</a></p>
                    <p><a href="room.php?bed=Single Bed">Single Bed</a></p>
                    <p><a href="room.php?bed=Double Bed">Double Bed</a></p>
                    <p><a href="room.php?bed=Queen Size Bed">Queen Size Bed</a></p>
                    <p><a href="room.php?bed=King Size Bed">King Size Bed</a></p>
                </div>
                <div class="help-box">
                    <h3>Need Help</h3>
                    <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis. Est atqui timeam mnesarchum.</p>
                    <i class="fa fa-phone"></i>
                    <span>+84 12345678</span>
                </div>
            </div>
            <div class="right-sidebar">
                <?php
                /*    require_once("conn.php");
                    $sql = "SELECT * FROM room WHERE amount>0";
                    if (isset($_GET["name"])) {
                        $name = $_GET["name"];
                        $sql = $sql . " AND name ='$name'";
                    }
                    else if(isset($_GET["bed"])) {
                        $bed = $_GET["bed"];
                        $sql = $sql . " AND bed ='$bed'";
                    }  
                    $result = $conn->query($sql);   */
                    require_once("conn.php");
                    $sql = "SELECT count(id) as total FROM room WHERE amount>0";
                    $name = $bed ="";
                    if (isset($_GET["name"])) {
                        $name = $_GET["name"];
                        $sql = $sql . " AND name ='$name'";
                    }
                    else if(isset($_GET["bed"])) {
                        $bed = $_GET["bed"];
                        $sql = $sql . " AND bed ='$bed'";
                    } 
                    $result = $conn->query($sql);
                    $row=$result->fetch_assoc();
                    $total_records = $row['total'];
                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $limit = 3;
                    $total_page = ceil($total_records / $limit);
                    if ($current_page > $total_page){
                        $current_page = $total_page;
                    }
                    else if ($current_page < 1){
                        $current_page = 1;
                    }
                    $start = ($current_page - 1) * $limit;
                    $sql = "SELECT * FROM room WHERE amount>0";
                    if (isset($_GET["name"])) {
                        $name = $_GET["name"];
                        $sql = $sql ." AND name = '$name' LIMIT $start, $limit";
                    }
                    else if(isset($_GET["bed"])) {
                        $bed = $_GET["bed"];
                        $sql = $sql ." AND bed = '$bed' LIMIT $start, $limit";
                    }
                    else {
                        $sql = $sql ." LIMIT $start, $limit";
                    }
                    $result=$conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) { 
                ?>
                    <div class="detail">
                        <div class="photo-left">
                            <a href="room_detail.php?id=<?php echo $row["id"] ?>"><img class="responsive" src="uploads/<?php echo $row["image"] ?>" alt="hotel-img"/></a>
                            <div class="price">
                                $<?php echo $row["price"] ?> |<span> AVG/NIGHT</span>
                                <i>Amount:<?php echo $row["amount"] ?></i>
                            </div>
                        </div>
                        <div class="info-right">
                            <h3><?php echo $row["name"] ?></h3>
                            <p><?php echo $row["description"] ?></p>
                            <a href="room_detail.php?id=<?php echo $row["id"] ?>">View More</a>
                        </div>
                    </div>
                <?php 
				        }
			        }
		        ?>
                <div class="table-footer">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                        <?php
                            if ($current_page > 1 && $total_page > 1){
                                if(isset($_GET["name"])) {
                                    echo '<li class="page-item"><a class="page-link" href="room.php?page='.($current_page-1).'&name='.$name.'">Prev</a></li> ';
                                }
                                elseif(isset($_GET["bed"])) {
                                    echo '<li class="page-item"><a class="page-link" href="room.php?page='.($current_page-1).'&bed='.$bed.'">Prev</a></li> ';
                                }
                                else {
                                    echo '<li class="page-item"><a class="page-link" href="room.php?page='.($current_page-1).'">Prev</a></li> ';
                                }
                            }
                            for ($i = 1; $i <= $total_page; $i++){
                                // Nếu là trang hiện tại thì hiển thị thẻ span
                                // ngược lại hiển thị thẻ a
                                if ($i == $current_page){
                                    echo '<li class="page-item active"><span class="page-link ">'.$i.'</span></li>  ';
                                }
                                else{
                                    if(isset($_GET["name"])) {
                                        echo '<li class="page-item"><a class="page-link" href="room.php?page='.$i.'&name='.$name.'">'.$i.'</a></li> ';
                                    }
                                    elseif(isset($_GET["bed"])) {
                                        echo '<li class="page-item"><a class="page-link" href="room.php?page='.$i.'&bed='.$bed.'">'.$i.'</a></li> ';
                                    }
                                    else {
                                        echo '<li class="page-item"><a class="page-link" href="room.php?page='.$i.'">'.$i.'</a></li>  ';
                                    }
                                }
                            }
                            if ($current_page < $total_page && $total_page > 1){
                                if(isset($_GET["name"])) {
                                    echo '<li class="page-item"><a class="page-link" href="room.php?page='.($current_page+1).'&name='.$name.'">Next</a></li> ';
                                }
                                elseif(isset($_GET["bed"])) {
                                    echo '<li class="page-item"><a class="page-link" href="room.php?page='.($current_page+1).'&bed='.$bed.'">Next</a></li> ';
                                }
                                else {
                                    echo '<li class="page-item"><a class="page-link" href="room.php?page='.($current_page+1).'">Next</a></li> ';
                                }
                            }
                        ?>
                        </ul>
                    </nav>
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