<?php 
    require_once("../conn.php");
    $sql = "SELECT count(userid) as total FROM customer";
    $result = $conn->query($sql);
    $row=$result->fetch_assoc();
    $total_records = $row['total'];
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 5;
    $total_page = ceil($total_records / $limit);
    if ($current_page > $total_page){
        $current_page = $total_page;
    }
    else if ($current_page < 1){
        $current_page = 1;
    }
    $start = ($current_page - 1) * $limit;
    $sql = "SELECT * FROM customer LIMIT $start, $limit";
    $result=$conn->query($sql);
?>
<?php
// Start the session
session_start();

if (!isset($_SESSION["username"])) {
	header("Location: ../sign-in.php");
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
    <link rel="stylesheet" type="text/css" type="text/css" href="css/customer.css"/>
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>CUSTOMER</title>
    <link rel="shortcut icon" type="image/ico" href="../imgs/5_STARS_HOTEL-512.ico"/>
</head>
<body>
    <div class="bodyContainer">
        <div class="header">
            <ul>
                <li class="fa fa-map-marker"> 19 Nguyễn Hữu Thọ,Phường Tân Phong,Q.7,TP.HCM </li>
                <li class="	fa fa-phone">+841234567</li>
                <li class=' fa fa-sign-out'><a href='../sign-out.php' style='margin-left: 12px;color:white;'>Logout</a></li>
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
                            <li><a  href="../index.php">HOME</a></li>
                            <li><a  href="../about.php">ABOUT</a></li>
                            <li><a  href="../room.php">ROOM</a></li>
                            <li><a  href="../contact.php">CONTACT</a></li>
                            <li><a  href="index.php">ADMIN</a></li>
                        </ul>
                    </div>
            </nav>
        </div>
        <div class="banner">
            <p>CUSTOMER</p>
        </div>
        <div class="main-content">
            <div class="table-responsive">
                <?php
                    $sql1 = "SELECT * FROM customer";
                    $result1 = $conn->query($sql1);
                ?>
                <h4>Amount:<?php echo $result1->num_rows ?></h4>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">RoomID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Arrival Date</th>
                            <th scope="col">Departure Date</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Service</th>
                            <th scope="col">Total Money</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($result->num_rows >0) {
                                while($row=$result->fetch_assoc()) {
                        ?>
                                    <tr>
                                        <td><?php echo $row["userroomid"]?></td>
                                        <td><?php echo $row["userfirstname"]?></td>
                                        <td><?php echo $row["userlastname"]?></td>
                                        <td><?php echo $row["useremail"]?></td>
                                        <td><?php echo $row["userphone"]?></td>
                                        <td><?php echo $row["userarrivaldate"]?></td>
                                        <td><?php echo $row["userdeparturedate"]?></td>
                                        <td><?php echo $row["useramount"]?></td>
                                        <td><?php echo $row["userservice"]?></td>
                                        <td><?php echo $row["usertotalmoney"]?></td>
                                        <td><a href="delete_customer.php?userid=<?php echo $row["userid"] ?>">Delete</a></td>
                                    </tr>
                        <?php 
                                }
                            }
                        ?>
                    </tbody>
                </table>
                <div class="table-footer">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                        <?php
                            if ($current_page > 1 && $total_page > 1){
                                echo '<li class="page-item"><a class="page-link" href="customer.php?page='.($current_page-1).'">Prev</a></li>  ';
                            }
                            for ($i = 1; $i <= $total_page; $i++){
                                // Nếu là trang hiện tại thì hiển thị thẻ span
                                // ngược lại hiển thị thẻ a
                                if ($i == $current_page){
                                    echo '<li class="page-item active"><span class="page-link ">'.$i.'</span></li>  ';
                                }
                                else{
                                    echo '<li class="page-item"><a class="page-link" href="customer.php?page='.$i.'">'.$i.'</a></li>  ';
                                }
                            }
                            if ($current_page < $total_page && $total_page > 1){
                                echo '<li class="page-item"><a class="page-link" href="customer.php?page='.($current_page+1).'">Next</a></li>  ';
                            }
                        ?>
                        </ul>
                    </nav>
                </div>
            </div>
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