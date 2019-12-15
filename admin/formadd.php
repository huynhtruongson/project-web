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
    <link rel="stylesheet" type="text/css" type="text/css" href="css/formadd.css"/>
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title><?php
        if (isset($_GET["id_edit"])) {
            echo 'EDIT ROOM';
        }
        else {
            echo 'EXTRA ROOM';
        }
    ?></title>
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
            <p><?php
                if (isset($_GET["id_edit"])) {
                    echo 'EDIT ROOM';
                }
                else {
                    echo 'EXTRA ROOM';
                }
            ?></p>
        </div>
        <div class="container">
            <form action="addproduct.php" method="POST" enctype="multipart/form-data">
                <?php
                    $id_edit = $id = $name = $price = $bed = $amount = $description  = $convenient = "";			
                    if (isset($_GET["id_edit"])) {
                        $id_edit = $_GET["id_edit"];
                        require_once("../conn.php");
                        $sql = "SELECT * FROM room WHERE id = '$id_edit'";
                        $result = $conn->query($sql);
                        if ($result->num_rows == 1) {
                            $row = $result->fetch_assoc();
                            $id = $row["id"];
                            $name = $row["name"];
                            $price = $row["price"];
                            $bed = $row["bed"];
                            $amount = $row["amount"];
                            $description = $row["description"];
                            $convenient=$row["convenient"];
                        }
                    }
                ?>
                <div class="form-group">
                    <input type="hidden" class="form-control" id="id_edit" name="id_edit" placeholder="Enter ID" value="<?php echo $id_edit ?>"  required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="id" name="id" placeholder="Enter ID" value="<?php echo $id ?>"  required>
                </div>
                <div class="form-group">
                    <select class="form-control" name="name" required>
                        <option selected>Name</option>
                        <option value="Standard Room" <?php if ($name == "Standard Room") echo "selected" ?>>Standard Room</option>
                        <option value="Superior Room" <?php if ($name == "Superior Room") echo "selected" ?>>Superior Room</option>
                        <option value="Deluxe Room" <?php if ($name == "Deluxe Room") echo "selected" ?>>Deluxe Room</option>
                        <option value="Suit Room" <?php if ($name == "Suit Room") echo "selected" ?>>Suit Room</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="price" name="price" placeholder="Enter Price" value="<?php echo $price ?>" required>
                </div>
                <div class="form-group">
                    <select class="form-control" name="bed" required>
                        <option selected>Bed</option>
                        <option value="Single Bed" <?php if ($bed == "Single Bed") echo "selected" ?>>Single Bed</option>
                        <option value="Double Bed" <?php if ($bed == "Double Bed") echo "selected" ?>>Double Bed</option>
                        <option value="Queen Size Bed" <?php if ($bed == "Queen Size Bed") echo "selected" ?>>Queen Size Bed</option>
                        <option value="King Size Bed" <?php if ($bed == "King Size Bed") echo "selected" ?>>King Size Bed</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter Amounts" value="<?php echo $amount ?>" required>
                </div>
                <div class="form-group">
                    <label for="fileUpload">Choose Photo</label>
                    <input type="file" class="form-control-file" id="fileUpload" name="fileUpload" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Description..."  required><?php echo $description ?></textarea>
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="convenient" name="convenient" rows="3" placeholder="Convenient..."  required><?php echo $convenient ?></textarea>
                </div>
                <?php
                    if (isset($_GET["id_edit"])) {
                        echo '<button class="btn btn-primary btn-lg btn-block" type="submit">Update</button>';
                    }
                    else {
                        echo '<button class="btn btn-primary btn-lg btn-block" type="submit">Add</button>';
                    }
                ?>
                <!--<button class="btn btn-primary btn-lg btn-block" type="submit">Add</button> -->
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