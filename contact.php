<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" type="text/css" href="css/contact.css"/>
    <link rel="stylesheet" type="text/css" type="text/css" href="css/contact-responsive.css"/>
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>CONTACT</title>
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
            <p>CONTACT TO US</p>
        </div>
        <div class="row-content">
            <div class="left-sidebar" >
                <div class="contact-info">
                    <h2>Contact Information</h2>
                    <ul>
                        <li><i class="fa fa-map-marker"></i><span>19 Nguyễn Hữu Thọ,Phường Tân Phong,Q.7,TP.HCM</span></li>
                        <li><i class="fa fa-phone"></i><span>+84 123 4567</span></li>
                        <li><i class="fa fa-envelope"></i><span>51702168@tdtu.student.edu.vn</span></li>
                        <li><i class="fa fa-clock-o"></i><span>Everyday: 06:00 -22:00</span></li>
                    </ul>
                </div>
                <div class="contact-media">
                    <h2>Follow us on :</h2>
                    <ul>
                        <li><a href="#"><span><i class="fa fa-facebook"></i></span></a></li>
                        <li><a href="#"><span><i class="fa fa-twitter"></i></span></a></li>
                        <li><a href="#"><span><i class="fa fa-google-plus"></i></span></a></li>
                        <li><a href="#"><span><i class="fa fa-instagram"></i></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="right-sidebar">
                <div class="write-info">
                    <h2>Write to us...</h2>
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Your name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Your phone">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control"  placeholder="Your email">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control"  rows="3" placeholder="Your message. . . ."></textarea>
                        </div>
                    </form>
                    <div class="send-btn">
                        <a href="#" >SEND<i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div id="ggmap"></div>
        <script>
            var map;
            function initMap() {
                var pst = {lat: 10.732829, lng: 106.699202};
                map = new google.maps.Map(document.getElementById('ggmap'), {
                    center: pst,
                    zoom: 17
                });
                var marker = new google.maps.Marker({position: pst, map: map});
            }        
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFwP6Xby0Q0IrjqXDVOiw9dpLo4OrqR84&callback=initMap"async defer>
        </script>
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