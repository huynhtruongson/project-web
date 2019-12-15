<?php
    session_start();
    if (!isset($_SESSION["username"])) {
        echo "<li class='fa fa-lock'><a href='sign-in.php' style='margin-left: 12px;color:white;'>Loggin</a></li>";
    }
    else {
        echo "<li class=' fa fa-sign-out'><a href='sign-out.php' style='margin-left: 12px;color:white;'>Logout</a></li>";
        require_once("conn.php");
        $username = $_SESSION["username"];
        $sql = "SELECT * FROM user WHERE username = '$username'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $id = $row["id"];
        }
        echo "<li class=' fa fa-user'><a href='sign-up.php?id=$id' style='margin-left: 12px;color:white;'>Account</a></li>";
    }
?>