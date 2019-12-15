<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" type="text/css" href="css/about.css"/>
    <link rel="stylesheet" type="text/css" type="text/css" href="css/room_responsive.css"/>
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>ABOUT</title>
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
            <p>ABOUT US</p>
        </div>
        <div class="content">
           <div class="introduce">
                <h2>“You may forget what we said but you will never forget how we made you
                    feel”
                </h2>
                <div class="row">
                    <div class="col-md-6">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus libero mauris,
                                bibendum eget sapien ac, ultrices rhoncus ipsum. Donec nec sapien in urna fermentum
                                ornare. Morbi vel ultrices leo. Sed eu turpis eu arcu vehicula fringilla ut vitae
                                orci. Suspendisse maximus malesuada
                        </p>
                    </div>
                    <div class="col-md-6">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus libero mauris,
                                    bibendum eget sapien ac, ultrices rhoncus ipsum. Donec nec sapien in urna fermentum
                                    ornare. Morbi vel ultrices leo. Sed eu turpis eu arcu vehicula fringilla ut vitae
                                    orci. Suspendisse maximus malesuada
                            </p>
                    </div>
                </div>
           </div>
           <div id="carouselExampleControls" class="carousel slide carousel-fade" data-ride="carousel" >
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="imgs/carousel1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="imgs/carousel2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="imgs/carousel3.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="imgs/carousel4.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
           <div class="gallery">
                <div class="gallery-text">
                    <h2>Hotel Gallery</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus libero mauris, bibendum eget
                        sapien ac, ultrices rhoncus ipsum. Donec nec sapien in urna fermentum ornare. Morbi vel
                        ultrices leo. Sed eu turpis eu arcu vehicula fringilla ut vitae orci.
                    </p>
                </div>
                <div class="row">
                    <div class="card" style="width: 18rem;">
                        <img src="imgs/5.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Deluxe Room</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                    <div class="card" style="width: 18rem;">
                        <img src="imgs/9.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Restaurant Service</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                    <div class="card" style="width: 18rem;">
                        <img src="imgs/7.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Swimming Pool</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                    <div class="card" style="width: 18rem;">
                        <img src="imgs/8.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Spa care</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="view-more">
                    <a href="#" >View More<i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
            <div class="staff-tittle">
                <h2>OUR STAFF</h2>
            </div>
            <div class="staff">
                <div class="row">
                    <div class="card" style="width: 23rem;">
                        <img src="imgs/staff-1.jpg" class="card-img-top" alt="...">
                        <h5 class="card-title">SARAH DOE</h5>
                        <p>HOTEL MANAGER</p>
                    </div>
                    <div class="card" style="width: 23rem;">
                        <img src="imgs/staff-2.jpg" class="card-img-top" alt="...">
                        <h5 class="card-title">JESSICA DOE</h5>
                        <p>RECEPTION MANAGER</p>
                    </div>
                    <div class="card" style="width: 23rem;">
                        <img src="imgs/staff-3.jpg" class="card-img-top" alt="...">
                        <h5 class="card-title">JEREMY ZUCKER</h5>
                        <P>IT</P>
                    </div>
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